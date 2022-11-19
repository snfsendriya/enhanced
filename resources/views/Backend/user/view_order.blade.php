@extends('Backend/user/includes/layout')

@section('title')
    <title>Order Details</title>
@stop

@section('main-content')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                        <div class="breadcrumb-body">
                            <h5 class="card-title text-primary">Order Details</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('user/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('user/all-order')}}">All Order</a></li>
                                <li class="breadcrumb-item active">Order Details</li>
                              </ol>
                            </nav>
                          </div>
                        </div>

                        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">

                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0">Product Details</h6>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                           
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped text-center" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Weight</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $count = 1;
                                        $payment_pending = false;
                                    @endphp
                                    <tbody class="table-border-bottom-0">
                                        @foreach($product_details as $row)
                                            @php
                                                if($row->is_available && $row->order_details_payment_status == 'Pending')
                                                  $payment_pending = true;
                                            @endphp
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>
                                                    <img src="{{ url('storage/uploads/Product/'.$row->featured_image) }}" class="rounded" width="150" height="150" >
                                                </td>
                                                <td>{{ $row->weight.' '.$row->unit }}</td>
                                                <td>{{ $row->order_details_qty }}</td>
                                                <td>₹ {{ $row->order_details_price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card-header d-flex align-items-center position-relative">
                      <h6 class="mb-0 font-weight-bold position-absolute" style="right:20px;">
                          @if($actual_amount == $order->total_amount)
                          Total Amount: ₹ {{ $actual_amount }} <br>
                          @elseif($actual_amount > $order->total_amount)
                            Total Amount: ₹ {{ $actual_amount }} <br>
                            Total Amount you have paid: ₹ {{ $order->total_amount }} <br>
                            Remaining amount you have to pay: ₹ {{ $actual_amount - $order->total_amount }}
                          @else
                            Total Amount: {{ $order->total_amount }}
                          @endif
                      </h6>
                    </div>

                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0">Payment Details</h6>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                           
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped text-center" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Payment Type</th>
                                        <th>Payment Status</th>
                                        <th>Payment ID</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $count = 1
                                    @endphp
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>
                                                @if($order->payment_status == "Pending")
                                                    <span class="text-danger">Pending</span>
                                                @elseif($order->payment_status == "Success")
                                                    <span class="text-success">Success</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->payment_id }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0">Shipping Address</h6>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->first_name1.' '.$order->last_name1 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->email1 }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Phone Number</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->phone_number1 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">State</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->state1 }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Address 1</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" readOnly>{{ $order->address1 }}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Address 2</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" readOnly>{{ $order->address21 }}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">City</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->city1 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Zip Code</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->zip_code1 }}" readOnly/>
                          </div>
                        </div>
                    </div>

                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0">Billing Address</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->first_name2.' '.$order->last_name2 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->email2 }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Phone Number</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->phone_number2 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">State</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->state2 }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Address 1</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" readOnly>{{ $order->address2 }}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Address 2</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" readOnly>{{ $order->address22 }}</textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">City</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->city2 }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Zip Code</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $order->zip_code2 }}" readOnly/>
                          </div>
                        </div>
                    </div>
                    @if($is_available && ($actual_amount - $order->total_amount) != 0)
                      <div class="card-header d-flex align-items-center">
                        <h6 class="mb-0">Pay Pending Amount</h6>
                        <form action="{{url('user/pending-payment')}}" method='post'>
                          @csrf
                          <input type="hidden" name="order_id" value="{{$order->id}}">
                          <input type="hidden" name="pending_amount" value="{{$actual_amount - $order->total_amount }}">
                          <button class="btn btn-success" style="margin-left:10px;">Pay ₹ {{ $actual_amount - $order->total_amount }}</button>
                        </form>
                      </div>
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>

                        </div>

                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- / Content -->

@stop