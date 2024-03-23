@section('page-title')
    Product Specification Value Edit | Admin |
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
                                            <h5>Update Specification Value</h5>
                                        </div>
                                        <!--All Products List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.products')}}" class="btn btn-info btn-sm pull-right">All Products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Product Specification Value Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateSpecificationValue" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Specifications</label>
                                            <div class="col-md-7">
                                                <select class="form-control input-md" wire:model="spec">
                                                    <option value="">Select Specification</option>
                                                    <!--Product Specification Show-->
                                                    @foreach($p_specifications as $p_specification)
                                                        <option value="{{$p_specification->id}}">{{$p_specification->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--Product Specification Value Add Button-->
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                                            </div>
                                        </div>
                                        <!--Product Specification Value Add Input Show-->
                                        @foreach($inputs as $key=>$value)
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">{{$p_specifications->where('id',$specification_arr[$key])->first()->name}}</label>
                                                <div class="col-md-7">
                                                    <input type="text" placeholder="{{$p_specifications->where('id',$specification_arr[$key])->first()->name}}" class="form-control input-md" wire:model="specification_values.{{$value}}" />
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!--Progress Loader-->
                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
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

