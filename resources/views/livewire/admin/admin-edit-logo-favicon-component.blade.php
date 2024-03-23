@section('page-title')
    Logo-Favicon Edit | Admin |
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
                                           <h5>Logo & Favicon Update</h5>
                                        </div>
                                        <!--All Settings Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right">All Settings</a>
                                         </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Update Logo Favicon Form-->
                                    <form class="form-horizontal" wire:submit.prevent="updateLogoFavicon" onsubmit="$('#processing').show();">
                                        <!--Logo Check-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Logo <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="newlogo" />
                                                @if($newlogo)
                                                    <img src="{{$newlogo->temporaryUrl()}}" width="120"/>
                                                @else
                                                    <img src="{{asset('assets/images/logo-favicon')}}/{{$logo}}" width="120"/>
                                                @endif
                                                @error('newlogo') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Favicon Check-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Favicon <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="newfavicon" />
                                                @if($newfavicon)
                                                    <img src="{{$newfavicon->temporaryUrl()}}" width="120"/>
                                                @else
                                                    <img src="{{asset('assets/images/logo-favicon')}}/{{$favicon}}" width="48"/>
                                                @endif
                                                @error('newfavicon') <p class="text-danger">{{$message}}</p> @enderror
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
