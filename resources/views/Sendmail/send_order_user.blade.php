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