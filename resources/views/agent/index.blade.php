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
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>Product</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Shop</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->shop}}</td>
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
                    <a href="/agent/addproduct" class="btn btn-success" style="margin-top:20px">Add Product</a>
                </div>
            </div>
        </div>
    </section>
@endsection