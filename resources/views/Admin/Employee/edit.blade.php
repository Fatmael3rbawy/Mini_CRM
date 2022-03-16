@include('Admin.layout.header')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Employee</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Employee</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
                   
@if(session('message'))
<div class='alert alert-success'>
    <h6>
        <center>{{session('message')}}</center>
    </h6>
</div>
@endif
        <!--start section profile-->
        <section class="profile">
            <div class="overlay"></div>
            <div class="container">


                <div class="row justify-content-md-center">
                    <div class="col-sm-9">
                        <div class="profile-content">

                            <center>
                                <form action="{{route('employee.update',$employee->id)}}" validate method="POST" >
                                    @csrf

                                    <table class="table table-border table-striped" style="margin:25px;width:75%">

                                        <h1 class="username">Edit Employee {{$employee->id}} </h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>First Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="fname" required value="{{$employee->first_name}}" style="width:500px "></h5>
                                                    @error('fname')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Last Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="lname" required value="{{$employee->last_name}}" style="width:500px "></h5>
                                                    @error('lname')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </div>
                                        
                                           <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Email</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="email" name="email"  value="{{$employee->email}}" style="width:500px "></h5>
                                                    @error('email')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Phone</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" name="phone" required value="{{$employee->phone}}" style="width:500px "></h5>
                                                    @error('phone')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Company</h6>
                                                </td>
                                                <td>
                                                    <h5> <select list="dept" class="form-control" type="text" name="company_id" required  style="width:500px "></h5>
                                                    <option value="{{$employee->company_id}}">{{$employee->company->name}} </option>
                                                    @foreach($companies as $value)
                                                    <option value="{{$value->id}}"> {{$value->name}}</option>
                                                    @endforeach

                                                    </select>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </div>

                                        <tr>
                                            <td>
                                                <div class="submit">
                                                    <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" value="Update"></div>
                                            </td>
                                        </tr>


                                    </table>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
        
            </div>
        </section>
    </div>
@extends('Admin.layout.footer')