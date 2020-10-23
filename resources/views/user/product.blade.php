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
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                            <h3>Product Details</h3>
                    </div>
                    <div class="card-body text-center">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Shop</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{$single->name}}</td>
                                        <td>{{$single->description}}</td>
                                        <td>{{$single->price}}</td>
                                        <td>-{{$single->shop}}-</td>
                                    </tr>
                            </tbody>
                            
                        </table>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#customerModal">Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Your Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form id="customerForm">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required/>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Confirm</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    $('#customerForm').submit(function(e){
        e.preventDefault();
        
        var name = $("input[name=name]").val();
        var address = $("input[name=address]").val();
        var phone = $("input[name=phone]").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{route('customer.order')}}",
            type:"POST",
            data:{
                name:name,
                address:address,
                phone:phone,
                _token:_token
            },
            success:function(responce){
                console.log(responce)
            }
        });
    })
</script> 
@endsection