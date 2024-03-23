@section('page-title')
    Dashboard | Admin |
@endsection

<div class="content">
    <!--Main Container-->
    <div class="container-fluid">
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
                                    <h5>My Dashboard</h5>
                                </div>
                                <div class="panel-body" style="height: 1085px; overflow-y: scroll;">
                                    <!--Admin Dashboard Total Revenue, Total Sales, Today Revenue, Today Sales, Pending Order, Total Canceled, Refund Compoleted, Total Refund and Total Customers Show-->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                          <div class="icon-stat">
                                            <div class="row">
                                              <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label">Total Revenue</span>
                                                <span class="icon-stat-value">{{$setting->currency}}{{$totalRevenue}}</span>
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
                                                <span class="icon-stat-label">Total Sales</span>
                                                <span class="icon-stat-value">{{$totalSales}}</span>
                                              </div>
                                              <div class="col-xs-4 text-center">
                                                <i class="fa fa-bolt icon-stat-visual bg-secondary"></i>
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
                                                <span class="icon-stat-label">Today Revenue</span>
                                                <span class="icon-stat-value">{{$setting->currency}}{{$todayRevenue}}</span>
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
                                                <span class="icon-stat-label">Today Sales</span>
                                                <span class="icon-stat-value">{{$todaySales}}</span>
                                              </div>
                                              <div class="col-xs-4 text-center">
                                                <i class="fa fa-bolt icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Pending Order</span>
                                                  <span class="icon-stat-value">{{ $pendingOrder }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-clock-o icon-stat-visual bg-primary"></i>
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
                                                  <span class="icon-stat-value">{{ $totalCanceled }}</span>
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
                                        <div class="col-md-4 col-sm-6">
                                            <div class="icon-stat">
                                              <div class="row">
                                                <div class="col-xs-8 text-left">
                                                  <span class="icon-stat-label">Refund Completed</span>
                                                  <span class="icon-stat-value">{{ $refundCompleted }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-check icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Total Refund</span>
                                                  <span class="icon-stat-value">{{$setting->currency}}{{ $totalRefund }}</span>
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
                                                  <span class="icon-stat-label">Total Customers</span>
                                                  <span class="icon-stat-value">{{ $totalCustomer }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-user icon-stat-visual bg-secondary"></i>
                                                </div>
                                              </div>
                                              <div class="icon-stat-footer">
                                                <i class="fa fa-clock-o"></i> Updated Now
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Admin Dashboard Total Reviews, Pending Tickets, Subscribers, Total Products, Inactive Products, Active Products, Total Categories, Total Brands and Active Coupons Show-->
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="icon-stat">
                                              <div class="row">
                                                <div class="col-xs-8 text-left">
                                                  <span class="icon-stat-label">Total Reviews</span>
                                                  <span class="icon-stat-value">{{ $totalReview }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-comments icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Pending Tickets</span>
                                                  <span class="icon-stat-value">{{ $pendingTicket }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-telegram icon-stat-visual bg-primary"></i>
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
                                                  <span class="icon-stat-label">Subscribers</span>
                                                  <span class="icon-stat-value">{{ $subscriber }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-bell icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Total Products</span>
                                                  <span class="icon-stat-value">{{ $totalProduct }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-product-hunt icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Active Products</span>
                                                  <span class="icon-stat-value">{{ $activeProduct }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-thumbs-up icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Inactive Products</span>
                                                  <span class="icon-stat-value">{{ $inactiveProduct }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-thumbs-down icon-stat-visual bg-primary"></i>
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
                                                  <span class="icon-stat-label">Total Categories</span>
                                                  <span class="icon-stat-value">{{ $totalCategory }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-key icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Total Brands</span>
                                                  <span class="icon-stat-value">{{ $totalBrand }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-bitcoin icon-stat-visual bg-secondary"></i>
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
                                                  <span class="icon-stat-label">Active Coupons</span>
                                                  <span class="icon-stat-value">{{ $activeCoupon }}</span>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                  <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                                                </div>
                                              </div>
                                              <div class="icon-stat-footer">
                                                <i class="fa fa-clock-o"></i> Updated Now
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Latest Orders Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Latest Orders</h5>
                                        </div>
                                        <div class="panel-body">
                                            <div style="width: 100% !important; overflow-x: scroll;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SL No.</th>
                                                            <th>OrderID</th>
                                                            <th>Subtotal</th>
                                                            <th>Discount</th>
                                                            <th>Tax</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Order Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--Latest Orders Show-->
                                                        @foreach($orders as $key=>$order)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>{{$setting->currency}}{{$order->subtotal}}</td>
                                                            <td>{{$setting->currency}}{{$order->discount}}</td>
                                                            <td>{{$setting->currency}}{{$order->tax}}</td>
                                                            <td>{{$setting->currency}}{{$order->total}}</td>
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
                                                                        <span class="badge badge-primary" style="background-color: darkcyan; color: white;">Refund Progress..</span>
                                                                    @endif
                                                                @elseif($order->status == 'canceled' && !$order->is_return_order)
                                                                    <span class="badge badge-danger" style="background-color: red; color: white;">Canceled</span>
                                                                @endif
                                                            </td>
                                                            <td>{{date('d F, Y',strtotime($order->ordered_date))}}</td>
                                                            <td>
                                                                <a title="Details" href="{{route('admin.orderdetails',['order_id'=>$order->order_id])}}"><i class="fa fa-eye fa-2x text-info"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Latest Customers Panel-->
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Latest Customers</h5>
                                        </div>
                                        <div class="panel-body">
                                            <div style="width: 100% !important; overflow-x: scroll;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>SL No.</th>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!--Latest Customers Show-->
                                                        @foreach($latestCustomers as $key=>$latestCustomer)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>
                                                                @if($latestCustomer->profile->image)
                                                                    <img src="{{ asset('assets/images/profile') }}/{{ $latestCustomer->profile->image }}" alt="{{ $latestCustomer->name }}" width="60" />
                                                                @else
                                                                    <img src="{{ asset('assets/images/profile/dummy-profile-pic.jpg') }}" width="60" />
                                                                @endif
                                                            </td>
                                                            <td>{{$latestCustomer->name}}</td>
                                                            <td>{{ $latestCustomer->email }}</td>
                                                            <td>
                                                                @if($latestCustomer->utype == 'USR')
                                                                    <span class="badge badge-success" style="background-color: green; color: white;">Customer</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a title="Details" href=""><i class="fa fa-eye fa-2x text-info"></i></a>
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
    </div>
</div>
