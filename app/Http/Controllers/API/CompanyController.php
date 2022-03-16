<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AddCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\company;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::all();
        return response()->json($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCompanyRequest $request)
    {
        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
        $image_name = 'company' . uniqid() . ".$ext";
        $image->move(public_path('images/companies'), $image_name);

        company::create([
            'name' => $request->name,
            'email' => $request->email,
            'web_url' => $request->web_url,
            'logo' => $image_name

        ]);
        $success ="Company has been created successfully";
        return response()->json($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = company::find($id);

        $image_name = $company->logo;
        if ($request->hasFile('img')) {
            if ($image_name !== '') {
                unlink(public_path('images/companies/') . $image_name);
            }
            $image = $request->file('img');
            $ext = $image->getClientOriginalExtension();
            $image_name = 'company' . uniqid() . ".$ext";
            $image->move(public_path('images/companies'), $image_name);
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'web_url' => $request->web_url,
            'logo' => $image_name

        ]);
        $success ="Company has been updated successfully";
        return response()->json($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
