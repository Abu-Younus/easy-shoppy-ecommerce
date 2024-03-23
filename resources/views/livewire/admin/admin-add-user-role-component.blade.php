@section('page-title')
    User Role Add | Admin |
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
                                            <h5>Add User Role</h5>
                                        </div>
                                        <!--All User Role Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.user.role')}}" class="btn btn-info btn-sm pull-right">All User Role</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--User Role Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeUserRole()" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="User Name" class="form-control input-md" wire:model="name" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="email" placeholder="User Name" class="form-control input-md" wire:model="email" />
                                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Password <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password" placeholder="User Password" class="form-control input-md" wire:model="password" />
                                                @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">User Roles <span class="text-danger">*</span></label>
                                            <!--User Role Show-->
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="categories" />
                                                            <span>Categories</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="brands" />
                                                            <span>Brands</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="products" />
                                                            <span>Products</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="pickup_points" />
                                                            <span>Pickup Points</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="warehouses" />
                                                            <span>Warehouses</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="home_slider" />
                                                            <span>Home Slider</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="sale_setting" />
                                                            <span>Sale Setting</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="offers" />
                                                            <span>Offers</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="orders" />
                                                            <span>Orders</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="return_orders" />
                                                            <span>Return Orders</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="blog_categories" />
                                                            <span>Blog Categories</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="blogs" />
                                                            <span>Blogs</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="user_role" />
                                                            <span>User Role</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="contact_messages" />
                                                            <span>Contact Messages</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="product_questions" />
                                                            <span>Product Questions</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="tickets" />
                                                            <span>Tickets</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="all_reports" />
                                                            <span>All Reports</span>
                                                        </label><br>
                                                        <label>
                                                            <input type="checkbox" value="1" wire:model="settings" />
                                                            <span>Settings</span>
                                                        </label>
                                                    </div>
                                                </div>
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
                                            <div class="col-md-6">
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
