@section('page-title')
    Pages | Admin |
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
                                        <div class="col-md-4">
                                            <h5>All Pages</h5>
                                        </div>
                                        <!--Add Page and Admin Settngs Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.addpage')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 4px;">Add Page</a>
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;">All Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Position</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Pages Show-->
                                                @foreach($pages as $key=>$page)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{ $page->position }}</td>
                                                    <td>{{$page->name}}</td>
                                                    <td>{{$page->slug}}</td>
                                                    <td>{{$page->title}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.editpage',['page_slug'=>$page->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this page?') || event.stopImmediatePropagation()" wire:click.prevent="deletepage({{$page->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$pages->links()}}
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

