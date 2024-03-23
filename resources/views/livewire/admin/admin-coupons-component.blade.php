@section('page-title')
    Coupons | Admin |
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
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>All Coupons</h5>
                                        </div>
                                        <!--Add Coupon and All Campaigns Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.addcoupon')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px;">Add Coupon</a>
                                            <a href="{{route('admin.campaigns')}}" class="btn btn-info btn-sm pull-right" style="margin-right:5px;">All Campaigns</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Coupon Code</th>
                                                    <th>Coupon Type</th>
                                                    <th>Coupon Value</th>
                                                    <th>Cart Value</th>
                                                    <th>Expiry Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Coupons Show-->
                                                @foreach($coupons as $key=>$coupon)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$coupon->code}}</td>
                                                    <td>{{$coupon->type}}</td>
                                                    @if($coupon->type == 'fixed')
                                                    <td>{{$setting->currency}}{{$coupon->value}}</td>
                                                    @else
                                                    <td>{{$coupon->value}} %</td>
                                                    @endif
                                                    <td>{{$setting->currency}}{{$coupon->cart_value}}</td>
                                                    <td>{{$coupon->expiry_date}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $coupons->links() }}
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
