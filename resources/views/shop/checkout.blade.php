@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <h1>Checkout</h1>
                <h4>Your Total: ${{ $total }}</h4>
                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" id="phone" class="form-control" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form>
            </div>
</div>
@endsection

