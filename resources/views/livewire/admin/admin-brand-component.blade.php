@section('page-title')
    Brands | Admin |
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
                                        <div class="col-md-6">
                                            <h5>All Brands</h5>
                                        </div>
                                        <!--Brand Add Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.addbrand')}}" class="btn btn-info btn-sm pull-right">Add Brand</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Image</th>
                                                    <th>Brand Name</th>
                                                    <th>Brand Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Brands List Show-->
                                                @foreach($brands as $key=>$brand)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    @if($brand->image != null)
                                                    <td><img src="{{asset('assets/images/brands')}}/{{$brand->image}}" alt="{{$brand->name}}" width="60" /></td>
                                                    @endif
                                                    <td>{{$brand->name}}</td>
                                                    <td>{{$brand->slug}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.editbrand',['brand_slug'=>$brand->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this brand?') || event.stopImmediatePropagation()" wire:click.prevent="deleteBrand({{$brand->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$brands->links()}}
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

