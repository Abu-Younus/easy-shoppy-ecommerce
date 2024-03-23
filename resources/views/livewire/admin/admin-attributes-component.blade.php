@section('page-title')
    Attributes | Admin |
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
                                            <h5>All Attributes</h5>
                                        </div>
                                        <!--Add Attribute and All Products Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add_attribute')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 4px;">Add Attribute</a>
                                            <a href="{{route('admin.products')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;">All Products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--Product Attributes Show-->
                                                @foreach($pattributes as $key=>$pattribute)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$pattribute->name}}</td>
                                                    <td>{{$pattribute->created_at}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit_attribute',['attribute_id'=>$pattribute->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this attribute?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{$pattribute->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$pattributes->links()}}
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

