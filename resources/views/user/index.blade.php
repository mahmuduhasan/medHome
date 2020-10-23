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
    <div class="container">
        <div class="row">
        @foreach($product as $product)
            <div class="col-md-3 col-sm-6">
                <div class="card text-center" style="margin-bottom:30px">
                    <div class="card-header">
                        <h3>{{$product->name}}</h3> 
                    </div>
                    <div class="card-body">
                        <p>{{$product->price}}</p>
                        <a href="/user/product/{{$product->id}}" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>    
            </div>
            @endforeach
        </div>
    </div>
    
@endsection