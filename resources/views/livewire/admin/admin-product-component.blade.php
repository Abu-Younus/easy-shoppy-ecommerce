@section('page-title')
    Products | Admin |
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
                                        <div class="col-md-3">
                                            <h5>All Products</h5>
                                        </div>
                                        <!--Add Product, All Attributes and Product Specifications Page Link Button-->
                                        <div class="col-md-6">
                                            <a title="Add Product" href="{{route('admin.addproduct')}}" class="btn btn-success btn-sm pull-right" style="margin-left:4px;">Add Product</a>
                                            <a title="Attributes" href="{{route('admin.attributes')}}" class="btn btn-primary btn-sm pull-right" style="margin-right:4px; margin-left: 4px;">Attributes</a>
                                            <a title="Specifications" href="{{route('admin.specifications')}}" class="btn btn-info btn-sm pull-right" style="margin-right:4px;">Specifications</a>
                                        </div>
                                        <!--Product Search Button-->
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>Purchase Price</th>
                                                    <th>Reg. Price</th>
                                                    <th>Dis. Price</th>
                                                    <th>Cate</th>
                                                    <th>Sub Cate</th>
                                                    <th>Child Cate</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Products Show-->
                                                @foreach($products as $key=>$product)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" width="60"/></td>
                                                        <td>{{substr($product->name,0,40)}}..</td>
                                                        <td>{{$product->quantity}}</td>
                                                        <td>{{$product->purchase_price}}</td>
                                                        <td>{{$product->regular_price}}</td>
                                                        <td>{{$product->discounted_price}}</td>
                                                        <td>{{$product->category->name}}</td>
                                                        <td>{{$product->subCategory->name}}</td>
                                                        <td>
                                                            @if($product->childcategory_id != null)
                                                                {{$product->childCategory->name}}
                                                            @else
                                                                <p>null</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!--Product Status Check-->
                                                            @if($product->status == 1)
                                                                <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                            @else
                                                                <p class="badge badge-success" style="background-color: red; color: white;">Inacitve</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a title="View" href="" class="text-primary"><i class="fa fa-eye fa-2x"></i></a>
                                                            <!--Product Status Active and Inactive Change Button-->
                                                            @if($product->status == 1)
                                                            <a title="Inactive" href="#" onclick="confirm('Are your sure! You want to inactive this product?') || event.stopImmediatePropagation()" wire:click.prevent="inactiveProduct({{$product->id}})"><i class="fa fa-thumbs-down fa-2x text-danger"></i></a>
                                                            @else
                                                            <a title="Active" href="#" onclick="confirm('Are your sure! You want to active this product?') || event.stopImmediatePropagation()" wire:click.prevent="activeProduct({{$product->id}})"><i class="fa fa-thumbs-up fa-2x text-success"></i></a>
                                                            @endif
                                                            <a title="Edit" href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}" class="text-primary"  style="margin-left: 5px;"><i class="fa fa-edit fa-2x"></i></a>
                                                            <!--Product Featured Check for Add Specification Button-->
                                                            @if($product->featured > 0)
                                                                @if($product->is_specification > 0)
                                                                    <a title="Edit Spec" href="{{route('admin.edit.specification_value',['product_slug'=>$product->slug])}}" class="text-primary" style="margin-left: 5px;"><i class="fa fa-pencil fa-2x text-warning"></i></a>
                                                                @else
                                                                    <a title="Add Spec" href="{{route('admin.add.specification_value',['product_slug'=>$product->slug])}}" class="text-primary" style="margin-left: 5px;"><i class="fa fa-plus fa-2x text-success"></i></a>
                                                                @endif
                                                            @endif
                                                            <a title="Delete" href="#" onclick="confirm('Are your sure! You want to delete this product?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})" style="margin-left: 5px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{$products->links()}}
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
