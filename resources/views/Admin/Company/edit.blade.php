@include('Admin.layout.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
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
                            <form action="{{route('company.update',$company->id)}}" validate method="POST" enctype="multipart/form-data">
                                @csrf

                                <table class="table table-border table-striped" style="margin:25px;width:75%">

                                    <h1 class="username">Edit Company {{$company->id}} </h1>
                                    <tr>
                                        <td>
                                            <h6>Company Name</h6>
                                        </td>
                                        <td>
                                            <h5><input class="form-control" type="text" name="name" required value="{{$company->name}}" style="width:500px "></h5>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6>Company Email</h6>
                                        </td>
                                        <td>
                                            <h5><input class="form-control" type="email" name="email" required value="{{$company->email}}" style="width:500px "></h5>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h6>Website_URL</h6>
                                        </td>
                                        <td>
                                            <h5><input class="form-control" type="text" name="web_url" required value="{{$company->web_url}}" style="width:500px "></h5>
                                            @error('web_url')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Upload Company Image </td>
                                        <td><input type="file" name="img" class="form-control-file border" style="width:500px " /> </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <div class="submit">
                                                <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="Update"></div>
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
