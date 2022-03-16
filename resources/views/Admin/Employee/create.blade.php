@include('Admin.layout.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!--start section profile-->
    <section class="profile">
        <div class="overlay"></div>
        <div class="container">


            <div class="row justify-content-md-center">
                <div class="col-sm-9">
                    <div class="profile-content">

                        <center>
                            <form action="{{route('employee.store')}}" validate method="POST">
                                @csrf
                                {{ csrf_field() }}

                                <table class="table table-border table-striped" style="margin:25px;width:75%">

                                    <h1 class="username">Add New Employee </h1>
                                    <div>

                                        <tr>
                                            <td>
                                                <h6>First Name</h6>
                                            </td>
                                            <td>
                                                <h5><input class="form-control" type="text" name="fname" required placeholder="Enter The First Name" :value='old("fname")' style="width:500px "></h5>
                                                @error('fname')
                                                <div class="alert alert-danger">{{ $message }}</div>
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
                                                <h5><input class="form-control" type="text" name="lname" required placeholder="Enter the Last Name" :value='old("lname")' style="width:500px "></h5>
                                                @error('lname')
                                                <div class="alert alert-danger">{{ $message }}</div>
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
                                                <h5><input class="form-control" type="email" name="email" placeholder="Enter the email" :value='old("email")' style="width:500px "></h5>
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
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
                                                <h5><input class="form-control" type="text" name="phone" placeholder="Enter the phone" :value='old("phone")' style="width:500px "></h5>
                                                @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="name">
                                        <tr>
                                            <td>
                                                <h6>LinkedIn_url</h6>
                                            </td>
                                            <td>
                                                <h5><input class="form-control" type="text" name="linkedIn_url" placeholder="Enter the linkedIn_url" :value='old("linkedIn_url")' style="width:500px "></h5>
                                                @error('linkedIn_url')
                                                <div class="alert alert-danger">{{ $message }}</div>
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
                                                <h5> <select class="form-control" type="text" name="company_id" required style="width:500px "></h5>
                                                @foreach($companies as $value)
                                                <option value="{{$value->id}}"> {{$value->name}} </option>
                                                @endforeach
                                                </select>
                                                  @error('company_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>
                                    </div>
                                    <tr>
                                        <td>
                                            <div class="submit">
                                                <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="ADD"></div>
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
