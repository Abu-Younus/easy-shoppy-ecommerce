@section('page-title')
    SMTP Configuration | Admin |
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
                                        <div class="col-md-4">
                                            <h5>SMTP Settings</h5>
                                        </div>
                                        <!--All Settings Page Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right">All Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--SMTP Setting Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="saveSMTP" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Mailer <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Mailer" class="form-control input-md" wire:model="mailer"  />
                                                <small class="text-primary">hint: (smtp)</small>
                                                @error('mailer') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Host <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Host" class="form-control input-md" wire:model="host"  />
                                                <small class="text-primary">hint: (smtp@gmail.com)</small>
                                                @error('host') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Port <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Port" class="form-control input-md" wire:model="port"  />
                                                <small class="text-primary">hint: (465)</small>
                                                @error('port') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">User Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="User Name" class="form-control input-md" wire:model="username"  />
                                                <small class="text-primary">hint: (your email address)</small>
                                                @error('username') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Email App Key <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Email App Key" class="form-control input-md" wire:model="app_key"  />
                                                <small class="text-primary">hint: (your email app key)</small>
                                                @error('app_key') <p class="text-danger">{{$message}}</p> @enderror
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
                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
