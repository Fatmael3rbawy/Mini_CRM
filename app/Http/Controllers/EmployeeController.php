<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\AddEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\company;
use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::orderby('id')->get();
        // dd($employees);
        return view('Admin.Employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = company::all();
        return view('Admin.Employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {
        employee::create([
            'company_id' => $request->company_id,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'linkedIn_url' => $request->linkedIn_url,
        ]);

        return redirect(route('employee.index'))->with('message', 'The employee has been created successfully');
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
        $companies = company::all();
        $employee = employee::find($id);
        return view('Admin.Employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = employee::find($id);
        $employee->update([
            'company_id' => $request->company_id,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'LinkedIn_uurl' => $request->linkedIn_url
        ]);

        return redirect(route('employee.index'))->with('message', 'the employee has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect(route('employee.index'))->with('message', 'the employee has been deleted');
    }

    public function search(Request $request)
    {
        $text = $request->search;
        $results = employee::where($request->keyword, 'like', '%' . $text . '%')
            ->orderby('id')
            ->paginate(10);

        if ($results->isEmpty()) {
            return back()->with('result', 'there are not results');
        }
        return view('Admin.Employee.searchResults', compact('results'));
    }
}
