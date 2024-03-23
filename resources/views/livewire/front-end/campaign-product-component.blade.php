@section('page-title')
 Campaign Products |
@endsection

<main id="main" class="main-site left-sidebar">
    <!--Main Container-->
	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="/" class="link">home</a></li>
				<li class="item-link"><span>Campaign</span></li>
                <li class="item-link"><span><b>{{$campaign_slug}} Products</b></span></li>
			</ul>
		</div>

        <div class="row">
            <ul class="product-list grid-products equal-container">
                <!--Campaign Products Fetch-->
                @foreach($campaignProducts as $campaignProduct)
                    <li class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$campaignProduct->product->slug, 'campaign_slug'=>$campaign_slug, 'campaign_product_id'=>$campaignProduct->id])}}" title="{{$campaignProduct->product->name}}">
                                    <figure><img src="{{asset('assets/images/products')}}/{{$campaignProduct->product->image}}" alt="{{$campaignProduct->product->name}}" width="100%" height="100%"></figure>
                                </a>
                            </div>
                            <!--product rating sum & count-->
                            @php
                                $sum_rating=App\Models\Review::where('product_id',$campaignProduct->id)->sum('rating');
                                $count_rating=App\Models\Review::where('product_id',$campaignProduct->id)->count('rating');
                            @endphp
                            <!--product name and price show-->
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$campaignProduct->product->slug, 'campaign_slug'=>$campaign_slug, 'campaign_product_id'=>$campaignProduct->id])}}" class="product-name"><span>{{substr($campaignProduct->product->name,0,20)}}..</span></a>
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
                                <!--campaign discount price & regular price check-->
                                <div class="wrap-price">
                                    <span class="product-price">{{$setting->currency}}{{$campaignProduct->price}}</span>
                                    <del> <span class="product-price reg-price-campaign-product">{{$setting->currency}}{{$campaignProduct->product->regular_price}}</span></del>
                                </div>
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$campaignProduct->product->id}},'{{$campaignProduct->product->name}}',{{$campaignProduct->price}})">Add to Cart</a>
                                <div class="product-wish">
                                    <!--item remove to wishlist-->
                                    @if($wishlist_items->contains($campaignProduct->product->id) && Auth::check())
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$campaignProduct->product->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    <!--item add to wishlist-->
                                    @else
                                        <a href="#" wire:click.prevent="addToWishlist({{$campaignProduct->product->id}},'{{$campaignProduct->product->name}}',{{$campaignProduct->price}})"><i class="fa fa-heart"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>

