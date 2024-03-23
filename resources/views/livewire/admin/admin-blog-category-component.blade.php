@section('page-title')
    Blog Category | Admin |
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
                                            <h5>All Blog Categories</h5>
                                        </div>
                                        <!--Add Blog Category Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add.blog.category')}}" class="btn btn-info btn-sm pull-right">Add Blog Category</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Blog Cate. Name</th>
                                                    <th>Blog Cate. Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--Blog Categories Show-->
                                                @foreach($blogCategories as $key=>$blogCategory)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$blogCategory->name}}</td>
                                                    <td>{{$blogCategory->slug}}</td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit.blog.category',['blog_category_slug'=>$blogCategory->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this blog category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteBlogCategory({{$blogCategory->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$blogCategories->links()}}
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


