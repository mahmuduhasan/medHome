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
                <div class="col-md-12 text-center">
                    <div class="mb-3">
                        <a href="/downloadpdf" class="btn btn-secondary">Export PDF</a>
                        <a href="/downloadexcel" class="btn btn-info">Export Excel</a>
                        <a href="/downloadcsv" class="btn btn-dark">Export CSV</a>
                    </div>
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Report</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>Shop Name</th>
                                        <th>Situation</th>
                                        <th>Amount</th>
                                        <th>Update</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                        @foreach($reports as $report)
                                            <tr>
                                                <td>{{$report->shopname}}</td>
                                                <td>{{$report->explain}}</td>
                                                <td>{{$report->amount}}</td>
                                                <td>{{$report->update}}</td>
                                                <td>{{$report->created_at}}</td>
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