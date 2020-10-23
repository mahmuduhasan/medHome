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
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add New Agent
                        </div>
                        <div class="card-body">
                        @if(Session::has('agent_added'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('agent_added')}}
                            </div>
                        @endif
                            <form action="{{route('agent.added')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" placeholder="Enter Agent Name" class="form-control" name="name" id="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" placeholder="Enter Agent Email" class="form-control" name="email" id="email" required/>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="address" rows="2" placeholder="Enter Agent Address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" placeholder="Enter Agent Contact" class="form-control" name="phone" id="phone" required/>
                                </div>
                                <div class="form-group">
                                    <label for="employee">Your Name</label>
                                    <input type="text" placeholder="Enter Your Name" class="form-control" name="employee" id="employee" required/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" placeholder="Enter Agent Password" class="form-control" name="password" id="password" required/>
                                </div>
                                <input type="submit" class="btn btn-success" value="Submit"/>
                            </form>
                            <a href="/employee" class="btn btn-success mt-8">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection