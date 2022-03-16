@include('Admin.layout.header')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Employees</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Employees</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">

                @if(session('message'))
                <div class='alert alert-success'>
                    <h6>
                        <center>{{session('message')}}</center>
                    </h6>
                </div>
                @endif
                @if(session('result'))
                <div class='alert alert-danger'>
                    <h6>
                        <center>{{session('result')}}</center>
                    </h6>
                </div>
                @endif
                <center>
                    <a href='{{route('employee.create')}}'> <button class='alert alert-success' style="width:30% ;margin-top :10px"> Add New Employee</button> </a>
                </center>
                <form method='get'     action="{{route('employee.search')}}"      >
                    @csrf
                    {{csrf_field()}}
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search by Keyword">
                                <select type="text" name="keyword" required style="width:500px ">
                                    <option value='first_name'>First Name </option>
                                    <option value='last_name'> Last Name </option>
                                    <option value='email'> Email </option>
                                    <option value='phone'> PHONE </option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id='myTable'>
                        <thead>
                            <tr>
                                <th> ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company Name</th>
                                <th>cat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td> {{$employee->company->name}}</td>
                                <td>
                                    <a href='{{route('employee.edit',$employee->id)}}'> <span class='alert alert-warning'> Edit </span><a>
                                            <a href='{{route('employee.destroy',$employee->id)}}'> <span class='alert alert-danger'> Delete </span> </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- /.card-body -->
            </div>

            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    {{-- <center>
        {{$employees->links()}}
    </center> --}}
</div>
@extends('Admin.layout.footer')
