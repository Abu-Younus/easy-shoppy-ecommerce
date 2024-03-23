@section('page-title')
    My Dashboard |
@endsection
<!--Main Content-->
<div class="content">
    <!--Main Container-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Dashboard</h5>
                      </div>
                    <div class="panel-body">
                        <!--Customer Dashboard Sidebar-->
                        <div class="col-md-4">
                            @livewire('user.user-dashboard-sidebar-component')
                        </div>
                        <!--Customer Dashboard Right Panel-->
                        <div class="col-md-8">
                            <!--Customers Total Cost, Purchase, Delivered, Canceled Order Show-->
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                  <div class="icon-stat">
                                    <div class="row">
                                      <div class="col-xs-8 text-left">
                                        <span class="icon-stat-label">Total Cost</span>
                                        <span class="icon-stat-value">{{$setting->currency}}{{$totalCost}}</span>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                                      </div>
                                    </div>
                                    <div class="icon-stat-footer">
                                      <i class="fa fa-clock-o"></i> Updated Now
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                  <div class="icon-stat">
                                    <div class="row">
                                      <div class="col-xs-8 text-left">
                                        <span class="icon-stat-label">Total Purchase</span>
                                        <span class="icon-stat-value">{{$totalPurchase}}</span>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <i class="fa fa-shopping-cart icon-stat-visual bg-secondary"></i>
                                      </div>
                                    </div>
                                    <div class="icon-stat-footer">
                                      <i class="fa fa-clock-o"></i> Updated Now
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="icon-stat">
                                      <div class="row">
                                        <div class="col-xs-8 text-left">
                                          <span class="icon-stat-label">Today Cost</span>
                                          <span class="icon-stat-value">{{$todayCost}}</span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                          <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                                        </div>
                                      </div>
                                      <div class="icon-stat-footer">
                                        <i class="fa fa-clock-o"></i> Updated Now
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-sm-6">
                                    <div class="icon-stat">
                                      <div class="row">
                                        <div class="col-xs-8 text-left">
                                          <span class="icon-stat-label">Today Purchase</span>
                                          <span class="icon-stat-value">{{$todayPurchase}}</span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                          <i class="fa fa-shopping-cart icon-stat-visual bg-secondary"></i>
                                        </div>
                                      </div>
                                      <div class="icon-stat-footer">
                                        <i class="fa fa-clock-o"></i> Updated Now
                                      </div>
                                    </div>
                                  </div>
                                <div class="col-md-4 col-sm-6">
                                  <div class="icon-stat">
                                    <div class="row">
                                      <div class="col-xs-8 text-left">
                                        <span class="icon-stat-label">Total Delivered</span>
                                        <span class="icon-stat-value">{{$totalDelivered}}</span>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <i class="fa fa-truck icon-stat-visual bg-secondary"></i>
                                      </div>
                                    </div>
                                    <div class="icon-stat-footer">
                                      <i class="fa fa-clock-o"></i> Updated Now
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                  <div class="icon-stat">
                                    <div class="row">
                                      <div class="col-xs-8 text-left">
                                        <span class="icon-stat-label">Total Canceled</span>
                                        <span class="icon-stat-value">{{$totalCanceled}}</span>
                                      </div>
                                      <div class="col-xs-4 text-center">
                                        <i class="fa fa-times icon-stat-visual bg-primary"></i>
                                      </div>
                                    </div>
                                    <div class="icon-stat-footer">
                                      <i class="fa fa-clock-o"></i> Updated Now
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <!--Recent Orders Show-->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>Recent Orders</h5>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Order ID</th>
                                                    <th>Subtotal</th>
                                                    <th>Discount</th>
                                                    <th>Tax</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $key=>$order)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td><span class="badge badge-muted">{{ $order->order_id }}</span></td>
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
                                                                <span class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Progress..</span>
                                                            @endif
                                                        @elseif($order->status == 'canceled' && !$order->is_return_order)
                                                            <span class="badge badge-danger" style="background-color: red; color: white;">Canceled</span>
                                                        @endif
                                                    </td>
                                                    <td>{{date('d F, Y',strtotime($order->ordered_date))}}</td>
                                                    <td>
                                                        <a title="Details" href="{{route('user.orderdetails',['order_id'=>$order->order_id])}}"><i class="fa fa-eye fa-2x text-info"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
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
