@section('page-title')
 Wishlist |
@endsection

<main id="main" class="main-site left-sidebar">
    <!--Main Container-->
	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="/" class="link">home</a></li>
				<li class="item-link"><span>Wishlist</span></li>
			</ul>
		</div>

        <div class="row">
            <!--Wishlist Item Check-->
            @if(Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    <!--Wishlist Item Fetch-->
                    @foreach(Cart::instance('wishlist')->content() as $item)
                        <li class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                    </a>
                                </div>

                                @php
                                    //Product get with wishlist item id
                                    $product = App\Models\Product::find($item->model->id);
                                    //product rating sum & count
                                    $sum_rating=App\Models\Review::where('product_id',$product->id)->sum('rating');
                                    $count_rating=App\Models\Review::where('product_id',$product->id)->count('rating');
                                @endphp
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{substr($item->model->name,0,20)}}..</span></a>
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
                                    <!--product discount price and regular price check-->
                                    @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                    <div class="wrap-price">
                                        <span class="product-price">{{$setting->currency}}{{$item->model->discounted_price}}</span>
                                        <del> <span class="product-price reg-price-campaign-product">{{$setting->currency}}{{$item->model->regular_price}}</span></del>
                                    </div>
                                    @else
                                    <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$item->model->regular_price}}</span></div>
                                    @endif
                                    <!--Wishlist item move from cart item-->
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Move To Cart</a>
                                    <!--Removed wishlist item-->
                                    <div class="product-wish">
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            <!--Wishlist item empty check-->
            @else
                <h5 class="text-center text-danger">No item added in wishlist</h5>
            @endif
        </div>
    </div>
</main>
