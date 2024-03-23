@section('page-title')
    Order Details | Admin |
@endsection

<div>
    <!--Main Container-->
    <div class="container-fluid" style="padding: 30px 0; margin-left:15px; margin-right:15px;">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Admin Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Admin Dashboard Sidebar-->
                        <div class="col-md-4" wire:ignore>
                            @livewire('admin.admin-dashboard-sidebar-component')
                        </div>
                        <!--Admin Dashboard Right Panel-->
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Order Details</h5>
                                        </div>
                                        <!--All Orders List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.orders')}}" class="btn btn-info btn-sm pull-right">All Orders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="height: 1085px; overflow-y: scroll;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Order Status Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h5>Ordered ID: {{ $order->order_id }}</h5>
                                                        </div>
                                                        <!--Order Status Check-->
                                                        <div class="col-md-4">
                                                            @if($order->status == 'pending' && !$order->is_return_order)
                                                                <h5 class="badge badge-danger" style="background-color: red; color: white; float: right;">Pending  ({{ date('d F, Y',strtotime($order->created_at)) }})</h5>
                                                            @elseif($order->status == 'ordered' && !$order->is_return_order)
                                                                <h5 class="badge badge-success" style="background-color: green; color: white; float: right;">Ordered ({{ date('d F, Y',strtotime($order->ordered_date)) }})</h5>
                                                            @elseif($order->status == 'packed' && !$order->is_return_order)
                                                                <h5 class="badge badge-warning" style="background-color: darkorange; color: white; float: right;">Packed ({{ date('d F, Y',strtotime($order->packed_date)) }})</h5>
                                                            @elseif($order->status == 'shipped' && !$order->is_return_order)
                                                                <h5 class="badge badge-muted" style="background-color: darkcyan; color: white; float: right;">Shipped ({{ date('d F, Y',strtotime($order->shipped_date)) }})</h5>
                                                            @elseif($order->status == 'delivered' && !$order->is_return_order)
                                                                <h5 class="badge badge-success" style="background-color: green; color: white; float: right;">Delivered ({{ date('d F, Y',strtotime($order->delivered_date)) }})</h5>
                                                            @elseif($order->status == 'refund' && $order->is_return_order)
                                                                @if($order->transaction->status == 'refunded')
                                                                    <h5 class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Completed</h5>
                                                                @else
                                                                    <h5 class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Progress ({{ date('d F, Y',strtotime($order->refund_date)) }})</h5>
                                                                @endif
                                                            @elseif($order->status == 'canceled' && !$order->is_return_order)
                                                                <h5 class="badge badge-danger" style="background-color: red; color: white; float: right;">Canceled ({{ date('d F, Y',strtotime($order->canceled_date)) }})</h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="progress-track">
                                                        <!--Order Status Check for Progressbar-->
                                                        <ul id="progressbar">
                                                            @if($order->status == 'pending' && !$order->is_return_order)
                                                                <li class="step0 active" id="step1">Pending</li>
                                                                <li class="step0" id="step2">Ordered</li>
                                                                <li class="step0 text-center" id="step3">Packed</li>
                                                                <li class="step0 text-right" id="step4">Shipped</li>
                                                                <li class="step0 text-right" id="step5">Delivered</li>
                                                            @elseif($order->status == 'ordered' && !$order->is_return_order)
                                                                <li class="step0 active" id="step1">Pending</li>
                                                                <li class="step0 active" id="step2">Ordered</li>
                                                                <li class="step0 text-center" id="step3">Packed</li>
                                                                <li class="step0 text-right" id="step4">Shipped</li>
                                                                <li class="step0 text-right" id="step5">Delivered</li>
                                                            @elseif($order->status == 'packed' && !$order->is_return_order)
                                                                <li class="step0 active" id="step1">Pending</li>
                                                                <li class="step0 active" id="step2">Ordered</li>
                                                                <li class="step0 active text-center" id="step3">Packed</li>
                                                                <li class="step0 text-right" id="step4">Shipped</li>
                                                                <li class="step0 text-right" id="step5">Delivered</li>
                                                            @elseif($order->status == 'shipped' && !$order->is_return_order)
                                                                <li class="step0 active" id="step1">Pending</li>
                                                                <li class="step0 active" id="step2">Ordered</li>
                                                                <li class="step0 active text-center" id="step3">Packed</li>
                                                                <li class="step0 active text-right" id="step4">Shipped</li>
                                                                <li class="step0 text-right" id="step5">Delivered</li>
                                                            @elseif($order->status == 'delivered' && !$order->is_return_order)
                                                                <li class="step0 active" id="step1">Pending</li>
                                                                <li class="step0 active" id="step2">Ordered</li>
                                                                <li class="step0 active text-center" id="step3">Packed</li>
                                                                <li class="step0 active text-right" id="step4">Shipped</li>
                                                                <li class="step0 active text-right" id="step5">Delivered</li>
                                                            @elseif($order->status == 'refund' && $order->is_return_order)
                                                                @if ($order->transaction->status == 'refunded')
                                                                    <li class="step0 active" id="step1">Progress</li>
                                                                    <li class="step0 active" id="step2"></li>
                                                                    <li class="step0 active text-center" id="step3"></li>
                                                                    <li class="step0 active text-right" id="step4"></li>
                                                                    <li class="step0 active text-right" id="step5">Refund</li>
                                                                @else
                                                                    <li class="step0 active" id="step1">Progress</li>
                                                                    <li class="step0 active" id="step2"></li>
                                                                    <li class="step0 active text-center" id="step3"></li>
                                                                    <li class="step0 text-right" id="step4"></li>
                                                                    <li class="step0 text-right" id="step5">Refund</li>
                                                                @endif
                                                            @elseif($order->status == 'canceled' && !$order->is_return_order)
                                                                <span class="badge badge-danger" style="background-color: red; color: white;">Order is canceled!</span>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Order Items Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Order Items</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wrap-iten-in-cart">
                                                        <h3 class="box-title">Products Name</h3>
                                                        <ul class="products-cart">
                                                            <!--All Ordered Product Show-->
                                                            @foreach($order->orderItems as $item)
                                                            <li class="pr-cart-item">
                                                                <div class="product-image">
                                                                    <figure><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                                                </div>
                                                                <div class="product-name">
                                                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{substr($item->product->name,0,30)}}..</a>
                                                                </div>
                                                                <!--Ordered Product Attribute Show-->
                                                                @if($item->options)
                                                                <div class="product-name">
                                                                    @foreach(unserialize($item->options) as $key=>$value)
                                                                        <p><b>{{$key}}: {{$value}}</b></p>
                                                                    @endforeach
                                                                </div>
                                                                @endif
                                                                <div class="price-field produtc-price"><p class="price">{{$setting->currency}}{{$item->price}}</p></div>
                                                                <div class="quantity">
                                                                    <h5>{{$item->quantity}}</h5>
                                                                </div>
                                                                <div class="price-field sub-total"><p class="price">{{$setting->currency}}{{$item->price * $item->quantity}}</p></div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <!--Order Summary Show-->
                                                    <div class="summary">
                                                        <div class="order-summary">
                                                            <h4 class="title-box">Order Summary</h4>
                                                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{$setting->currency}}{{$order->subtotal}}</b></p>
                                                            <p class="summary-info"><span class="title">Tax</span><b class="index">{{$setting->currency}}{{$order->tax}}</b></p>
                                                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{$setting->currency}}{{$order->total}}</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Billing Details Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Billing Details</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="width: 100% !important; overflow-x: scroll;">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>{{$order->first_name}}</td>
                                                                <th>Last Name</th>
                                                                <td>{{$order->last_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <td>{{$order->mobile}}</td>
                                                                <th>Email</th>
                                                                <td>{{$order->email}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Line1</th>
                                                                <td>{{$order->line1}}</td>
                                                                <th>Line2</th>
                                                                <td>{{$order->line2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>{{$order->city}}</td>
                                                                <th>State</th>
                                                                <td>{{$order->state}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Zipcode</th>
                                                                <td>{{$order->zipcode}}</td>
                                                                <th>Country</th>
                                                                <td>{{$order->country}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Shipping Details Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Shipping Details</h5>
                                                </div>
                                                <!--Shipping Different Check for Customer-->
                                                @if($order->is_shipping_different)
                                                <div class="panel-body">
                                                    <div style="width: 100% !important; overflow-x: scroll;">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>{{$order->shipping->first_name}}</td>
                                                                <th>Last Name</th>
                                                                <td>{{$order->shipping->last_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <td>{{$order->shipping->mobile}}</td>
                                                                <th>Email</th>
                                                                <td>{{$order->shipping->email}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Line1</th>
                                                                <td>{{$order->shipping->line1}}</td>
                                                                <th>Line2</th>
                                                                <td>{{$order->shipping->line2}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>{{$order->shipping->city}}</td>
                                                                <th>State</th>
                                                                <td>{{$order->shipping->state}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Zipcode</th>
                                                                <td>{{$order->shipping->zipcode}}</td>
                                                                <th>Country</th>
                                                                <td>{{$order->shipping->country}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Transaction Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Transaction</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="width: 100% !important; overflow-x: scroll;">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Mode</th>
                                                                    <th>Status</th>
                                                                    <th>Transaction Date</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$order->transaction->mode}}</td>
                                                                    <!--Transaction Status Check-->
                                                                    <td>
                                                                        @if($order->transaction->status == 'pending')
                                                                            <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                                                        @elseif($order->transaction->status == 'approved')
                                                                            <span class="badge badge-success" style="background-color: green; color: white;">Approved</span>
                                                                        @elseif($order->transaction->status == 'declined')
                                                                            <span class="badge badge-danger" style="background-color: red; color: white;">Declined</span>
                                                                        @elseif($order->transaction->status == 'refunded')
                                                                            <span class="badge badge-info" style="background-color: darkcyan; color: white;">Refunded</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{date('d F, Y',strtotime($order->transaction->transaction_date))}}</td>
                                                                    <td>
                                                                        <!--Transaction Status Change Button-->
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-success btn-sm dropdown-toggle" type="toggle" data-toggle="dropdown">
                                                                                <i class="fa fa-check"></i>
                                                                                <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a href="#" wire:click.prevent="updateTransactionStatus({{$order->transaction->id}},'approved')">Approved</a></li>
                                                                                <li><a href="#" wire:click.prevent="updateTransactionStatus({{$order->transaction->id}},'declined')">Declined</a></li>
                                                                                <li><a href="#" wire:click.prevent="updateTransactionStatus({{$order->transaction->id}},'refunded')">Refunded</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
            </div>
        </div>
    </div>
</div>
