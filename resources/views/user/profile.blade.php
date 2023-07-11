@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>User Profile</h1>
            <div class="card">
                <div class="card-header">
                    My Orders
                </div>
                @foreach($orders as $order)
                <strong>Order Number {{ $order->id }}</strong>
                <div class="card-body">
                    <p class="card-text">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                            <li class="list-group-item">
                                {{ $item['item']['title'] }} | {{ $item['qty'] }} Units
                                <span class="badge" style="background-color: #28a745">{{ $item['price'] }} $</span>                              
                            </li>                            
                            @endforeach
                        </ul>
                    </p>
                    <div class="card-footer" ><strong>Total Price: {{ $order->cart->totalPrice }} $</strong></div>
                </div>
                @endforeach
            </div>
        </div>      
    </div>
@endsection
