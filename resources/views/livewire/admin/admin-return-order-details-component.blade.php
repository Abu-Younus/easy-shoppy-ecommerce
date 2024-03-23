@section('page-title')
    Return Order Details | Admin |
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
                                            <h5>Return Order Details</h5>
                                        </div>
                                        <!--All Return Orders Page Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.return.orders')}}" class="btn btn-info btn-sm pull-right">All Return Orders</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body" style="height: 925px; overflow-y: scroll;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Return Order Status Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h5>Ordered ID: {{ $returnOrder->order->order_id }}</h5>
                                                        </div>
                                                        <!--Return Order Status Check-->
                                                        <div class="col-md-4">
                                                            @if($returnOrder->order->status == 'refund' && $returnOrder->order->is_return_order)
                                                                @if($returnOrder->order->transaction->status == 'refunded')
                                                                    <h5 class="badge badge-primary" style="background-color: green; color: white; float: right;">Refund Completed ({{ date('d F, Y',strtotime($returnOrder->order->transaction->refunded_date)) }})</h5>
                                                                @else
                                                                    <h5 class="badge badge-primary" style="background-color: darkcyan; color: white; float: right;">Refund Progress.. ({{ date('d F, Y',strtotime($returnOrder->return_date)) }})</h5>
                                                                @endif
                                                            @elseif($returnOrder->order->transaction->status == 'declined')
                                                                <h5 class="badge badge-danger" style="background-color: red; color: white; float: right;">Declined ({{ date('d F, Y',strtotime($returnOrder->order->transaction->declined_date)) }})</h5>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="progress-track">
                                                        <!--Return Order Status Check to Progressbar-->
                                                        <ul id="progressbar">
                                                            @if($returnOrder->order->status == 'refund' && $returnOrder->order->is_return_order)
                                                                @if($returnOrder->order->transaction->status == 'refunded')
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
                                                            @elseif($returnOrder->order->transaction->status == 'declined')
                                                                <span class="badge badge-danger" style="background-color: red; color: white;">Refund is declined!</span>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Return Order Items Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Return Order Items</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="wrap-iten-in-cart">
                                                        <h3 class="box-title">Products Name</h3>
                                                        <ul class="products-cart">
                                                            <!--Return Order items Show-->
                                                            @foreach($returnOrder->order->orderItems as $item)
                                                            <li class="pr-cart-item">
                                                                <div class="product-image">
                                                                    <figure><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                                                </div>
                                                                <div class="product-name">
                                                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{substr($item->product->name,0,30)}}..</a>
                                                                </div>
                                                                <!--Return Order Items Attribute Show-->
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
                                                    <!--Return Order Summary-->
                                                    <div class="summary">
                                                        <div class="order-summary">
                                                            <h4 class="title-box">Return Order Summary</h4>
                                                            <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{$setting->currency}}{{$returnOrder->order->subtotal}}</b></p>
                                                            <p class="summary-info"><span class="title">Tax</span><b class="index">{{$setting->currency}}{{$returnOrder->order->tax}}</b></p>
                                                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{$setting->currency}}{{$returnOrder->order->total}}</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Return Order Payment Details Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Return Order Payment Details</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="width: 100% !important; overflow-x: scroll;">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>Return Payment Type</th>
                                                                <td>{{$returnOrder->return_payment}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Return Payment Details</th>
                                                                <td>
                                                                    <!--Return Order Payment Mode Check-->
                                                                    @if($returnOrder->return_payment == 'bkash')
                                                                        <span>bkash Number: <b>{{ $returnOrder->bkash_number }}</b></span>
                                                                    @elseif($returnOrder->return_payment == 'nagad')
                                                                        <span>bkash Number: <b>{{ $returnOrder->nagad_number }}</b></span>
                                                                    @elseif($returnOrder->return_payment == 'account')
                                                                        <span>Account Number: <b>{{ $returnOrder->bank_name }}</b></span>
                                                                        <span>Account Number: <b>{{ $returnOrder->account_number }}</b></span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Return Order Request Date</th>
                                                                <td>{{date('d F, Y',strtotime($returnOrder->return_date))}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Return Order Transaction Details Panel-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                                    <h5>Return Order Transaction of Customer</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="width: 100% !important; overflow-x: scroll;">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>Transaction Mode</th>
                                                                <td>{{$returnOrder->order->transaction->mode}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Transaction Status</th>
                                                                <td>
                                                                    <!--Transaction Status Check-->
                                                                    @if($returnOrder->order->status == 'refund' && $returnOrder->order->is_return_order)
                                                                        @if($returnOrder->order->transaction->status == 'refunded')
                                                                            <span class="badge badge-success" style="background-color: green; color: white;">Refund Completed</span>
                                                                        @else
                                                                            <span class="badge badge-success" style="background-color: darkcyan; color: white;">Refund Progress..</span>
                                                                        @endif
                                                                    @elseif($returnOrder->order->transaction->status == 'declined')
                                                                        <span class="badge badge-danger" style="background-color: red; color: white;">Declined</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Transaction Date</th>
                                                                <td>{{$returnOrder->order->transaction->transaction_date}}</td>
                                                            </tr>
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

