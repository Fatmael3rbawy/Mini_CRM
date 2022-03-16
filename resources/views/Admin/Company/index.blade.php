@include('Admin.layout.header')

<!-- Main content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Companies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Companies</li>
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
                    <a href='{{route('company.create')}}'> <button class='alert alert-success' style="width:30% ;margin-top :10px"> Add New Company</button> </a>
                </center>
                    <form method='get' action='{{route('company.search')}}'>
                        @csrf
                        {{csrf_field()}}
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search by Keyword">
                                    <select  type="text" name="keyword" required style="width:500px ">
                                        <option value='name'> Name </option>
                                        <option value='email'> Email </option>
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

                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website_URL</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td> <img src="{{asset('images\companies/' .$company->logo)}}" style="width:20% ; height:20% ; margin-bottom: 5px; border-radius: 5px" /> </td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->web_url}}</td>
                                <td>
                                    <a href='{{route('company.edit',$company->id)}}'> <button class='alert alert-warning'> Edit </button><a>
                                            <a href='{{route('company.destroy',$company->id)}}'> <button class='alert alert-danger'> Delete </button> </a>
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

    <center>
        {{$companies->links()}}
    </center>
</div>
@extends('Admin.layout.footer')
