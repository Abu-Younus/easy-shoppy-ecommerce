@section('page-title')
    Product Specification Edit | Admin |
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
                                            <h5>Update Specification</h5>
                                        </div>
                                        <!--All Product Specifications and All Products List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.specifications')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 4px;">All Specifications</a>
                                            <a href="{{route('admin.products')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;">All Products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Product Specification Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateSpecification" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Specification Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Specification Name" class="form-control input-md" wire:model="name" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
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

