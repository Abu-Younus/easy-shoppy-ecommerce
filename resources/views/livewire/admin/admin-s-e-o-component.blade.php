@section('page-title')
    SEO Configuration | Admin |
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
                                            <h5>SEO Settings</h5>
                                        </div>
                                        <!--All Settings Page Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right">All Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Seo Setting Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="saveSEO" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Meta Title <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Meta Title" class="form-control input-md" wire:model="meta_title"  />
                                                @error('meta_title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Meta Author <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Meta Author" class="form-control input-md" wire:model="meta_author"  />
                                                @error('meta_author') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Meta Tags <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Meta Author" class="form-control input-md" wire:model="meta_tags"  />
                                                @error('meta_tags') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Meta Keyword <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Meta Keyword" class="form-control input-md" wire:model="meta_keyword"  />
                                                @error('meta_keyword') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Meta Description <span class="text-danger">*</span></label>
                                            <div class="col-md-9" wire:ignore>
                                                <textarea placeholder="Meta Description" id="meta_description" class="form-control input-md" wire:model="meta_description"></textarea>
                                                @error('meta_description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div><hr>

                                        <div class="form-group">
                                            <strong class="col-md-12 text-center text-success">---Others---</strong>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Google Verification</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Google Verification" class="form-control input-md" wire:model="google_verification" />
                                                <small class="text-info">put here only verification code.</small>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Google Analytics</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Google Analytics" class="form-control input-md" wire:model="google_analytics" />
                                                <small class="text-info">put here only verification code.</small>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Google Adsense</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Google Adsense" class="form-control input-md" wire:model="google_adsense" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alexa Verification</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Alexa Verification" class="form-control input-md" wire:model="alexa_verification" />
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

@push('scripts')
    <script>
        //function of tinymce to SEO Meta Description
        $(function(){
            tinymce.init({
                selector:'#meta_description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#meta_description').val();
                        @this.set('meta_description',d_data);
                    });
                }
            });
        })
    </script>
@endpush
