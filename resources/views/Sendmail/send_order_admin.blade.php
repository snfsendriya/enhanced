<div class="table-responsive text-nowrap">
                                <table class="table table-striped text-center" id="myTable" border="1">
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
                                        $count = 1
                                    @endphp
                                    <tbody class="table-border-bottom-0">
                                        @foreach($product_details as $row)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>
                                                    <img src="{{ url('storage/uploads/Product/'.$row->featured_image) }}" class="rounded" width="150" height="150" >
                                                </td>
                                                <td>{{ $row->weight.' '.$row->unit }}</td>
                                                <td>{{ $row->order_details_qty }}</td>
                                                <td>{{ $row->order_details_price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr colspan='5'>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Amount</td>
                                            <td>{{ $total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                    <br><br>
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <label class="mb-0" style="font-weight:bold;">Shipping Address</label>
                    </div>

                    <div class="card-body">
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Name : </span>{{ $first_name1.' '.$last_name1 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Phone Number : </span>{{ $phone_number1 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">State : </span>{{ $state1 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Address 1 : </span>{{ $address1 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Address 2 : </span>{{ $address21 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">City : </span>{{ $city1 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Zip Code : </span>{{ $zip_code1 }}</label><br>
                    </div>

                    <br><br>
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <label class="mb-0" style="font-weight:bold;">Billing Address</label>
                    </div>
                    <div class="card-body">
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Name : </span>{{ $first_name2.' '.$last_name2 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Phone Number : </span>{{ $phone_number2 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">State : </span>{{ $state2 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Address 1 : </span>{{ $address2 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Address 2 : </span>{{ $address22 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">City : </span>{{ $city2 }}</label><br>
                        <label class="col-sm-2 col-form-label"><span style="font-weight:bold;">Zip Code : </span>{{ $zip_code2 }}</label><br>
                    </div>