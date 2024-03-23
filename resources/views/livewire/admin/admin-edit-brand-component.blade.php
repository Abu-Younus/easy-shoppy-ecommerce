@section('page-title')
    Brand Edit | Admin |
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
                                            <h5>Update Brand</h5>
                                        </div>
                                        <!--All Brands Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.brands')}}" class="btn btn-info btn-sm pull-right">All Brands</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Brand Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateBrand" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Brand Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Brand Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Brand Slug <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Brand Slug" class="form-control input-md" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Brand Image Check-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Image</label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="newimage" />
                                                @if($newimage)
                                                    <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                                @else
                                                    <img src="{{asset('assets/images/brands')}}/{{$image}}" width="120"/>
                                                @endif
                                                @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
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

