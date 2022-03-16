
@include('Admin.layout.header')

<!-- Main content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search Results</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">All Results</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website_URL</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $company)
                            <tr>
                                <td> <img src="{{asset('images\companies/' .$company->logo)}}" style="width:20% ; height:20% ; margin-bottom: 5px; border-radius: 5px" /> </td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->web_url}}</td>
                               
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
        {{$results->links()}}
    </center>
</div>
@extends('Admin.layout.footer')
