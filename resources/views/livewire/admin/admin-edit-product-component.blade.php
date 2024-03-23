@section('page-title')
    Product Edit | Admin |
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
                                            <h5>Update Product</h5>
                                        </div>
                                        <!--All Products List Link Button-->
                                        <div class="col-md-6">
                                            <a href="{{route('admin.products')}}" class="btn btn-info btn-sm pull-right">All Products</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct" onsubmit="$('#processing').show();">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Name <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug" />
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Slug <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Product Slug" class="form-control input-md" readOnly="" wire:model="slug" />
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Short Description</label>
                                            <div class="col-md-9" wire:ignore>
                                                <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                                @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Description <span class="text-danger">*</span></label>
                                            <div class="col-md-9" wire:ignore>
                                                <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                                @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Purchase Price <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Purchase Price" class="form-control input-md" wire:model="purchase_price" />
                                                @error('purchase_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Regular Price <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price" />
                                                @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Discounted Price</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Discounted Price" class="form-control input-md" wire:model="discounted_price" />
                                                @error('discounted_price') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Unit <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="unit">
                                                    <option>Select unit</option>
                                                    <option value="pcs">pcs</option>
                                                    <option value="kg">kg</option>
                                                </select>
                                                @error('unit') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">SKU <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU" />
                                                @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Featured</label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="featured">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Today Deal</label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="today_deal">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                @error('today_deal') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Cash on Delivery</label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="cash_on_delivery">
                                                    <option value="1">Available</option>
                                                    <option value="0">Not Available</option>
                                                </select>
                                                @error('cash_on_delivery') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Cash On Delivery Available Check to Delivery Place-->
                                        @if($cash_on_delivery)
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Delivery Place <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Delivery Place" class="form-control input-md" wire:model="delivery_place" />
                                                @error('delivery_place') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Trendy Product</label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="trendy_product">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                                @error('trendy_product') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Quantity<span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity" />
                                                @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Product Image Show-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Image <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="file" class="input-file" wire:model="newimage" />
                                                @if($newimage)
                                                    <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                                @else
                                                    <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"/>
                                                @endif
                                                @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                        <!--Product Gallery Show-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Gallery</label>
                                            <div class="col-md-9">
                                                <input type="file" class="input-file" wire:model="newimages" multiple/>
                                                @if($newimages)
                                                    @foreach($newimages as $newimage)
                                                        @if($newimage)
                                                        <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach($images as $image)
                                                        @if($image)
                                                        <img src="{{asset('assets/images/products')}}/{{$image}}" width="120"/>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!--Product Video Show-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Video</label>
                                            <div class="col-md-9">
                                                <input type="file" class="input-file" wire:model="newvideo" />
                                                @if($newvideo)
                                                    <video width="320" height="240" autoplay>
                                                        <source src="{{$newvideo->temporaryUrl()}}" type="video/mp4" />
                                                    </video>
                                                @else
                                                    @if($video)
                                                    <video width="320" height="240" autoplay>
                                                        <source src="{{asset('assets/images/product-videos')}}/{{$video}}" type="video/mp4" />
                                                    </video>
                                                    @endif
                                                @endif
                                                @error('video') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Category <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="category_id" wire:change="changeSubCategory">
                                                    <option value="">Select Category</option>
                                                    <!--All Categories Show-->
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Sub Category <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="subcategory_id" wire:change="changeChildCategory">
                                                    <option value="">Select Subcategory</option>
                                                    <!--Category Related All Sub Categories Show-->
                                                    @foreach($subCategories as $subCategory)
                                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Child Category</label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="childcategory_id">
                                                    <option value="">Select Childcategory</option>
                                                    <!--Sub Category Related All Child Categories Show-->
                                                    @foreach($childCategories as $childCategory)
                                                        <option value="{{$childCategory->id}}">{{$childCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Brand <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="brand_id" >
                                                    <option value="">Select Brand</option>
                                                    <!--All Brands Show-->
                                                    @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pickup Point <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="pickup_point_id" >
                                                    <option value="">Select Pickup Point</option>
                                                    <!--All Product Pickup Point Show-->
                                                    @foreach($p_points as $p_point)
                                                        <option value="{{$p_point->id}}">{{$p_point->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('pickup_point_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Warehouse <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control input-md" wire:model="warehouse_id" >
                                                    <option value="">Select Warehouse</option>
                                                    <!--All Product Warehouses Show-->
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Product Attributes</label>
                                            <div class="col-md-7">
                                                <select class="form-control input-md" wire:model="attr">
                                                    <option value="">Select Attribute</option>
                                                    <!--Product Attributes Show-->
                                                    @foreach($pattributes as $pattribute)
                                                        <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--Product Attribute Add Button-->
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-info" wire:click.prevent="add">Add</button>
                                            </div>
                                        </div>
                                        <!--Attribute Value Input-->
                                        @foreach($inputs as $key=>$value)
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                                <div class="col-md-7">
                                                    <input type="text" placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" class="form-control input-md" wire:model="attribute_values.{{$value}}" />
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control" wire:model="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status') <p class="text-danger">{{$message}}</p> @enderror
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
                                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
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
        //function of tinymce to product short description and description
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

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
