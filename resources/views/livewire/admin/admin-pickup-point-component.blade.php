@section('page-title')
    Pickup Points | Admin |
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
                                            <h5>All Pickup Points</h5>
                                        </div>
                                        <!--Add Pickup Point Page Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add_pickup_point')}}" class="btn btn-info btn-sm pull-right">Add Pickup Point</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Another Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Pickup Points Show-->
                                                @foreach($p_points as $key=>$p_point)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$p_point->name}}</td>
                                                    <td>{{$p_point->address}}</td>
                                                    <td>{{$p_point->phone}}</td>
                                                    <td>{{$p_point->phone2}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit_pickup_point',['p_point_id'=>$p_point->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this pickup point?') || event.stopImmediatePropagation()" wire:click.prevent="deletePickupPoint({{$p_point->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$p_points->links()}}
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


