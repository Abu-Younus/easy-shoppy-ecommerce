@section('page-title')
    All Reports | Admin |
@endsection

<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
    </style>
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
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>All Reports</h5>
                                </div>
                                <div class="panel-body" style="height: 1085px; overflow-y: scroll;">
                                    <!--All Orders Report Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>All Orders Report</h5>
                                        </div>
                                        <div class="panel-body" style="height: 280px; overflow-y: scroll">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Order Status</label>
                                                        <select class="form-control" wire:model="order_status">
                                                            <option value="#">All</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="ordered">Ordered</option>
                                                            <option value="packed">Packed</option>
                                                            <option value="shipped">Shipped</option>
                                                            <option value="delivered">Delivered</option>
                                                            <option value="refund">Refund</option>
                                                            <option value="canceled">Canceled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Payment Mode</label>
                                                        <select class="form-control" wire:model="payment_mode">
                                                            <option value="#">All</option>
                                                            <option value="cod">Cash on Delivery</option>
                                                            <option value="card">Card</option>
                                                            <option value="bkash">bkash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ordered Date</label>
                                                        <input type="date" class="form-control" wire:model="ordered_date" />
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <!--Orders Report Print Button-->
                                                <div class="col-md-12">
                                                    <a title="Print" class="btn btn-info btn-sm" style="float: right" href="{{ route('admin.all.orders.report') }}">Print</a>
                                                </div>
                                            </div>
                                            <div style="width: 100% !important; overflow-x: scroll;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO.</th>
                                                            <th>Subtotal</th>
                                                            <th>Discount</th>
                                                            <th>Tax</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Pay Mode</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--Orders Show-->
                                                        @foreach($orders as $key=>$order)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$setting->currency}}{{$order->subtotal}}</td>
                                                            <td>{{$setting->currency}}{{$order->discount}}</td>
                                                            <td>{{$setting->currency}}{{$order->tax}}</td>
                                                            <td>{{$setting->currency}}{{$order->total}}</td>
                                                            <td>
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
                                                            <td>
                                                                {{ $order->payment_mode }}
                                                            </td>
                                                            <td>{{date('d F, Y',strtotime($order->ordered_date))}}</td>
                                                            <td>
                                                                <a title="Invoice" href="{{ route('admin.order.invoice',['order_id'=>$order->order_id]) }}"><i class="fa fa-download fa-2x text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{$orders->links()}}
                                            </div>
                                        </div>
                                    </div>
                                    <!--Product Stock Report Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Product Stock Report</h5>
                                        </div>
                                        <div class="panel-body" style="height: 280px; overflow-y: scroll">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Stock</label>
                                                        <select class="form-control" wire:model="stock_status">
                                                            <option value="#">All</option>
                                                            <option value="instock">Instock</option>
                                                            <option value="outofstock">Out of Stock</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" wire:model="product_status">
                                                            <option value="#">All</option>
                                                            <option value="active">Active</option>
                                                            <option value="inactive">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <!--Product Stock Report Print Button-->
                                                <div class="col-md-12">
                                                    <a title="Print" class="btn btn-info btn-sm" style="float: right" href="{{ route('admin.product.stock.report') }}">Print</a>
                                                </div>
                                            </div>
                                            <div style="width: 100% !important; overflow-x: scroll;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO.</th>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Stock</th>
                                                            <th>Reg. Price</th>
                                                            <th>Disc. Price</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--Products Show-->
                                                        @foreach($products as $key=>$product)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="{{ $product->name }}" width="60" /></td>
                                                            <td><a title="{{ $product->name }}" href="{{ route('product.details',['slug'=>$product->slug]) }}">{{substr($product->name,0,20)}}..</a></td>
                                                            <td>
                                                                @if($product->quantity >= 1)
                                                                    <span class="badge badge-success" style="background-color: green; color: white;">Available</span>
                                                                @else
                                                                    <span class="badge badge-danger" style="background-color: red; color: white;">Stock Out</span>
                                                                @endif
                                                            </td>
                                                            <td>{{$setting->currency}}{{$product->regular_price}}</td>
                                                            <td>{{$setting->currency}}{{$product->discounted_price}}</td>
                                                            <td>
                                                                @if($product->status == 1)
                                                                    <span class="badge badge-success" style="background-color: green; color: white;">Active</span>
                                                                @else
                                                                    <span class="badge badge-danger" style="background-color: red; color: white;">Inactive</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{$products->links()}}
                                            </div>
                                        </div>
                                    </div>
                                    <!--All Tickets Report Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>All Tickets Report</h5>
                                        </div>
                                        <div class="panel-body" style="height: 280px; overflow-y: scroll">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Ticket Type</label>
                                                        <select class="form-control" wire:model="ticket_type">
                                                            <option value="#">All</option>
                                                            <option value="technical">Technical</option>
                                                            <option value="payment">Payment</option>
                                                            <option value="affiliate">Affiliate</option>
                                                            <option value="return">Return</option>
                                                            <option value="refund">Refund</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" wire:model="ticket_status">
                                                            <option value="#">All</option>
                                                            <option value="0">Pending</option>
                                                            <option value="1">Replied</option>
                                                            <option value="2">Closed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="date" class="form-control" wire:model="date" />
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <!--All Tickets Report Print Button-->
                                                <div class="col-md-12">
                                                    <a title="Print" class="btn btn-info btn-sm" style="float: right" href="{{ route('admin.all.tickets.report') }}">Print</a>
                                                </div>
                                            </div>
                                            <div style="width: 100% !important; overflow-x: scroll">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SL NO.</th>
                                                            <th>User</th>
                                                            <th>Subject</th>
                                                            <th>Service</th>
                                                            <th>Priority</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--All Tickets Show-->
                                                        @foreach($tickets as $key=>$ticket)
                                                        <tr>
                                                            <td>{{++$key}}</td>
                                                            <td>{{$ticket->user->name}}</td>
                                                            <td>{{$ticket->subject}}</td>
                                                            <td>{{$ticket->service}}</td>
                                                            <td>{{$ticket->priority}}</td>
                                                            <td>
                                                                @if($ticket->status == 0)
                                                                    <span class="badge badge-danger" style="background-color: red; color: white;">Pending</span>
                                                                @elseif($ticket->status == 1)
                                                                    <span class="badge badge-success" style="background-color: green; color: white;">Replied</span>
                                                                @elseif($ticket->status == 2)
                                                                    <span class="badge badge-muted">Closed</span>
                                                                @endif
                                                            </td>
                                                            <td>{{date('d F, Y',strtotime($ticket->date))}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{$tickets->links()}}
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

