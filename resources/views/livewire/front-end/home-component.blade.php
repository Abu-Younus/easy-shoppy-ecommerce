@section('page-title')
 Home |
@endsection

<main id="main">
    <!--Main Container-->
    <div class="container" wire:ignore>

        <!--Banner Slider Count-->
        @if ($sliders->count() > 0)
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    <!--Banner Slider Show-->
                    @foreach($sliders as $slide)
                    <div class="item-slide">
                        <img src="{{asset('assets/images/sliders')}}/{{$slide->image}}" alt="{{$slide->title}}" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title"><b>{{$slide->title}}</b></h2>
                            <span class="subtitle">{{$slide->subtitle}}</span>
                            <p class="sale-info">Only price: <span class="price">{{$setting->currency}}{{$slide->price}}</span></p>
                            <a href="{{$slide->link}}" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--Campaign Check-->
        @if ($campaign)
            <!--Campaign Show-->
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="aboutus-box-score equal-elem ">
                        <b class="box-score-title" style="font-size: 18px;">{{ $campaign->title }}</b>
                        <span class="sub-title">{{ $campaign->discount }}% Discount</span>
                        <a href="{{ route('campaign.product',['campaign_slug'=>$campaign->slug]) }}" class="desc"><img src="{{ asset('assets/images/campaigns') }}/{{ $campaign->image }}" alt="{{ $campaign->title }}" width="100%"/></a>
                    </div>
                </div>
            </div>
        @endif

        <!--Brand & Popular Categories-->
        <div class="container" style="width: 100% !important; height: 50% !important;">
            <div class="wrap-show-advance-info-box style-1">
                <div class="wrap-products">
                    <div class="row">
                        <!--Brands Count-->
                        @if ($brands->count() > 0)
                            <div class="col-md-6">
                                <div class="wrap-product-tab tab-style-1">
                                    <h3 class="title-box">Brands</h3>
                                    <div class="tab-contents">
                                        <div class="tab-content-item active" id="digital_1a">
                                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                                <!--Brand Show-->
                                                @foreach($brands as $brand)
                                                    <div class="product product-style-2 equal-elem">
                                                        <a href="{{route('product.brand',['brand_slug'=>$brand->slug])}}" title="{{ $brand->name }}">
                                                            <img src="{{asset('assets/images/brands')}}/{{$brand->image}}" alt="{{ $brand->name }}">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Popular Categories Count-->
                        @if ($popular_categories->count() > 0)
                            <div class="col-md-6">
                                <div class="wrap-product-tab tab-style-1">
                                    <h3 class="title-box">Popular Categories</h3>
                                    <div class="tab-contents">
                                        <div class="tab-content-item active" id="digital_1a">
                                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                                <!--Popular Category Show-->
                                                @foreach($popular_categories as $popular_category)
                                                    <div class="product product-style-2 equal-elem">
                                                        <div class="product-thumnail">
                                                            <a href="{{route('product.category',['category_slug'=>$popular_category->slug])}}" title="{{ $popular_category->name }}">
                                                                <img src="{{ asset('assets/images/category') }}/{{ $popular_category->icon }}" alt="{{ $popular_category->name }}" style="height: 48px;">
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="{{route('product.category',['category_slug'=>$popular_category->slug])}}" class="product-name"><span style="text-align: center">{{ $popular_category->name }}</span></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!--On Sale Products count-->
        @if($sale_products->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
            <div class="wrap-show-advance-info-box style-1 has-countdown" style="width: 100% !important;">
                <h3 class="title-box">On Sale</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    <!--On Sale Products Show-->
                    @foreach($sale_products as $sale_product)
                        <div class="product product-style-2 equal-elem">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$sale_product->slug])}}" title="{{$sale_product->name}}">
                                    <figure><img src="{{asset('assets/images/products')}}/{{$sale_product->image}}" width="100%" height="100%" alt="{{$sale_product->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">hot sale</span>
                                </div>
                                <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                <div class="wrap-btn">
                                    <a href="{{route('product.details',['slug'=>$sale_product->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                    @if($sale_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <a href="#" class="function-link" wire:click.prevent="store({{$sale_product->id}},'{{$sale_product->name}}',{{$sale_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                    @else
                                        <a href="#" class="function-link" wire:click.prevent="store({{$sale_product->id}},'{{$sale_product->name}}',{{$sale_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                    @endif
                                    @if($sale_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$sale_product->id}},'{{$sale_product->name}}',{{$sale_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                    @else
                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$sale_product->id}},'{{$sale_product->name}}',{{$sale_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                    @endif
                                </div>
                            </div>
                            <!--product rating sum & count-->
                            @php
                                $sale_product_sum_rating=App\Models\Review::where('product_id',$sale_product->id)->sum('rating');
                                $sale_product_count_rating=App\Models\Review::where('product_id',$sale_product->id)->count('rating');
                            @endphp
                            <!--Product name and price show-->
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$sale_product->slug])}}" class="product-name"><span>{{substr($sale_product->name,0,20)}}..</span></a>
                                <!--product average rating show-->
                                <div class="product-rating">
                                    @if($sale_product_sum_rating != NULL)
                                        @php
                                            $sale_product_avgrating = intval($sale_product_sum_rating/$sale_product_count_rating);
                                        @endphp

                                        @for($i=1; $i<=5; $i++)
                                            @if($i<=$sale_product_avgrating)
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
                                <div class="wrap-price"><ins><p class="product-price">${{$sale_product->discounted_price}}</p></ins><del><p class="product-price">${{$sale_product->regular_price}}</p></del></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--Latest Products Count-->
        @if ($latest_products->count() > 0)
            <div class="wrap-show-advance-info-box style-1" style="width: 100% !important;">
                <h3 class="title-box">Latest Products</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    <!--Latest Products Show-->
                                    @foreach($latest_products as $latest_product)
                                        <div class="product product-style-2 equal-elem">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.details',['slug'=>$latest_product->slug])}}" title="{{$latest_product->name}}">
                                                    <figure><img src="{{asset('assets/images/products')}}/{{$latest_product->image}}" alt="{{$latest_product->name}}" width="100%" height="100%"></figure>
                                                </a>
                                                <div class="group-flash">
                                                    <span class="flash-item new-label">new</span>
                                                </div>
                                                <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                                <div class="wrap-btn">
                                                    <a title="view" href="#" data-toggle="modal" data-target="#quickViewModal" wire:click.prevent="getProductID({{ $latest_product->id }})" class="function-link"><i class="fa fa-eye"></i></a>
                                                    @if($latest_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$latest_product->id}},'{{$latest_product->name}}',{{$latest_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @else
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$latest_product->id}},'{{$latest_product->name}}',{{$latest_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @endif
                                                    @if($latest_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$latest_product->id}},'{{$latest_product->name}}',{{$latest_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                    @else
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$latest_product->id}},'{{$latest_product->name}}',{{$latest_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--product rating sum & count-->
                                            @php
                                                $latest_product_sum_rating=App\Models\Review::where('product_id',$latest_product->id)->sum('rating');
                                                $latest_product_count_rating=App\Models\Review::where('product_id',$latest_product->id)->count('rating');
                                            @endphp
                                            <!--Product name and price show-->
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$latest_product->slug])}}" class="product-name"><span>{{substr($latest_product->name,0,20)}}..</span></a>
                                                <!--product average rating show-->
                                                <div class="product-rating">
                                                    @if($latest_product_sum_rating != NULL)
                                                        @php
                                                            $latest_product_avgrating = intval($latest_product_sum_rating/$latest_product_count_rating);
                                                        @endphp

                                                        @for($i=1; $i<=5; $i++)
                                                            @if($i<=$latest_product_avgrating)
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
                                                @if($latest_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <div class="wrap-price">
                                                        <span class="product-price">{{$setting->currency}}{{$latest_product->discounted_price}}</span>
                                                        <del> <span class="product-price reg-price">{{$setting->currency}}{{$latest_product->regular_price}}</span></del>
                                                    </div>
                                                @else
                                                    <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$latest_product->regular_price}}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!--Most Popular Products Count-->
        @if ($popular_products->count() > 0)
            <div class="wrap-show-advance-info-box style-1" style="width: 100% !important;">
                <h3 class="title-box">Most Popular Products</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    <!--Most Popular Products Show-->
                                    @foreach($popular_products as $popular_product)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.details',['slug'=>$popular_product->slug])}}" title="{{$popular_product->name}}">
                                                    <figure><img src="{{asset('assets/images/products')}}/{{$popular_product->image}}" width="100%" height="100%" alt="{{$popular_product->name}}"></figure>
                                                </a>
                                                <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                                <div class="wrap-btn">
                                                    <a title="view" href="{{route('product.details',['slug'=>$popular_product->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                                    @if($popular_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$popular_product->id}},'{{$popular_product->name}}',{{$popular_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @else
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$popular_product->id}},'{{$popular_product->name}}',{{$popular_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @endif
                                                    @if($popular_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$popular_product->id}},'{{$popular_product->name}}',{{$popular_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                    @else
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$popular_product->id}},'{{$popular_product->name}}',{{$popular_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--product rating sum & count-->
                                            @php
                                                $popular_product_sum_rating=App\Models\Review::where('product_id',$popular_product->id)->sum('rating');
                                                $popular_product_count_rating=App\Models\Review::where('product_id',$popular_product->id)->count('rating');
                                            @endphp
                                            <!--Product name and price show-->
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$popular_product->slug])}}" class="product-name"><span>{{substr($popular_product->name,0,20)}}..</span></a>
                                                <!--product average rating show-->
                                                <div class="product-rating">
                                                    @if($popular_product_sum_rating != NULL)
                                                        @php
                                                            $popular_product_avgrating = intval($popular_product_sum_rating/$popular_product_count_rating);
                                                        @endphp

                                                        @for($i=1; $i<=5; $i++)
                                                            @if($i<=$popular_product_avgrating)
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
                                                @if($popular_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <div class="wrap-price">
                                                        <span class="product-price">{{$setting->currency}}{{$popular_product->discounted_price}}</span>
                                                        <del> <span class="product-price reg-price">{{$setting->currency}}{{$popular_product->regular_price}}</span></del>
                                                    </div>
                                                @else
                                                    <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$popular_product->regular_price}}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!--Featured Products Count-->
        @if ($featured_products->count() > 0)
            <div class="wrap-show-advance-info-box style-1" style="width: 100% !important;">
                <h3 class="title-box">Featured Products</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    <!--Featured Products Show-->
                                    @foreach($featured_products as $featured_product)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.details',['slug'=>$featured_product->slug])}}" title="{{$featured_product->name}}">
                                                    <figure><img src="{{asset('assets/images/products')}}/{{$featured_product->image}}" width="100%" height="100%" alt="{{$featured_product->name}}"></figure>
                                                </a>
                                                <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                                <div class="wrap-btn">
                                                    <a title="view" href="{{route('product.details',['slug'=>$featured_product->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                                    @if($featured_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$featured_product->id}},'{{$featured_product->name}}',{{$featured_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @else
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$featured_product->id}},'{{$featured_product->name}}',{{$featured_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @endif
                                                    @if($featured_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$featured_product->id}},'{{$featured_product->name}}',{{$featured_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                    @else
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$featured_product->id}},'{{$featured_product->name}}',{{$featured_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--product rating sum & count-->
                                            @php
                                                $featured_product_sum_rating=App\Models\Review::where('product_id',$featured_product->id)->sum('rating');
                                                $featured_product_count_rating=App\Models\Review::where('product_id',$featured_product->id)->count('rating');
                                            @endphp
                                            <!--Product name and price show-->
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$featured_product->slug])}}" class="product-name"><span>{{substr($featured_product->name,0,20)}}..</span></a>
                                                <!--product average rating show-->
                                                <div class="product-rating">
                                                    @if($featured_product_sum_rating != NULL)
                                                        @php
                                                            $featured_product_avgrating = intval($featured_product_sum_rating/$featured_product_count_rating);
                                                        @endphp

                                                        @for($i=1; $i<=5; $i++)
                                                            @if($i<=$featured_product_avgrating)
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
                                                @if($featured_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <div class="wrap-price">
                                                        <span class="product-price">{{$setting->currency}}{{$featured_product->discounted_price}}</span>
                                                        <del> <span class="product-price reg-price">{{$setting->currency}}{{$featured_product->regular_price}}</span></del>
                                                    </div>
                                                @else
                                                    <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$featured_product->regular_price}}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--Category Wise Products Count-->
        @if ($categories->count() > 0)
            <!--Category Wise Products Container-->
            <div class="wrap-show-advance-info-box style-1" style="width: 100% !important;">
                <h3 class="title-box">Product Categories</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            <!--Category Show-->
                            @foreach($categories as $key=>$category)
                                <a href="#category_{{$category->id}}" class="tab-control-item {{$key==0 ? 'active' : ''}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">
                            <!--Category Wise Products Show-->
                            @foreach($categories as $key=>$category)
                                <div class="tab-content-item {{$key==0 ? 'active' : ''}}" id="category_{{$category->id}}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                        @php
                                            //category products fetch
                                            $category_products = DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
                                        @endphp
                                        @foreach($category_products as $category_product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{route('product.details',['slug'=>$category_product->slug])}}" title="{{$category_product->name}}">
                                                        <figure><img src="{{asset('assets/images/products')}}/{{$category_product->image}}" width="100%" height="100%" alt="{{$category_product->name}}"></figure>
                                                    </a>
                                                    <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                                    <div class="wrap-btn">
                                                        <a title="view" href="{{route('product.details',['slug'=>$category_product->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                                        @if($category_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                            <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$category_product->id}},'{{$category_product->name}}',{{$category_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                        @else
                                                            <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$category_product->id}},'{{$category_product->name}}',{{$category_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                        @endif
                                                        @if($category_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                            <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$category_product->id}},'{{$category_product->name}}',{{$category_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                        @else
                                                            <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$category_product->id}},'{{$category_product->name}}',{{$category_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--product rating sum & count-->
                                                @php
                                                    $category_product_sum_rating=App\Models\Review::where('product_id',$category_product->id)->sum('rating');
                                                    $category_product_count_rating=App\Models\Review::where('product_id',$category_product->id)->count('rating');
                                                @endphp
                                                <!--Product name and price show-->
                                                <div class="product-info">
                                                    <a href="{{route('product.details',['slug'=>$category_product->slug])}}" class="product-name"><span>{{substr($category_product->name,0,20)}}..</span></a>
                                                    <!--product average rating show-->
                                                    <div class="product-rating">
                                                        @if($category_product_sum_rating != NULL)
                                                            @php
                                                                $category_product_avgrating = intval($category_product_sum_rating/$category_product_count_rating);
                                                            @endphp

                                                            @for($i=1; $i<=5; $i++)
                                                                @if($i<=$category_product_avgrating)
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
                                                    @if($category_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <div class="wrap-price">
                                                            <span class="product-price">{{$setting->currency}}{{$category_product->discounted_price}}</span>
                                                            <del> <span class="product-price reg-price">{{$setting->currency}}{{$category_product->regular_price}}</span></del>
                                                        </div>
                                                    @else
                                                        <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$category_product->regular_price}}</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--Random Products Count-->
        @if ($randomProducts->count() > 0)
            <div class="wrap-show-advance-info-box style-1" style="width: 100% !important;">
                <h3 class="title-box">Products For You</h3>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    <!--Random Products Show-->
                                    @foreach($randomProducts as $randomProduct)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{route('product.details',['slug'=>$randomProduct->slug])}}" title="{{$randomProduct->name}}">
                                                    <figure><img src="{{asset('assets/images/products')}}/{{$randomProduct->image}}" width="100%" height="100%" alt="{{$randomProduct->name}}"></figure>
                                                </a>
                                                <!--Product add to cart system, add to wishlist system and product details icon button show and action-->
                                                <div class="wrap-btn">
                                                    <a title="view" href="{{route('product.details',['slug'=>$randomProduct->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                                    @if($randomProduct->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$randomProduct->id}},'{{$randomProduct->name}}',{{$randomProduct->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @else
                                                        <a title="cart" href="#" class="function-link" wire:click.prevent="store({{$randomProduct->id}},'{{$randomProduct->name}}',{{$randomProduct->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                    @endif
                                                    @if($randomProduct->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$randomProduct->id}},'{{$randomProduct->name}}',{{$randomProduct->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                    @else
                                                        <a title="wishlist" href="#" class="function-link" wire:click.prevent="addToWishlist({{$randomProduct->id}},'{{$randomProduct->name}}',{{$randomProduct->regular_price}})"><i class="fa fa-heart"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--product rating sum & count-->
                                            @php
                                                $random_product_sum_rating=App\Models\Review::where('product_id',$randomProduct->id)->sum('rating');
                                                $random_product_count_rating=App\Models\Review::where('product_id',$randomProduct->id)->count('rating');
                                            @endphp
                                            <!--Product name and price show-->
                                            <div class="product-info">
                                                <a href="{{route('product.details',['slug'=>$randomProduct->slug])}}" class="product-name"><span>{{substr($randomProduct->name,0,20)}}..</span></a>
                                                <!--product average rating show-->
                                                <div class="product-rating">
                                                    @if($random_product_sum_rating != NULL)
                                                        @php
                                                            $random_product_avgrating = intval($random_product_sum_rating/$random_product_count_rating);
                                                        @endphp

                                                        @for($i=1; $i<=5; $i++)
                                                            @if($i<=$random_product_avgrating)
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
                                                @if($randomProduct->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <div class="wrap-price">
                                                        <span class="product-price">{{$setting->currency}}{{$randomProduct->discounted_price}}</span>
                                                        <del> <span class="product-price reg-price">{{$setting->currency}}{{$randomProduct->regular_price}}</span></del>
                                                    </div>
                                                @else
                                                    <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$randomProduct->regular_price}}</span></div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--Website Reviews Count-->
        @if ($websiteReviews->count() > 0)
            <!--Website Reviews Container-->
            <div class="our-team-info">
                <h4 class="title-box">Website Reviews</h4>
                <div class="our-staff">
                    <div
                        class="slide-carousel owl-carousel style-nav-1 equal-container"
                        data-items="5"
                        data-loop="false"
                        data-nav="true"
                        data-dots="false"
                        data-margin="30"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}' >

                        <div class="team-member equal-elem">
                            <!--Website Reviews Show-->
                            @foreach ($websiteReviews as $websiteReview)
                                <div class="row">
                                    <!--Customer Profile Image Show-->
                                    @if ($websiteReview->user->profile->image)
                                        <div id="circular-image-setting">
                                            <img class="card-img-top" src="{{ asset('assets/images/profile') }}{{ '/' }}{{ $websiteReview->user->profile->image }}" alt="{{ $websiteReview->user->name }}">
                                        </div>
                                    @else
                                        <div id="circular-image-setting">
                                            <img class="card-img-top" src="{{ asset('assets/images/dummy.jpg') }}">
                                        </div>
                                    @endif
                                </div>
                                <div class="info" style="text-align: center;">
                                    <b class="name" style="font-size: 12px;">{{ $websiteReview->user->name }}</b><br>
                                    <!--Website Rating Count-->
                                    @if($websiteReview->rating == 5)
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    @elseif($websiteReview->rating == 4)
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @elseif($websiteReview->rating == 3)
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @elseif($websiteReview->rating == 2)
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @elseif($websiteReview->rating == 1)
                                    <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                    @endif
                                    <p class="desc" style="text-align: center;">{{ $websiteReview->review_date }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Quick View Modal -->
    <div class="modal" id="quickViewModal" tabindex="-1" role="dialog" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="quickViewModalLabel">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!--Product Details-->
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                        @if ($product)
                            <div class="wrap-product-detail">
                                <div class="detail-media">
                                    <!--Product Gallery Image Show-->
                                    <div class="product-gallery" wire:ignore>
                                        <ul class="slides">

                                            <li data-thumb="{{asset('assets/images/products')}}/{{$product->image}}">
                                                <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" />
                                            </li>
                                            @php
                                                $images = explode(",",$product->images);
                                            @endphp
                                            @foreach($images as $image)
                                                @if($image)
                                                <li data-thumb="{{asset('assets/images/products')}}/{{$image}}">
                                                    <img src="{{asset('assets/images/products')}}/{{$image}}" alt="{{$product->name}}" />
                                                </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <!--Details-->
                                <div class="detail-info">
                                    <!--Product Rating Count-->
                                    <div class="product-rating">
                                        @if($sum_rating !=NULL)
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
                                        <a href="#" class="count-review">({{$product->orderItems->where('rstatus',1)->count()}} review)</a>
                                    </div>
                                    <!--Product Name and Short Description-->
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="short-desc">
                                        {!! $product->short_description !!}
                                    </div>
                                    <div class="wrap-social">
                                        <!--Social Button wiht Product Share-->
                                        <h5 style="font-size: 16px; color: darkslategray;">Share With:</h5>
                                        <div id="social-links">
                                            <ul style="list-style: none; display: flex; font-size: 30px;">
                                                <li style="margin-right: 10px;"><a href="{{ Share::page(url()->current())->facebook(); }}" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
                                                <li style="margin-left: 10px;"><a href="{{ Share::page(url()->current())->twitter(); }}" class="social-button " id=""><span class="fa fa-twitter"></span></a></li>
                                                <li style="margin-left: 20px;"><a href="{{ Share::page(url()->current())->linkedin(); }}" class="social-button " id=""><span class="fa fa-linkedin"></span></a></li>
                                                <li style="margin-left: 20px;"><a href="{{ Share::page(url()->current())->whatsapp(); }}" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li>
                                                <li style="margin-left: 20px;"><a href="{{ Share::page(url()->current())->reddit(); }}" class="social-button " id=""><span class="fa fa-reddit"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Discount Price and Regular Price Check-->
                                    @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() && !$campaignProduct)
                                        <div class="wrap-price">
                                            <span class="product-price">{{$setting->currency}}{{$product->discounted_price}}</span>
                                            <del> <span class="product-price reg-price">{{$setting->currency}}{{$product->regular_price}}</span></del>
                                        </div>
                                    @elseif($campaignProduct)
                                        <div class="wrap-price">
                                            <span class="product-price">{{$setting->currency}}{{$campaignProduct->price}}</span>
                                            <del> <span class="product-price reg-price">{{$setting->currency}}{{$product->regular_price}}</span></del>
                                        </div>
                                    @else
                                        <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$product->regular_price}}</span></div>
                                    @endif
                                    <!--Product Brand, Stock, Unit and Quantity Available Check-->
                                    <div class="stock-info in-stock" style="margin-top:10px;">
                                        <p class="availability" style="font-weight:bold;">
                                            Brand: <b>
                                                        @if($product->brand_id != null)
                                                        <span class="text-warning">{{$product->brand->name}}</span>
                                                        @else
                                                        <span class="text-warning">Not applicable</span>
                                                        @endif
                                                </b>
                                        </p>
                                    </div>
                                    <div class="stock-info in-stock" style="margin-top:10px;">
                                        <p class="availability" style="font-weight:bold;">
                                            Stock: <b><span class="color-gray">{{$product->quantity}}</span></b>
                                        </p>
                                    </div>
                                    <div class="stock-info in-stock" style="margin-top:10px;">
                                        <p class="availability" style="font-weight:bold;">
                                            Unit: <b><span class="color-gray">{{$product->unit}}</span></b>
                                        </p>
                                    </div>
                                    <div class="stock-info in-stock" style="margin-top:10px;">
                                        <p class="availability" style="font-weight:bold;">
                                            Availability:
                                            @if($product->quantity > 0 && $product->quantity < 10)
                                                <span class="badge badge-warning" style="background-color: darkorange; color: white;">Low Stock</span>
                                            @elseif($product->quantity >= 10)
                                                <span class="badge badge-success" style="background-color: green; color: white;">instock</span>
                                            @elseif($product->quantity < 1)
                                                <span class="badge badge-danger" style="background-color: red; color: white;">Out Of Stock</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div>
                                        <!--Product Attribute Fetch-->
                                        @foreach($product->attributeValues->unique('product_attribute_id') as $av)
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-xs-2">
                                                <p><b>{{$av->productAttribute->name}}</b></p>
                                            </div>
                                            <div class="col-xs-10">
                                                <select class="form-control" style="width:200px;" wire:model="selected_attr.{{$av->productAttribute->name}}">
                                                    <option value="#">Select</option>
                                                    @foreach($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                                        <option value="{{$pav->value}}">{{$pav->value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--Quantity Select-->
                                    <div class="quantity" style="margin-top:10px;">
                                        <span><b>Quantity:</b></span>
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >

                                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
                                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                                        </div>
                                    </div>
                                    <div class="wrap-butons">
                                        <!--Quantity Check-->
                                        @if($qty <= $product->quantity)
                                            <!--Cart Product Added-->
                                            @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() && !$campaignProduct)
                                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->discounted_price}})">Add to Cart</a>
                                            @elseif($campaignProduct)
                                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$campaignProduct->price}})">Add to Cart</a>
                                            @else
                                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add to Cart</a>
                                            @endif
                                        @else
                                            <p class="text-danger text-center" style="font-size:13px;"><b>Maximum Quantity</b></p>
                                        @endif
                                        <div class="wrap-btn">
                                            <!--Add to Product Compare-->
                                            <a href="#" class="btn btn-compare">Add Compare</a>
                                            <!--Wishlist Item Add and Remove-->
                                            @if($wishlist_items->contains($product->id))
                                                <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})" class="btn btn-wishlist">Remove Wishlist</a>
                                            @else
                                                @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() && !$campaignProduct)
                                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->discounted_price}})" class="btn btn-wishlist">Add Wishlist</a>
                                                @elseif($campaignProduct)
                                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$campaignProduct->price}})" class="btn btn-wishlist">Add Wishlist</a>
                                                @else
                                                    <a href="#" wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn btn-wishlist">Add Wishlist</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</main>

