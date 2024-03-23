@section('page-title')
    Return Orders | Admin |
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
                                    <h5>All Return Orders</h5>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Ordered ID</th>
                                                    <th>User Name</th>
                                                    <th>Reason</th>
                                                    <th>Return Payment</th>
                                                    <th>Return Date</th>
                                                    <th>Payment Status</th>
                                                    <th colspan="2" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Return Orders Show-->
                                                @foreach($returnOrders as $key=>$returnOrder)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $returnOrder->order->order_id }}</td>
                                                    <td>{{ $returnOrder->user->name}}</td>
                                                    <td>{{ $returnOrder->return_reason }}</td>
                                                    <td>{{ $returnOrder->return_payment }}</td>
                                                    <td>{{ date('d F, Y',strtotime($returnOrder->return_date)) }}</td>
                                                    <td>
                                                        <!--Return Order Status Check-->
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
                                                    <td>
                                                        <a title="Details" href="{{route('admin.return.order.details',['return_order_id'=>$returnOrder->id])}}" class="text-info"><i class="fa fa-eye fa-2x"></i></a>
                                                    </td>
                                                    <td>
                                                        <!--Return Order Status Change Button-->
                                                        <div class="dropdown">
                                                            <button class="btn btn-success btn-sm dropdown-toggle" type="toggle" data-toggle="dropdown">
                                                                <i class="fa fa-check"></i>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" wire:click.prevent="updateTransactionStatus({{ $returnOrder->order->transaction->id }},'refunded')">Refunded</a></li>
                                                                <li><a href="#" wire:click.prevent="updateTransactionStatus({{ $returnOrder->order->transaction->id }},'declined')">Declined</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$returnOrders->links()}}
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
