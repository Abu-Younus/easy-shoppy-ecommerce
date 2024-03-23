@section('page-title')
    Orders | Admin |
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
                                    <h5>All Orders</h5>
                                </div>
                                <div class="panel-body">
                                    <!--All Orders Search for Order Status, Payment Mode and Ordered Date-->
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
                                                    <th>Pay Mode</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th colspan="2" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Orders List Show-->
                                                @foreach($orders as $key=>$order)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$setting->currency}}{{$order->subtotal}}</td>
                                                    <td>{{$setting->currency}}{{$order->discount}}</td>
                                                    <td>{{$setting->currency}}{{$order->tax}}</td>
                                                    <td>{{$setting->currency}}{{$order->total}}</td>
                                                    <td>{{ $order->payment_mode }}</td>
                                                    <td>
                                                        <!--Order Status Check-->
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
                                                    <td>{{date('d F, Y',strtotime($order->ordered_date))}}</td>
                                                    <td>
                                                        <!--Order Details Button-->
                                                        <a title="Details" href="{{route('admin.orderdetails',['order_id'=>$order->order_id])}}"><i class="fa fa-eye fa-2x text-info"></i></a>
                                                    </td>
                                                    <td>
                                                        <!--Order Status Change Button-->
                                                        <div class="dropdown">
                                                            <button class="btn btn-success btn-sm dropdown-toggle" type="toggle" data-toggle="dropdown">
                                                                <i class="fa fa-check"></i>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'ordered')">Ordered</a></li>
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'packed')">Packed</a></li>
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'shipped')">Shipped</a></li>
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'refund')">Refund</a></li>
                                                                <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$orders->links()}}
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
