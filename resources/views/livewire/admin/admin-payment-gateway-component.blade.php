@section('page-title')
    Payment Gateway Setting | Admin |
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
                                            <h5>Payment Gateway Setting</h5>
                                        </div>
                                        <!--All Settings Page Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right">All Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Aammar Pay Payment Gateway</h5>
                                        </div>
                                        <div class="panel-body">
                                            <!--Aammar Pay Payment Gateway Form-->
                                            <form class="form-horizontal" wire:submit.prevent="storeAammarPay" onsubmit="$('#processing').show();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Store ID <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Store ID" class="form-control input-md" wire:model="store_id"  />
                                                        @error('store_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Signature Key <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Signature Key" class="form-control input-md" wire:model="signature_key"  />
                                                        @error('signature_key') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Status <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <label style="margin-top: 5px;">
                                                            <input type="radio" name="status" value="live" wire:model="status" />
                                                            <span>Live Server</span>
                                                        </label>
                                                        <label style="margin-top: 5px; margin-left: 5px;">
                                                            <input type="radio" name="status" value="sandbox" wire:model="status" />
                                                            <span>Sandbox</span>
                                                        </label>
                                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
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

                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>Surjo Pay Payment Gateway</h5>
                                        </div>
                                        <div class="panel-body">
                                            <!--Surjoy Pay Payment Gateway Form-->
                                            <form class="form-horizontal" wire:submit.prevent="storeSurjoPay" onsubmit="$('#processing').show();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Store ID <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Store ID" class="form-control input-md" wire:model="store_id"  />
                                                        @error('store_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Signature Key <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Signature Key" class="form-control input-md" wire:model="signature_key"  />
                                                        @error('signature_key') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Status <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <label style="margin-top: 5px;">
                                                            <input type="radio" name="status" value="live" wire:model="status" />
                                                            <span>Live Server</span>
                                                        </label>
                                                        <label style="margin-top: 5px; margin-left: 5px;">
                                                            <input type="radio" name="status" value="sandbox" wire:model="status" />
                                                            <span>Sandbox</span>
                                                        </label>
                                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
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

                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                            <h5>SSL Commerz Payment Gateway</h5>
                                        </div>
                                        <div class="panel-body">
                                            <!--Bkash/Rocket/Nagad Payment Gateway Form-->
                                            <form class="form-horizontal" wire:submit.prevent="storeSSLCommerz" onsubmit="$('#processing').show();">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Store ID <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Store ID" class="form-control input-md" wire:model="store_id"  />
                                                        @error('store_id') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Signature Key <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Signature Key" class="form-control input-md" wire:model="signature_key"  />
                                                        @error('signature_key') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Status <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <label style="margin-top: 5px;">
                                                            <input type="radio" name="status" value="live" wire:model="status" />
                                                            <span>Live Server</span>
                                                        </label>
                                                        <label style="margin-top: 5px; margin-left: 5px;">
                                                            <input type="radio" name="status" value="sandbox" wire:model="status" />
                                                            <span>Sandbox</span>
                                                        </label>
                                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
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
    </div>
</div>

