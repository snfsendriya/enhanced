@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Cart
@stop
@section('main-content')
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ol class="breadcrumb">
                        <li><a class="not-active" href="{{url('/')}}">Home</a> </li>
                                <li class="active">Cart</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="page-header" style="text-align:left;color: #333333;">
                My Cart
            </div>
        </div>

        <div class="container">
            <div class="row card-container-row">
                <div class="col-lg-8" style="display: flex;flex-direction: column;">
                    @if(isset($cart_arr[0]))
                        @php
                            $cart_total = 0;
                        @endphp
                        @foreach($cart_arr as $row)
                            <div class="card-row" id="cart_item_{{ $row['id'] }}">
                                <div class="col-md-3">
                                    <a href="{{url('product/'.$row['product']['slug'])}}">
                                        <img class="product-featured-image" src="{{ url('storage/uploads/Product/'.$row['product']['featured_image']) }}" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-titleml">
                                        <a href="{{url('product/'.$row['product']['slug'])}}">{{ $row['product']['title'] }}</a>
                                    </h5>
                                    <h6>{{ $row['product_attr']['weight'] }}&nbsp;{{ $row['product_attr']['unit'] }}</h6>
                                    <div class="quantity card-quantity">
                                        <button class="btn minus-btn" type="button" onclick="decrement_cart_qty({{ $row['id'] }}, {{ $row['product_attr_id'] }})">-</button>
                                        <input  type="text" class="qty" id="product_qty_{{ $row['id'] }}" value="{{ $row['qty'] }}">
                                        <button class="btn plus-btn" type="button" onclick="increment_cart_qty({{ $row['id'] }}, {{ $row['product_attr_id'] }})">+</button>
                                    </div>
                                    <h5 class="card-price">PRICE: ₹&nbsp;{{ $row['product_attr']['price'] }}</h5>
                                    @if($row['product']['is_available'])
                                        <h5 class="card-price">TOTAL: ₹&nbsp;{{ $row['product_attr']['price'] * $row['qty'] }}</h5>
                                    @else
                                        <h5 class="card-price">TOTAL: ₹&nbsp;{{ $row['product_attr']['price'] * $row['qty'] }} ( 20% ) = {{ ( $row['product_attr']['price'] * $row['qty'] * 20) / 100 }}</h5>
                                    @endif
                                    <?php
                                        if($row['product']['is_available'])
                                            $cart_total += $row['product_attr']['price'] * $row['qty'];
                                        else
                                            $cart_total += ( $row['product_attr']['price'] * $row['qty'] * 20 ) / 100;
                                    ?>
                                </div>
                                <div class="col-md-5 card-item-delete">
                                    <a href="javascript:void(0);" class="btn btn-danger" onClick="cart_delete({{ $row['id'] }}, {{ $row['product_attr_id'] }})">Delete</a>
                                </div>
                            </div>
                        @endforeach
                </div>
                <div class="col-lg-4 card-total">
                    <h3>CART TOTALS</h3>
                    <table class="table table-border">
                        <thead>
                            <th>Subtotal</th>
                            <th>₹&nbsp;{{ $cart_total }}</th>
                        </thead>
                        <tbody>
                            <th>Total</th>
                            <th>₹&nbsp;{{ $cart_total }}</th>
                        </tbody>
                    </table>
                    <a href="{{url('/checkout')}}" class="checkout-button">Checkout</a>
                </div>
                @else
                    <h5>Cart Empty</h5>
                    <br><br><br><br><br><br><br><br>
                @endif
            </div>
        </div>

    </div>
    </div>
@stop