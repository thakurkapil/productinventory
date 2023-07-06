@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Products') }}
                
                                    <a class="nav-link" href="{{ route('product.create') }}">{{ __('Add') }}</a>
                                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Selling Price</th>
        <th>Buying Price</th>
        <th>Discount Percent</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->selling_price}}</td>
        <td>{{$product->buying_price}}</td>
        <td>{{$product->discount_percent}}</td>
        <td>   
          <a href="{{route('product.edit',$product) }}"> Edit</a>
        
        <form action="{{ route('product.destroy',$product) }}" onclick="return confirm('Are you sure you want to delete this item?');" method="POST" >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-primary">
                                    {{ __('Delete') }}
                                </button>
                                    </form></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



