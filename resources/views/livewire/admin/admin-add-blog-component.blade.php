@section('page-title')
    Blog Add | Admin |
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
                                            <h5>Add New Blog</h5>
                                        </div>
                                        <!--All Blogs Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.blogs')}}" class="btn btn-info btn-sm pull-right">All Blogs</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Store Blog Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeBlog" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Blog Category Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <select class="form-control input-md" wire:model="blog_category_id" >
                                                    <option value="">Select Blog Category Name</option>
                                                    @foreach($blogCategories as $blogCategory)
                                                    <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('blog_category_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Blog Title <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Blog Title" class="form-control input-md" wire:model="title" wire:keyup="generateSlug" />
                                                @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Blog Slug <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Blog Slug" class="form-control input-md" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Blog Description <span class="text-danger">*</span></label>
                                            <div class="col-md-4" wire:ignore>
                                                <textarea class="form-control" id="description" placeholder="Blog Description" wire:model="description"></textarea>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tags <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Tags" class="form-control input-md" wire:model="tags" />
                                                <small class="text-danger">tags seperate by comma.</small>
                                                @error('tags') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Image <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="image" />
                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="120"/>
                                                @endif
                                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Status <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <select class="form-control input-md" wire:model="status" >
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Published DateTime <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <div class="choose-payment-methods">
                                                    <label class="payment-method">
                                                        <input name="published_date" id="payment-method-bank" value="schedule" type="radio" wire:model="published_date">
                                                        <span>Schedule</span>
                                                    </label>
                                                    <label class="payment-method">
                                                        <input name="published_date" id="payment-method-visa" value="current" type="radio" wire:model="published_date">
                                                        <span>Current</span>
                                                    </label>
                                                </div>
                                                @error('published_date') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        @if($published_date == 'schedule')
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Schedule DateTime <span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="datetime-local" class="form-control input-md" wire:model="schedule_datetime" />
                                                    @error('schedule_datetime') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        @endif
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
        //function of tinymce to blog description
        $(function(){
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var data = $('#description').val();
                        @this.set('description',data);
                    });
                }
            });
        });
    </script>
@endpush
