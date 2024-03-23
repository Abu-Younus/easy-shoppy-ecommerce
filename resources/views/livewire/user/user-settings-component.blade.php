@section('page-title')
    My Settings |
@endsection

<div>
    <!--Main Container-->
    <div class="container-fluid" style="padding: 30px 0; margin-left:15px; margin-right:15px;">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Customer Dashboard Sidebar-->
                        <div class="col-md-4">
                            @livewire('user.user-dashboard-sidebar-component')
                        </div>
                        <!--Customer Dashboard Right Panel-->
                        <div class="col-md-8">
                            <!--Profile Update Panel-->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>My Profile</h5>
                                </div>
                                <div class="panel-body">
                                    <!--Profile Update Form-->
                                    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data" onsubmit="$('#processing').show();">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if($newimage)
                                                <div id="circular-image-setting">
                                                    <img src="{{$newimage->temporaryUrl()}}" />
                                                </div>
                                                @elseif($image)
                                                <div id="circular-image-setting">
                                                    <img src="{{asset('assets/images/profile')}}/{{$image}}" />
                                                </div>
                                                @else
                                                <div id="circular-image-setting">
                                                    <img src="{{asset('assets/images/dummy.jpg')}}" />
                                                </div>
                                                @endif
                                                <input type="file" class="form-control" wire:model="newimage" />
                                            </div>
                                            <div class="col-md-8">
                                                <p><b>Name: </b><input type="text" class="form-control" wire:model="name" /></p>
                                                <p><b>Email: </b><input type="email" readonly="" class="form-control" wire:model="email" /></p>
                                                <p><b>Phone: </b><input type="text" class="form-control" wire:model="phone" /></p>
                                                <hr>
                                                <p><b>Line1: </b><input type="text" class="form-control" wire:model="line1" /></p>
                                                <p><b>Line2: </b><input type="text" class="form-control" wire:model="line2" /></p>
                                                <p><b>City: </b><input type="text" class="form-control" wire:model="city" /></p>
                                                <p><b>State: </b><input type="text" class="form-control" wire:model="state" /></p>
                                                <p><b>Country: </b><input type="text" class="form-control" wire:model="country" /></p>
                                                <p><b>Zipcode: </b><input type="text" class="form-control" wire:model="zipcode" /></p>
                                                @if($errors->isEmpty())
                                                <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                    <span>Processing...</span>
                                                </div>
                                                @endif
                                                <button type="submit" class="btn btn-info btn-sm pull-right mt-2">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Password Change Panel-->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>Password Change</h5>
                                </div>
                                <div class="panel-body">
                                    <!--Password Change Form-->
                                    <form class="form-horizontal" wire:submit.prevent="changePassword" onsubmit="$('#pass_processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Current Password*</label>
                                            <div class="col-md-9">
                                                <input type="password" placeholder="Current Password" class="form-control input-md" name="current_password" wire:model="current_password" />
                                                @error('current_password') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">New Password*</label>
                                            <div class="col-md-9">
                                                <input type="password" placeholder="New Password" class="form-control input-md" name="password" wire:model="password" />
                                                @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Confirm Password*</label>
                                            <div class="col-md-9">
                                                <input type="password" placeholder="Confirm Password" class="form-control input-md" name="password_confirmation" wire:model="password_confirmation" />
                                                @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        @if($errors->isEmpty())
                                        <div id="pass_processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                            <span>Processing...</span>
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

