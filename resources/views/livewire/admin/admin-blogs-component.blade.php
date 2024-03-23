@section('page-title')
    Blogs | Admin |
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
                                            <h5>All Blogs</h5>
                                        </div>
                                        <!--Add Blog Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add.blog')}}" class="btn btn-info btn-sm pull-right">Add Blog</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Image</th>
                                                    <th>Blog Cate. Name</th>
                                                    <th>Blog Title</th>
                                                    <th>Blog Slug</th>
                                                    <th>Pub. Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Blogs Show-->
                                                @foreach($blogs as $key=>$blog)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    @if($blog->image != null)
                                                        <td><img src="{{asset('assets/images/blogs')}}/{{$blog->image}}" alt="{{$blog->name}}" width="60" /></td>
                                                    @endif
                                                    <td>{{$blog->blogCategory->name}}</td>
                                                    <td>{{$blog->title}}</td>
                                                    <td>{{$blog->slug}}</td>
                                                    <td>{{Carbon\Carbon::parse($blog->published_date)->format('d F Y, g:i A')}}</td>
                                                    <td>
                                                        @if($blog->status == 1)
                                                            <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                        @else
                                                            <p class="badge badge-danger" style="background-color: red; color: white;">Inacitve</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a title="Edit" href="{{route('admin.edit.blog',['blog_slug'=>$blog->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                        <a title="Delete" href="#" onclick="confirm('Are you sure! You want to delete this blog?') || event.stopImmediatePropagation()" wire:click.prevent="deleteBlog({{$blog->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$blogs->links()}}
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



