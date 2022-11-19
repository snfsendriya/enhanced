<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend_assets/images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{asset('admin_assets/css/invoice-style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('admin_assets/img/images/logo.png')}}" width="200"> 
      </div>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div style="font-weight:bold;">Shipped To:</div>
        <div>{{ $order->address1 }}</div>
        <div>{{ $order->address21 }}</div>
        <div>{{ $order->state1.', '.$order->city1 }}</div>
        <div>India, {{ $order->zip_code1 }}</div>
        <div>{{ $order->phone_number1 }}</div>
        <div><a href="mailto:{{ $order->email1 }}">{{ $order->email1 }}</a></div>
      </div>
      <div id="project">
        <div><span style="font-weight:bold;color:#000000;font-size:12px;">Billed To:</span></div>
        <div>{{ $order->first_name1.' '.$order->last_name1 }}</div>
        <div>{{ $order->phone_number1 }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>Sl No.</th>
            <th class="service">TITLE</th>
            <th class="desc">WEIGHT</th>
            <th>QTY</th>
            <th>PRICE</th>
          </tr>
        </thead>
        @php
            $count = 1
        @endphp
        <tbody>
          @foreach($product_details as $row) 
            <tr>
                <td>{{ $count++ }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->weight.' '.$row->unit }}</td>
                <td>{{ $row->order_details_qty }}</td>
                <td>{{ $row->order_details_price }}</td>
            </tr>
          @endforeach
            <tr>
                <td colspan="4" class="grand total">GRAND TOTAL</td>
                <td class="grand total">{{ $order->total_amount }}</td>
            </tr>
        </tbody>
      </table>
    </main>
    <script>
        window.print();
    </script>
  </body>
</html>