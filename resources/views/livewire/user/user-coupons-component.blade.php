@section('page-title')
    My Coupons |
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
                        <h5>Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Customer Dashboard Sidebar-->
                        <div class="col-md-4">
                            @livewire('user.user-dashboard-sidebar-component')
                        </div>
                        <div class="col-md-8">
                            <!--Customer Dashboard Right Panel-->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>My Coupons</h5>
                                </div>
                                <div class="panel-body">
                                    <!--All Coupons List Show-->
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Coupon Code</th>
                                                    <th>Coupon Type</th>
                                                    <th>Coupon Offer</th>
                                                    <th>Starting Price</th>
                                                    <th>Expiry Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($coupons as $key=>$coupon)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{$coupon->code}}</td>
                                                    <td>{{$coupon->type}}</td>
                                                    @if($coupon->type == 'fixed')
                                                    <td>{{$setting->currency}}{{$coupon->value}}</td>
                                                    @else
                                                    <td>{{$coupon->value}} %</td>
                                                    @endif
                                                    <td>{{$setting->currency}}{{$coupon->cart_value}}</td>
                                                    <td>{{$coupon->expiry_date}}</td>
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
