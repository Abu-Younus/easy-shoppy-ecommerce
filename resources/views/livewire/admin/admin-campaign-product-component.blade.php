@section('page-title')
    Campaign Product | Admin |
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
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>Product Add to Campaigns</h5>
                                </div>
                                <div class="panel-body">
                                    <div style="width: 100% !important; overflow-x: scroll;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL NO.</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Reg. Price</th>
                                                    <th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Brand</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--All Campaign Products List Show-->
                                                @foreach($products as $key=>$product)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" width="60"/></td>
                                                        <td>{{substr($product->name,0,40)}}..</td>
                                                        <td>{{$product->regular_price}}</td>
                                                        <td>{{$product->category->name}}</td>
                                                        <td>{{$product->subCategory->name}}</td>
                                                        <td>{{$product->brand->name}}</td>
                                                        <td>
                                                            <!--Product Status Check-->
                                                            @if($product->status == 1)
                                                                <p class="badge badge-success" style="background-color: green; color: white;">Acitve</p>
                                                            @else
                                                                <p class="badge badge-success" style="background-color: red; color: white;">Inacitve</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a title="Add" href="#" wire:click.prevent="campaignProductAdd({{ $product->id }})" class="text-primary"><i class="fa fa-plus fa-2x text-success"></i></a>
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
