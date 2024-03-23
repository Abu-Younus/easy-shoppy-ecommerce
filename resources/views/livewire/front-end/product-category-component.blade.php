@section('page-title')
 Product-Category |
@endsection

<main id="main" class="main-site left-sidebar">
    <!--Main Container-->
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Product Categories</span></li>
                <li class="item-link"><span>{{$category_name}}</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-shop-control">
                    <!--Category Name Show-->
                    <h1 class="shop-title">{{$category_name}}</h1>

                    <div class="wrap-right">
                        <!--Products Sorting-->
                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting" >
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                                <option value="alphabet-asc">Sort by alphabet: A to Z</option>
                                <option value="alphabet-desc">Sort by alphabet: Z to A</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                            </select>
                        </div>
                        <!--Products Per Page-->
                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize" >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--wrap shop control-->

                <!--Shop Products Show-->
                @if($products->count() > 0)
                <div class="row">
                    <ul class="product-list grid-products equal-container">
                        @foreach($products as $product)
                            <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" width="100%" height="100%"></figure>
                                        </a>
                                    </div>
                                    <!--product rating sum & count-->
                                    @php
                                        $sum_rating=App\Models\Review::where('product_id',$product->id)->sum('rating');
                                        $count_rating=App\Models\Review::where('product_id',$product->id)->count('rating');
                                    @endphp
                                    <div class="product-info">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{substr($product->name,0,20)}}..</span></a>
                                        <!--product average rating show-->
                                        <div class="product-rating">
                                            @if($sum_rating != NULL)
                                                @php
                                                    $avgrating = intval($sum_rating/$count_rating);
                                                @endphp

                                                @for($i=1; $i<=5; $i++)
                                                    @if($i<=$avgrating)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                    @endif
                                                @endfor
                                            @else
                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                            @endif
                                        </div>
                                        <!--product regular price & discount price check-->
                                        @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <div class="wrap-price">
                                                <span class="product-price">{{$setting->currency}}{{$product->discounted_price}}</span>
                                                <del> <span class="product-price reg-price">{{$setting->currency}}{{$product->regular_price}}</span></del>
                                            </div>
                                        @else
                                            <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$product->regular_price}}</span></div>
                                        @endif
                                        @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->discounted_price}})">Add to Cart</a>
                                        @else
                                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add to Cart</a>
                                        @endif
                                        <div class="product-wish">
                                            @if($wishlist_items->contains($product->id) && Auth::check())
                                                <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                            @else
                                                @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                @else
                                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @else
                <p class="text-danger text-center" style="padding:30px 0; font-size:18px; font-weight:bold;">No products</p>
                @endif

                <div class="wrap-pagination-info">
                    {{$products->links()}}
                </div>
            </div><!--main products area-->

            <!--All Sub Category and Child Category Show-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">Cat. Related Sub Cats.</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach($subCategories as $subCategory)
                            <li class="category-item {{count($subCategory->childCategories) > 0 ? 'has-child-cate' : ''}}">
                                <a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$subCategory->slug])}}" class="cate-link">{{$subCategory->name}}</a>
                                @if(count($subCategory->childCategories) > 0)
                                <span class="toggle-control">+</span>
                                <ul class="sub-cate">
                                    @foreach($subCategory->childCategories as $childCategory)
                                    <li class="category-item">
                                        <a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$subCategory->slug,'ccategory_slug'=>$childCategory->slug])}}" class="cat-link"><i class="fa fa-caret-right"></i>{{$childCategory->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->
                <!--All Brands Show-->
                <div class="widget mercado-widget filter-widget brand-widget">
                    <h2 class="widget-title">All Brands</h2>
                    <div class="widget-content">
                        <ul class="list-style vertical-list list-limited" data-show="6">
                            @foreach($brands as $brand)
                            <li class="list-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="brand_id" value="{{$brand->id}}" id="flexCheckChecked" style="text-decoration:none;" wire:model="brand_id" >
                                    <label class="form-check-label" for="flexCheckChecked">
                                        {{$brand->name}}
                                    </label>
                                </div>
                            </li>
                            @endforeach

                            <!-- <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li> -->
                        </ul>
                    </div>
                </div><!-- brand widget-->
                <!--Price Range Filter of Products-->
                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price: <span class="text-info">{{$setting->currency}}{{$min_price}} - {{$setting->currency}}{{$max_price}}</span></h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px;">
                        <div id="slider" wire:ignore data-start="{{ $min_price }}" data-end="{{ $max_price }}" data-min="{{ $min_price}}" data-max="{{ $max_price }}"></div>
                    </div>
                </div><!-- Price-->
                <!--Recent Products Show-->
                @if ($recent_products->count() > 0)
                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Recent Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                @foreach($recent_products as $recent_product)
                                    <li class="product-item">
                                        <div class="product product-widget-style">
                                            <div class="thumbnnail">
                                                <a href="{{route('product.details',['slug'=>$recent_product->slug])}}" title="{{$recent_product->name}}">
                                                    <figure><img src="{{asset('assets/images/products')}}/{{$recent_product->image}}" alt="{{$recent_product->name}}"></figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$recent_product->slug])}}" class="product-name"><span>{{substr($recent_product->name,0,20)}}..</span></a>
                                                <div class="wrap-price"><span class="product-price">${{$recent_product->regular_price}}</span></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--Recent Products widget-->
                @endif

            </div><!--sitebar-->

        </div><!--row-->

    </div><!--container-->

</main>

@push('scripts')
	<script>
        //Price Range Function of Products
		$(function () {
           $('#slider').each(function () {
               var el = this;
               noUiSlider.create(el, {
                   start: [el.dataset.start, el.dataset.end],
                   connect: true,
                   behaviour: 'drag',
                   tooltips: true,
                   range: {
                       min: [parseFloat(el.dataset.min)],
                       max: [parseFloat(el.dataset.max)]
                   },
                   pips: {
                    mode:'steps',
                    stepped:true,
                    density:4
                   }
               }).on('change', function (value) {
                    @this.set('min_price',value[0]);
                    @this.set('max_price',value[1]);
               });
           });
       });
	</script>
@endpush
