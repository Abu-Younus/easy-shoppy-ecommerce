@section('page-title')
    Warehouse Edit | Admin |
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
                                            <h5>Update Warehouse</h5>
                                        </div>
                                        <!--All Warehouses List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.warehouses')}}" class="btn btn-info btn-sm pull-right">All Warehouses</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Warehouse Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateWarehouse" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name"  />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Address <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <textarea placeholder="Address" class="form-control input-md" wire:model="address"></textarea>
                                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Phone <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Phone" class="form-control input-md" wire:model="phone"  />
                                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror
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

