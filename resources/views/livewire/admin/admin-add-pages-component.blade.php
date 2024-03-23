@section('page-title')
    Page Add | Admin |
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
                                            <h5>Add Page</h5>
                                        </div>
                                        <!--All Pages and All Settings Link Button-->
                                        <div class="col-md-8">
                                            <a href="{{route('admin.pages')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 4px;">All Pages</a>
                                            <a href="{{route('admin.settings')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;">All Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Page Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storePage" onsubmit="$('#processing').show();">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Position <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Position" class="form-control input-md" wire:model="position"  />
                                                @error('position') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Slug <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Slug" class="form-control input-md" readOnly="" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Title <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Title" class="form-control input-md" wire:model="title"  />
                                                @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description <span class="text-danger">*</span></label>
                                            <div class="col-md-4" wire:ignore>
                                                <textarea placeholder="Description" id="description" class="form-control input-md" wire:model="description"></textarea>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
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

@push('scripts')
    <script>
        //function of tinymce to page description
        $(function(){
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        })
    </script>
@endpush
