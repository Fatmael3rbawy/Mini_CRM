<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use App\Http\Requests\Company\AddCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use Illuminate\Support\Facades\Redis;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = company::orderby('id')->paginate(10);
        return view('Admin.Company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Company.create');
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

        return redirect(route('company.index'))->with('message', 'The company has been created successfully');
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
        $company = company::find($id);
        return view('Admin.Company.edit', compact('company'));
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
        //check if the company already has image and want to change it
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

        return redirect(route('company.index'))->with('message', 'The Company' . $id . ' has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::find($id);
        $image_name = $company->logo;
        if ($image_name !== '') {
            unlink(public_path('images/companies/') . $image_name);
        }
        $company->delete();
        return back()->with('message', 'The Company' . $id . ' has been deleted.');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $text = $request->search;
        // dd($keyword ,$text);
        $results = company::where($keyword, 'like', '%' . $text . '%')
            ->orderby('id')
            ->paginate(6);
        if ($results->isEmpty())
            return back()->with('result', 'There are not results');
        else
            return view('Admin.Company.searchResults', compact('results'));
    }
}
