@section('page-title')
    Categories | Admin |
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
                                            <h5>All Categories</h5>
                                        </div>
                                        <!--Add Category and Home Categories Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.addcategory')}}" class="btn btn-success btn-sm pull-right" style="margin-left: 5px;">Add Category</a>
                                            <a title="Home Categories" href="{{route('admin.homecategories')}}" class="btn btn-info btn-sm pull-right" style="margin-right: 5px;">Home Categories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div style="width: 100% !important; overflow-x: scroll;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Cate Icon</th>
                                                <th>Cate Name</th>
                                                <th>Cate Slug</th>
                                                <th>Sub Cate & Child Cate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--All Categories Show-->
                                            @foreach($categories as $key=>$category)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td><img src="{{asset('assets/images/category')}}/{{$category->icon}}" alt="{{$category->name}}" width="80" /> </td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->slug}}</td>

                                                <td>
                                                    <ul class="sclist">
                                                        <!--Category Related All Sub Categories-->
                                                        @foreach($category->subCategories as $subCategory)
                                                            <li><i class="fa fa-caret-right"></i>{{$subCategory->name}}
                                                                <a href="{{route('admin.editcategory',['category_slug'=>$category->slug, 'subcategory_slug'=>$subCategory->slug])}}" class="slink">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="#" class="slink" onclick="confirm('Are your sure! You want to delete this Sub Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubCategory({{$subCategory->id}})">
                                                                    <i class="fa fa-times text-danger"></i>
                                                                </a>
                                                                <ul class="cclist">
                                                                    <!--Sub Category Related All Child Categories-->
                                                                    @foreach($subCategory->childCategories as $childCategory)
                                                                        <li><i class="fa fa-caret-right text-primary"></i>{{$childCategory->name}}
                                                                            <a href="{{route('admin.editcategory',['category_slug'=>$category->slug, 'subcategory_slug'=>$subCategory->slug, 'childcategory_slug'=>$childCategory->slug])}}" class="clink">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a href="#" class="clink" onclick="confirm('Are your sure! You want to delete this Child Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteChildCategory({{$childCategory->id}})">
                                                                                <i class="fa fa-times text-danger"></i>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>

                                                <td>
                                                    <!--Category Status Check-->
                                                    @if($category->active_status == 1)
                                                        <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                    @else
                                                        <p class="badge badge-danger" style="background-color: red; color: white;">Inacitve</p>
                                                    @endif
                                                </td>

                                                <td>
                                                    <!--Inactive and Active Category Action-->
                                                    @if($category->active_status == 1)
                                                    <a title="Inactive" href="#" onclick="confirm('Are your sure! You want to inactive this category?') || event.stopImmediatePropagation()" wire:click.prevent="inactiveCategory({{$category->id}})"><i class="fa fa-thumbs-down fa-2x text-danger"></i></a>
                                                    @else
                                                    <a title="Active" href="#" onclick="confirm('Are your sure! You want to active this category?') || event.stopImmediatePropagation()" wire:click.prevent="activeCategory({{$category->id}})"><i class="fa fa-thumbs-up fa-2x text-success"></i></a>
                                                    @endif
                                                    <!--Edit and Delete Category Action-->
                                                    <a title="Edit" href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}" class="text-primary"><i class="fa fa-edit fa-2x"></i></a>
                                                    <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$categories->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
