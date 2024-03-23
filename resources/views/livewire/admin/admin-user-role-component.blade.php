@section('page-title')
    User Role | Admin |
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
                                            <h5>All Role Users</h5>
                                        </div>
                                        <!--Add User Role Page Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add.user.role')}}" class="btn btn-info btn-sm pull-right">Add User Role</a>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role Access</th>
                                                    <th>User Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Role Admin Show-->
                                                @foreach($roleUsers as $key=>$roleUser)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        <!--Profile Image Show-->
                                                        @if($profile->image)
                                                            <img src="{{asset('assets/images/profile')}}/{{ $profile->image }}" alt="{{$roleUser->name}}" width="60" />
                                                        @else
                                                            <img src="{{asset('assets/images/profile/dummy-profile-pic.jpg')}}" alt="{{$roleUser->name}}" width="60" />
                                                        @endif
                                                    </td>

                                                    <td>{{$roleUser->name}}</td>
                                                    <td>{{$roleUser->email}}</td>
                                                    <!--Role Check-->
                                                    <td>
                                                        @if($roleUser->categories == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">categories</p>
                                                        @endif

                                                        @if($roleUser->brands == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">brands</p>
                                                        @endif

                                                        @if($roleUser->products == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">products</p>
                                                        @endif

                                                        @if($roleUser->pickup_points == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">pickup points</p>
                                                        @endif

                                                        @if($roleUser->warehouses == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">warehouses</p>
                                                        @endif

                                                        @if($roleUser->home_slider == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">home slider</p>
                                                        @endif

                                                        @if($roleUser->sale_setting == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">sale setting</p>
                                                        @endif

                                                        @if($roleUser->offers == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">offers</p>
                                                        @endif

                                                        @if($roleUser->orders == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">orders</p>
                                                        @endif

                                                        @if($roleUser->return_orders == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">return orders</p>
                                                        @endif

                                                        @if($roleUser->blog_categories == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">blog categories</p>
                                                        @endif

                                                        @if($roleUser->blogs == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">blogs</p>
                                                        @endif

                                                        @if($roleUser->user_role == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">user role</p>
                                                        @endif

                                                        @if($roleUser->contact_messages == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">contact messages</p>
                                                        @endif

                                                        @if($roleUser->product_questions == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">product questions</p>
                                                        @endif

                                                        @if($roleUser->tickets == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">tickets</p>
                                                        @endif

                                                        @if($roleUser->all_reports == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">all reports</p>
                                                        @endif

                                                        @if($roleUser->settings == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">settings</p>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if($roleUser->utype == 'ROLE_ADM')
                                                            <p class="badge badge-success" style="background-color: green; color: white;">Role Admin</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit.user.role',['user_id'=>$roleUser->id])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this user?') || event.stopImmediatePropagation()" wire:click.prevent="deleteUser({{$roleUser->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$roleUsers->links()}}
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

