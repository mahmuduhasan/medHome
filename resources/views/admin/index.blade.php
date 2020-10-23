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
    <div class="flex items-center justify-center">
        <nav style="margin-top:200px;border:1px solid gray;padding:30px 50px;border-radius:5px">
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/product" style="text-decoration:none; color:gray; font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Product</a>
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/agent" style="text-decoration:none; color:gray ;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Agent</a>
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/employee" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Employee</a>
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/request" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Request</a>  
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/notices" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Notice</a>
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/offer" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Offer</a>  
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/customer" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Customer</a>
            <a class="no-underline hover:underline text-black-300 text-l p-3" href="/admin/agent/report" style="text-decoration:none; color:gray;font-size:30px;margin-left:5px;margin-right:5px;border-right:1px solid gray;border-left:1px solid gray">Report</a>    
            
        </nav>
    </div>
    
@endsection