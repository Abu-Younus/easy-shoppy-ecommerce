<!DOCTYPE html>
<html lang="en">
    <!--Orders Report Header-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Orders Report | Admin | Easy Shoppy</title>
    </head>
    <!--Order Report Body-->
    <body>
        <!--Orders Report Show-->
        <h3 style="text-align: center;">Orders Report</h3>
        <hr class="divide-gray-700" style="border: 1px solid"/>
        <table border="1" cellspacing="0" cellpadding="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>SL NO.</th>
                    <th>Subtotal</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <!--All Orders Fetch-->
                @foreach($orders as $key=>$order)
                <tr>
                    <td style="padding-left: 10px; padding-right: 10px;">{{++$key}}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$order->subtotal}}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$order->discount}}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$order->tax}}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{$setting->currency}}{{$order->total}}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{ $order->payment_mode }}</td>
                    <td style="padding-left: 10px; padding-right: 10px;">
                        @if($order->status == 'pending' && !$order->is_return_order)
                            <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                        @elseif($order->status == 'ordered' && !$order->is_return_order)
                            <span class="badge badge-success" style="background-color: green; color: white;">Ordered</span>
                        @elseif($order->status == 'packed' && !$order->is_return_order)
                            <span class="badge badge-warning" style="background-color: darkorange; color: white;">Packed</span>
                        @elseif($order->status == 'shipped' && !$order->is_return_order)
                            <span class="badge badge-muted" style="background-color: darkcyan; color: white;">Shipped</span>
                        @elseif($order->status == 'delivered' && !$order->is_return_order)
                            <span class="badge badge-success" style="background-color: green; color: white;">Delivered</span>
                        @elseif($order->status == 'refund' && $order->is_return_order)
                            @if($order->transaction->status == 'refunded')
                                <span class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Completed</span>
                            @else
                                <span class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Progress</span>
                            @endif
                        @elseif($order->status == 'canceled' && !$order->is_return_order)
                            <span class="badge badge-danger" style="background-color: red; color: white;">Canceled</span>
                        @endif
                    </td>
                    <td style="padding-left: 10px; padding-right: 10px;">{{date('d F, Y',strtotime($order->ordered_date))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
