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
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/agent" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Home</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/agent/report" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Report</a>
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
                            Monthly Report
                        </div>
                        @if(Session::has('report_submitted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('report_submitted')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{route('report.submitted')}}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="name">Your Shop Name</label>
                                    <input type="text" placeholder="Enter Product Name" class="form-control" name="name" id="name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Explain Current State</label>
                                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Product Description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Total Sell</label>
                                    <input type="text" placeholder="Enter Product Price" class="form-control" name="price" id="price" required/>
                                </div>
                                <fieldset style="border:1px solid gray;border-radius:5px">
                                    <label>Select if something need to update.</label><br/>
                                    <input type="checkbox" name="update[]" value="Decoration">Decoration<br/>
                                    <input type="checkbox" name="update[]" value="Shifting">Shifting<br/>
                                    <input type="checkbox" name="update[]" value="New Goods Need">New Goods Need<br/>
                                    <input type="checkbox" name="update[]" value="New Worker Need">New Worker Need<br/>
                                </fieldset>
                                <input type="submit" class="btn btn-success" value="Submit"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection