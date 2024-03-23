@section('page-title')
    Settings | Admin |
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
                                        <div class="col-md-2">
                                            <h5>All Settings</h5>
                                        </div>
                                        <!--Admin and Role Admin Profile, All Pages, SEO Setting, SMTP Setting and Payment Gateway Setting Page Link Button-->
                                        <div class="col-md-10">
                                            <a title="Profile" href="{{route('admin.profile')}}" class="btn btn-info btn-sm pull-right" style="margin-left:4px;">Profile</a>
                                            <a title="Create Pages" href="{{route('admin.pages')}}" class="btn btn-warning btn-sm pull-right" style="margin-right:4px; margin-left:4px;">Create Pages</a>
                                            <a title="Create SEO" href="{{route('admin.seo')}}" class="btn btn-success btn-sm pull-right" style="margin-right:4px;  margin-left:4px;">Create SEO</a>
                                            <a title="SMTP Config" href="{{route('admin.smtp')}}" class="btn btn-primary btn-sm pull-right" style="margin-right:4px; margin-left:4px;">SMTP Config</a>
                                            <a title="Payment Gateway" href="{{route('admin.payment-gateway')}}" class="btn btn-info btn-sm pull-right" style="margin-right:4px; margin-left:4px;">Payment Gateway</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Website Setting Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="saveSettings" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Currency<span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="currency">
                                                    <option value="#">Select Currency</option>
                                                    <option value="৳">BDT</option>
                                                    <option value="$">USD</option>
                                                    <option value="₹">Rupee</option>
                                                </select>
                                                @error('currency') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Main Email <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Main Email" class="form-control input-md" wire:model="email"  />
                                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Support Email</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Support Email" class="form-control input-md" wire:model="support_email"  />
                                                @error('support_email') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Phone" class="form-control input-md" wire:model="phone" />
                                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Another Phone</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Another Phone" class="form-control input-md" wire:model="phone2" />
                                                @error('phone2') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Address" class="form-control input-md" wire:model="address" />
                                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Map <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Map" class="form-control input-md" wire:model="map" />
                                                @error('map') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <strong class="col-md-12 text-center text-success">Logo & Favicon</strong>
                                        </div>
                                        <!--Website Logo Show-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Logo <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                @if($setting->logo)
                                                    <img src="{{asset('assets/images/logo-favicon')}}/{{$setting->logo}}" width="120"/>
                                                @else
                                                    <input type="file" class="input-file" wire:model="logo" />
                                                    @if($logo)
                                                    <img src="{{$logo->temporaryUrl()}}" width="120"/>
                                                    @endif
                                                @endif
                                                @error('logo') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Website Favicon Show-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Favicon <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                @if($setting->favicon)
                                                    <img src="{{asset('assets/images/logo-favicon')}}/{{$setting->favicon}}" width="48"/>
                                                @else
                                                    <input type="file" class="input-file" wire:model="favicon" />
                                                    @if($favicon)
                                                    <img src="{{$favicon->temporaryUrl()}}" width="120"/>
                                                    @endif
                                                @endif
                                                @error('favicon') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
                                                <a href="{{route('admin.edit-logo-favicon',['setting_id'=>$setting->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <strong class="col-md-12 text-center text-success">Social Link</strong>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Twiter</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Twiter" class="form-control input-md" wire:model="twiter" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Facebook</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Facebook" class="form-control input-md" wire:model="facebook" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pinterest</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Pinterest" class="form-control input-md" wire:model="pinterest" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Instagram</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Instagram" class="form-control input-md" wire:model="instagram" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Youtube</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Youtube" class="form-control input-md" wire:model="youtube" />
                                            </div>
                                        </div>
                                        <!--Progress Loader-->
                                        @if($errors->isEmpty())
                                        <div id="processing" class="text-center" style="font-size:22px; margin-bottom:20px; color:blue; display:none;">
                                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
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
