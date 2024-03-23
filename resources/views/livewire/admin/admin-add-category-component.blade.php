@section('page-title')
    Category Add | Admin |
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
                                            <h5>Add New Category</h5>
                                        </div>
                                        <!--All Categories Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.categories')}}" class="btn btn-info btn-sm pull-right">All Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--Category,Sub Category and Child Category Store Form-->
                                    <form class="form-horizontal" wire:submit.prevent="storeCategory" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Category Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Category Slug <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="Category Slug" class="form-control input-md" readOnly="" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Category ID Check to Category Image-->
                                        @if($category_id == null)
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Category Icon</label>
                                            <div class="col-md-4">
                                                <input type="file" class="input-file" wire:model="icon" />
                                                @if($icon)
                                                    <img src="{{$icon->temporaryUrl()}}" width="80"/>
                                                @endif
                                                @error('icon') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Parent Category</label>
                                            <div class="col-md-4">
                                                <select class="form-control input-md" wire:model="category_id" wire:change="changeSubCategory">
                                                    <option value="">None</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sub Category</label>
                                            <div class="col-md-4">
                                                <select class="form-control input-md" wire:model="subcategory_id">
                                                    <option value="">None</option>
                                                    @foreach($subCategories as $subCategory)
                                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                    @endforeach
                                                </select>
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
