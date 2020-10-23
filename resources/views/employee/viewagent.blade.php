@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <nav class="mb-10">
        <div class="container mx-auto px-6 md:px-0">
            <div class="flex items-center justify-center">
                <div class="flex-1 text-center">
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/employee" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Home</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/employee/notices" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-left:10px">Notice</a>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Agent Details</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                            <tr>
                                                <td>{{$view->name}}</td>
                                                <td>{{$view->email}}</td>
                                                <td>{{$view->address}}</td>
                                                <td>{{$view->phone}}</td>
                                            </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <a href="/employee" class="btn btn-success" style="margin-top:20px">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection