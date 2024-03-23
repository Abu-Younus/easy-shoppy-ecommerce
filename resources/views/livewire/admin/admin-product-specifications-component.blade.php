@section('page-title')
    Product Specifications | Admin |
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
                                            <h5>All Specifications</h5>
                                        </div>
                                        <!--Product Specifications Add and All Products Page Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add.product.specification')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 4px;">Add Specification</a>
                                            <a href="{{route('admin.products')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;">All Products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll; overflow-y: hidden;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--Product All Specifications Show-->
                                                @foreach($p_specifications as $key=>$p_specification)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$p_specification->name}}</td>
                                                    <td>{{$p_specification->created_at}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit.product.specification',['specification_id'=>$p_specification->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this specification?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSpecification({{$p_specification->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$p_specifications->links()}}
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


