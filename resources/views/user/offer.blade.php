
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card text-center">
                        <div class="card-header text-center">
                            <h3>Offer</h3>
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Coupon</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                        @foreach($offer as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>-{{$item->coufon}}-</td>
                                            </tr>
                                        @endforeach
                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection