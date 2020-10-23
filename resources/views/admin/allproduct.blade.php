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
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Home</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/product" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Product</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/agent" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Agent</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/employee" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-right:10px">Employee</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/request" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px">Request</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/notices" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-left:10px">Notice</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/offer" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-left:10px">Offer</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/customer" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-left:10px">Customer</a>
                        <a class="no-underline hover:underline text-black-300 text-m p-3" href="/admin/agent/report" style="text-decoration:none; color:gray; border:1px solid gray; border-radius: 10px;margin-left:10px">Report</a>
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card text-center">
                        <div class="card-header text-center">
                            <h3>Product</h3>
                        </div>
                        @if(Session::has('product_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('product_deleted')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <form type="get" action="{{route('product.search')}}">
                                <input type="search" name="query" class="form-control mr-sm-2 text-center mb-3" placeholder="Search Product"/>
                                <button class="btn btn-primary my-2 my-sm-0 mb-3" type="submit">Search</button>
                            </form>
                            <table class="table mt-3">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>
                                                    <a href="/admin/product/update/{{$product->id}}" class="btn btn-success">View</a>
                                                    <a href="/admin/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                </tbody>
                            </table>
                            <div class="d-flex">
                                <div class="mx-auto">
                                {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/addproduct" class="btn btn-success" style="margin-top:20px">Add Product</a>
                </div>
            </div>
        </div>
    </section>
    
@endsection