<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <style>
        @font-face {
        font-family: SourceSansPro;
        src: url(asset('assets/SourceSansPro-Regular.ttf'));
        }

        .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #0087C3;
        text-decoration: none;
        }

        body {
        position: relative;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-family: SourceSansPro;
        }

        header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
        }

        #logo {
        float: left;
        margin-top: 8px;
        }

        #logo img {
        height: 70px;
        }

        #company {
        float: right;
        text-align: right;
        }


        #details {
        margin-bottom: 50px;
        }

        #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
        }

        #client .to {
        color: #777777;
        }

        h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
        }

        #invoice {
        float: right;
        text-align: right;
        }

        #invoice .to {
        color: #777777;
        }

        #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0  0 10px 0;
        }

        #invoice .date {
        font-size: 1.1em;
        color: #777777;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table th,
        table td {
        padding: 20px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        table th {
        white-space: nowrap;
        font-weight: normal;
        }

        table td {
        text-align: right;
        }

        table td h3{
        color: #57B223;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
        }

        table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        background: #57B223;
        }

        table .desc {
        text-align: left;
        }

        table .unit {
        background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
        background: #57B223;
        color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
        color: #57B223;
        font-size: 1.4em;
        border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
        border: none;
        }

        #thanks{
        font-size: 2em;
        margin-bottom: 50px;
        }

        #notices{
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        }

        #notices .notice {
        font-size: 1.2em;
        }

        footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/images/logo-favicon') }}/{{ $setting->logo }}" alt="">
      </div>
      <div id="company">
        <h2 class="name">{{ config('app.name') }}</h2>
        <div>{{ $setting->address }}</div>
        <div>{{ $setting->phone }}</div>
        <div><a href="">{{ $setting->email }}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="details" class="clearfix">
          <div id="client">
            <div class="to">Billing Details:</div>
            <h2 class="name">{{ $order->user->name }}</h2>
            <div class="address">{{ $order->city.', '.$order->country }}</div>
            <div class="email"><a href="">{{ $order->mobile }}</a></div>
            <div class="email"><a href="">{{ $order->email }}</a></div>
          </div>
          <div id="invoice">
                @if ($order->is_shipping_different)
                <div class="to">Shipping Details:</div>
                <h2 class="name">{{ $order->shipping->first_name.' '.$order->shipping->last_name }}</h2>
                <div class="address">{{ $order->shipping->city.', '.$order->shipping->country }}</div>
                <div class="email"><a href="">{{ $order->shipping->mobile }}</a></div>
                <div class="email"><a href="">{{ $order->shipping->email }}</a></div>
                @else
                <div class="to">Shipping Details:</div>
                <h2 class="name">{{ $order->user->name }}</h2>
                <div class="address">{{ $order->city.', '.$order->country }}</div>
                <div class="email"><a href="">{{ $order->mobile }}</a></div>
                <div class="email"><a href="">{{ $order->email }}</a></div>
                @endif
            </div>
        </div>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Payment Details:</div>
                <div class="date">Payment Type: {{ $order->transaction->mode }}</div>
                <div class="date">Payment Date: {{ $order->transaction->transaction_date }}</div>
                <div class="date">Status:
                    @if ($order->transaction->status == 'pending')
                    <span style="background-color: red; color: white;">{{ $order->transaction->status }}</span>
                    @elseif ($order->transaction->status == 'approved')
                    <span style="background-color: green; color: white;">{{ $order->transaction->status }}</span>
                    @elseif ($order->transaction->status == 'declined')
                    <span style="background-color: red; color: white;">{{ $order->transaction->status }}</span>
                    @elseif ($order->transaction->status == 'refunded')
                    <span style="background-color: darkcyan; color: white;">{{ $order->transaction->status }}</span>
                    @elseif ($order->transaction->status == 'canceled')
                    <span style="background-color: red; color: white;">{{ $order->transaction->status }}</span>
                    @endif
                </div>
            </div>
            <div id="invoice">
            <h1>INVOICE {{ $order->order_id }}</h1>
            <div class="date">Ordered Date: {{ $order->ordered_date }}</div>
                <div class="date">Status:
                    @if ($order->status == 'pending')
                    <span style="background-color: red; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'ordered')
                    <span style="background-color: green; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'packed')
                    <span style="background-color: darkorange; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'shipped')
                    <span style="background-color: darkcyan; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'delivered')
                    <span style="background-color: green; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'refund')
                    <span style="background-color: darkcyan; color: white;">{{ $order->status }}</span>
                    @elseif ($order->status == 'canceled')
                    <span style="background-color: red; color: white;">{{ $order->status }}</span>
                    @endif
                </div>
            </div>
        </div>
      </div>
      <table cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Item</th>
            <th class="unit">PRICE</th>
            <th class="qty">Qty</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $key=>$orderItem)
                <tr>
                    <td class="no">{{ ++$key }}</td>
                    <td class="desc">{{ substr($orderItem->product->name,0,25) }}..</td>
                    <td class="unit">{{ $setting->currency }}{{ $orderItem->price }}</td>
                    <td class="qty">{{ $orderItem->quantity }}</td>
                    <td class="total">{!! $setting->currency !!}{{ $orderItem->price * $orderItem->quantity }}</td>
                </tr>
            @endforeach
        </tbody>

      </table>
      <div id="thanks">Thank for shopping!</div>
      <div id="notices">
        <div>Signature:</div>
        <div class="notice">_____________________</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
