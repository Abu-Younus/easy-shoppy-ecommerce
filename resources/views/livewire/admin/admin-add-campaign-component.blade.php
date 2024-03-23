@section('page-title')
    Campaign Add | Admin |
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
                                            <h5>Add New Campaign</h5>
                                        </div>
                                        <!--All Campaigns and All Coupons Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.campaigns')}}" class="btn btn-success btn-sm pull-right" style="margin-left:5px;">All Campaigns</a>
                                            <a href="{{route('admin.coupons')}}" class="btn btn-info btn-sm pull-right" style="margin-right:5px;">All Coupons</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Campaign Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeCampaign" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Start Date <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="date" placeholder="Start Date" class="form-control input-md" wire:model="start_date" />
                                                @error('start_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Title <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Campaign Title" class="form-control input-md" wire:model="title" />
                                                @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sub Title <span class="text-secondary">(optional)</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Campaign Sub Title" class="form-control input-md" wire:model="subtitle" />
                                                @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Date <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="date" placeholder="End Date" class="form-control input-md" wire:model="end_date" />
                                                @error('end_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Campaign Image <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="image" />
                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="120"/>
                                                @endif
                                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Discount (%) <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Discount (%)" class="form-control input-md" wire:model="discount" />
                                                <small class="form-text text-primary">Note: Discount percantage is apply for all products.</small>
                                                @error('discount') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Status <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <select class="form-control" wire:model="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
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
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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

