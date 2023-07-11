@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @foreach($products->chunk(3) as $productChunk)
    <div class="row">
        @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
                <div class="card">
            <div class="card-body align-items-center">
            <img src="{{$product->ImagePath}}" class="img-fluid" height=50% width=50% >
                <h5 class="card-title">{{$product->title}}</h5>
                <div class="card-text">{{$product->description}}</div>
                <div class="pull-left price">{{$product->price}}$</div>
                <a href="{{ route('product.addToCart', ['id'=>$product->id]) }}" class="btn btn-success pull-right" role="button">Add To Cart</a>
            </div>
            </div> 
        </div>
        @endforeach
    </div>
    <br>
    @endforeach
    
@endsection
