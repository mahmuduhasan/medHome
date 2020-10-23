
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
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header text-center">
                            {{$noticeFile->name}}
                        </div>
                        <div class="card-body">
                            <p>
                                <iframe src="{{url('storage/'.$noticeFile->file)}}" style="height:400px;width:700px"></iframe>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

