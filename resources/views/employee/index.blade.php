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
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>Agent</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Employee Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($agent as $agent)
                                            <tr>
                                                <td>{{$agent->name}}</td>
                                                <td>{{$agent->employee}}</td>
                                                <td>
                                                    <a href="/employee/agent/{{$agent->id}}" class="btn btn-success">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <a href="/employee/addagent" class="btn btn-success" style="margin-top:20px">Add Agent</a>
                </div>
            </div>
        </div>
    </section>
@endsection