@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Checkout
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
                            <li class="not-active"><a class="not-active" href="{{url('/cart')}}">Cart</a></li>
                            <li class="active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>  

        <div class="container">
            <div class="page-header" style="text-align:left;color: #333333;">
                Checkout
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-7">
                    <h4>&nbsp;&nbsp;&nbsp;Shipping Address</h4>
                    <form action="{{route('order.place_order')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>First Name</label>
                            <input type="text" name="first_name1" id="first_name1" class="form-control" value="{{ old('first_name1') ? old('first_name1') : ( auth()->user() ? auth()->user()->first_name : '' ) }}" required>
                            @error('first_name1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Last Name</label>
                            <input type="text" name="last_name1" id="last_name1" class="form-control" value="{{ old('last_name1') ? old('last_name1') : ( auth()->user() ? auth()->user()->last_name : '' ) }}" required>
                            @error('last_name1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Email</label>
                            <input type="email" name="email1" id="email1" class="form-control" value="{{ old('email1') ? old('email1') : ( auth()->user() ? auth()->user()->email : '' ) }}" required>
                            @error('email1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Phone Number</label>
                            <input type="text" name="phone_number1" id="phone_number1" class="form-control" value="{{ old('phone_number1') ? old('phone_number1') : ( auth()->user() ? auth()->user()->contact_number : '' ) }}" required>
                            @error('phone_number1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>Address 1</label>
                            <input type="text" name="address1" id="address1" class="form-control" value="{{ old('address1') }}" required>
                            @error('address1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Address 2(Optional)</label>
                            <input type="text" name="address21" id="address21" value="{{ old('address21') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>State</label>
                            <select name="state1" id="state1" class="form-control" value="{{ old('state1') }}">
                                <option value="">Select</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                             @error('state1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>City</label>
                            <input type="text" name="city1" id="city1" class="form-control" value="{{ old('city1') }}" required>
                            @error('city1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>Zip Code</label>
                            <input type="text" name="zip_code1" id="zip_code1" class="form-control" value="{{ old('zip_code1') }}" required>
                            @error('zip_code1')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="check_billing_address" id="check_billing_address"
                            onClick="same_address()">&nbsp;Use same address for billing address
                    </div>
                    <h4>&nbsp;&nbsp;&nbsp;Billing Address</h4>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>First Name</label>
                            <input type="text" name="first_name2" id="first_name2" class="form-control" value="{{ old('first_name2') }}" required>
                             @error('first_name2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Last Name</label>
                            <input type="text" name="last_name2" id="last_name2" class="form-control" value="{{ old('last_name2') }}" required>
                             @error('last_name2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Email</label>
                            <input type="email" name="email2" id="email2" class="form-control" value="{{ old('email2') }}" required>
                            @error('email2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>Phone Number</label>
                            <input type="text" name="phone_number2" id="phone_number2" class="form-control" value="{{ old('phone_number2') }}" required>
                            @error('phone_number2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>Address 1</label>
                            <input type="text" name="address2" id="address2" class="form-control" value="{{ old('address2') }}" required>
                            @error('address2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label>Address 2(Optional)</label>
                            <input type="text" name="address22" id="address22" value="{{ old('address22') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>State</label>
                            <select name="state2" id="state2" class="form-control" value="{{ old('state2') }}">
                                <option value="">Select</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                             @error('state2')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label><span class="text-danger">*</span>City</label>
                            <input type="text" name="city2" id="city2" value="{{ old('city2') }}" class="form-control" required>
                        </div>
                        @error('city2')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>Zip Code</label>
                            <input type="text" name="zip_code2" id="zip_code2" value="{{ old('zip_code2') }}" class="form-control" required>
                        </div>
                        @error('zip_code2')
                            <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-lg-5 card-row">
                    <h4>&nbsp;&nbsp;&nbsp;Order Summary</h4>
                    @php
                        $cart_total = 0;
                    @endphp
                    @foreach($cart_arr as $row)
                        <div class="col-md-6">
                            <img src="{{ url('storage/uploads/Product/'.$row['product']['featured_image']) }}" width="100" height="100">
                        </div>
                        <div class="col-md-6">
                            <h5 class="cursive_font">{{ $row['product']['title'] }}</h5>
                            <h5 class="cursive_font">Quantity : {{ $row['qty'] }}</h5>
                            <h5 class="cursive_font">Price : ₹&nbsp;{{ $row['product_attr']['price'] }}</h5>
                            @if($row['product']['is_available'])
                                <h5 class="cursive_font">Total : ₹&nbsp;{{$row['product_attr']['price'] * $row['qty']}}</h5>
                            @else
                                <h5 class="cursive_font">Total : ₹&nbsp;{{$row['product_attr']['price'] * $row['qty']}} ( 20% ) = {{ ( $row['product_attr']['price'] * $row['qty'] * 20) / 100 }}</h5>
                            @endif
                            @php
                                if($row['product']['is_available'])
                                    $cart_total += $row['product_attr']['price'] * $row['qty'];
                                else
                                    $cart_total += ( $row['product_attr']['price'] * $row['qty'] * 20 ) / 100;
                            @endphp
                        </div>
                        <hr>
                    @endforeach
                    <div class="col-md-12">
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
                    </div>
                    <div class="col-md-12">
                        <h4>Choose Payment Method</h4>
                        @if(!$pre_book)
                            <h5><input type="radio" name="order_type" value="COD" checked>&nbsp;Cash On Delivery</h5>
                        @else
                            <p class="text-danger">* Cash On Delivery not available as you have selected one or more pre book product</p>
                        @endif
                        <h5><input type="radio" name="order_type" value="Gateway">&nbsp;Payment Gateway</h5>
                        <button type="submit" class="btn btn-place-order btn-block">Place Order</a>
                    </div>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>

    </div>
@stop