@section('page-title')
    Coupon Edit | Admin |
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
                                        <div class="col-md-4">
                                            <h5>Update Coupon</h5>
                                        </div>
                                        <!--All Coupons and All Campaigns List Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.coupons')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px;">All Coupon</a>
                                            <a href="{{route('admin.campaigns')}}" class="btn btn-info btn-sm pull-right" style="margin-right:5px;">All Campaigns</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Coupon Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateCoupon" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Coupon Code <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Coupon Code" class="form-control input-md" wire:model="code" />
                                                @error('code') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Coupon Type <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <select class="form-control input-md" wire:model="type">
                                                    <option value="">Select Type</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>
                                                </select>
                                                @error('type') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Coupon Value <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value" />
                                                @error('value') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Cart Value <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value" />
                                                @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Expiry Date <span class="text-danger">*</span></label>
                                            <div class="col-md-4" wire:ignore>
                                                <input type="text" id="expiry-date" placeholder="Expiry Date" class="form-control input-md" wire:model="expiry_date" />
                                                @error('expiry_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Progress Loader-->
                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"></label>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        //function of datetimepicker to coupon expiry date
       $(function() {
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD',
            })
            .on('dp.change',function(ev) {
                var data = $('#expiry-date').val();
                @this.set('expiry_date',data);
            });
       });
    </script>
@endpush
