@section('page-title')
 Product Details |
@endsection

<div>
    <main id="main" class="main-site">
        <!--Main Container-->
        <div class="container">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Product Details</span></li>
                </ul>
            </div>
            <div class="row">
                <!--Product Details-->
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
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
                        <div class="advance-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <!--All Product Questions Container-->
                                            <h5>All Questions of <span style="color: rgb(109, 109, 109)">({{ $product->name }})</span></h5>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                                <div id="comments">
                                                    <h2 class="woocommerce-Reviews-title">{{ $product->Questions->count() }} question for <span style="color: rgb(109, 109, 109)">({{$product->name}})</span></h2>
                                                    <!--Product Questions Check and Count-->
                                                    @if ($product->Questions->count() > 0)
                                                        <ol class="commentlist" style="height: 250px; overflow-y: scroll;">
                                                            <!--All Product Questions and Answers Show-->
                                                            @foreach ($questions as $question)
                                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                                    <div id="comment-20" class="comment_container">
                                                                        @if ($question->user->profile->image)
                                                                            <img src="{{asset('assets/images/profile')}}/{{ $question->user->profile->image }}" height="80" width="80">
                                                                        @else
                                                                            <img src="{{asset('assets/images/profile/dummy-profile-pic.jpg')}}" height="80" width="80">
                                                                        @endif
                                                                        <div class="comment-text">
                                                                            <p class="meta">
                                                                                <strong class="woocommerce-review__author">{{ $question->user->name }}</strong>
                                                                                <span class="woocommerce-review__dash">–</span>
                                                                                <time class="woocommerce-review__published-date" style="font-size: 12px;" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($question->created_at)->format('d F Y, g:i A')}}</time>
                                                                            </p>
                                                                            <div class="description">
                                                                                <p>{{ $question->question }}</p>
                                                                            </div>
                                                                            <ul style="margin-left: -55px;">
                                                                                @foreach ($question->questionReply as $questionReply)
                                                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                                                        <div id="comment-20" class="comment_container">
                                                                                            <img src="{{asset('assets/images/profile/dummy-profile-pic.jpg')}}" height="60" width="60">

                                                                                            <div class="comment-text">
                                                                                                <p class="meta">
                                                                                                    <strong class="woocommerce-review__author">Admin</strong>
                                                                                                    <span class="woocommerce-review__dash">–</span>
                                                                                                    <time class="woocommerce-review__published-date" style="font-size: 11px;" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($questionReply->created_at)->format('d F Y, g:i A')}}</time>
                                                                                                </p>
                                                                                                <div class="description">
                                                                                                    <p>{{ $questionReply->answer }}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!--Qustion Store Form-->
                                                <form class="form-horizontal" wire:submit.prevent="storeQuestion">
                                                    <div class="form-group">
                                                        <label for="review">Write Your Question</label>
                                                        <textarea type="text" class="form-control" name="question" wire:model="question"></textarea>
                                                        @error('question') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    <!--Authentication Check for Submit Button-->
                                                    @if(Auth::check())
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                    </div>
                                                    @else
                                                    <div class="form-group">
                                                        <p class="text-danger">Please at first login to your account for submit a question.</p>
                                                    </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="advance-info">
                            <!--Reviews, Description and Specifications Tab-->
                            <div class="tab-control normal">
                                <a href="#review" class="tab-control-item active">Reviews</a>
                                <a href="#description" class="tab-control-item">description</a>
                                <a href="#add_infomation" class="tab-control-item">Specifications</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="review">

                                    <div class="wrap-review-form">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <!--Average Rating of Product-->
                                                    <strong class="color-gray">Average Review of  <span class="text-warning">({{ $product->name }}):</span></strong><hr>
                                                    @if($sum_rating !=NULL)
                                                        @if(intval($sum_rating/$count_rating) == 5)
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        @elseif(intval($sum_rating/$count_rating) >= 4 && intval($sum_rating/5) < $count_rating)
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        @elseif(intval($sum_rating/$count_rating) >= 3 && intval($sum_rating/5) < $count_rating)
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        @elseif(intval($sum_rating/$count_rating) >= 2 && intval($sum_rating/5) < $count_rating)
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        @elseif(intval($sum_rating/$count_rating) >= 1 && intval($sum_rating/5) < $count_rating)
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
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <!--All Product Reviews Show-->
                                                    <strong class="text-warning">Total Review Of This Product:</strong><hr>
                                                    <div>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <span> Total ({{ $review_5 }}) </span>
                                                    </div>

                                                    <div>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <span> Total ({{ $review_4 }}) </span>
                                                    </div>

                                                    <div>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <span> Total ({{ $review_3 }}) </span>
                                                    </div>

                                                    <div>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <span> Total ({{ $review_2 }}) </span>
                                                    </div>

                                                    <div>
                                                        <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                        <span> Total ({{ $review_1 }}) </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <!--Review Store Form-->
                                                    <form class="form-horizontal" wire:submit.prevent="storeReview">
                                                        <div class="form-group">
                                                            <label for="review">Write Your Review</label>
                                                            <textarea type="text" class="form-control" name="review" wire:model="review"></textarea>
                                                            @error('review') <span class="text-danger">{{$message}}</span> @enderror
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="rating">Select Rating</label>
                                                            <select class="form-control input-sm" name="rating" style="min-width: 120px;" wire:model="rating">
                                                                <option value="">Select Your Rating</option>
                                                                <option value="1">1 star</option>
                                                                <option value="2">2 star</option>
                                                                <option value="3">3 star</option>
                                                                <option value="4">4 star</option>
                                                                <option value="5">5 star</option>
                                                            </select>
                                                            @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="images">Images</label>
                                                            <input id="images" type="file" class="input-file" wire:model="images" multiple/>
                                                            @error('images') <span class="text-danger">{{$message}}</span> @enderror
                                                        </div>
                                                        <!--Authentication Check for Submit Button-->
                                                        @if(Auth::check())
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-star"></i>Submit</button>
                                                        </div>
                                                        @else
                                                        <div class="form-group">
                                                            <p style="color: #a94442;">Please at first login to your account for submit a review.</p>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--All Reviews of this Product-->
                                        <strong class="color-gray">All review of <span class="text-primary">({{ $product->name }}):</span></strong> <hr>
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{$product->orderItems->where('rstatus',1)->count()}} review for <span>{{$product->name}}</span></h2>
                                            <!--Product Review Check and Count-->
                                            @if ($product->orderItems->where('rstatus',1)->count() > 0)
                                                <ol class="commentlist" style="height: 150px; overflow-y: scroll;">
                                                    @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                        <div id="comment-20" class="comment_container">
                                                            @if ($orderItem->order->user->profile->image)
                                                                <img alt="{{$orderItem->order->user->name}}" src="{{asset('assets/images/profile')}}/{{$orderItem->order->user->profile->image}}" height="80" width="80">
                                                            @else
                                                                <img src="{{asset('assets/images/dummy.jpg')}}" height="80" width="80">
                                                            @endif

                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <span class="width-{{$orderItem->review->rating * 20}}-percent">Rated <strong class="rating">{{$orderItem->review->rating}}</strong> out of 5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y, g:i A')}}</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{$orderItem->review->comment}}</p>
                                                                </div>
                                                                <div>
                                                                    @php
                                                                        $images = explode(",",$orderItem->review->images);
                                                                    @endphp
                                                                    @foreach($images as $image)
                                                                        @if($image)
                                                                        <span data-thumb="{{asset('assets/images/review-images')}}/{{$image}}">
                                                                            <img style="margin-left:10px;" src="{{asset('assets/images/review-images')}}/{{$image}}" alt="{{$orderItem->order->user->name}}" />
                                                                        </span>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div><!-- #comments -->
                                    </div>
                                </div>
                                <!--Product Description-->
                                <div class="tab-content-item " id="description">
                                    {!! $product->description !!}
                                </div>
                                <!--Product All Specifications-->
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                            @foreach($product->SpecificationValues->unique('product_specification_id') as $spec_value)
                                            <tr>
                                                <th>{{$spec_value->productSpecification->name}}</th>
                                                @foreach($spec_value->productSpecification->SpecificationValues->where('product_id',$product->id) as $psv)
                                                <td><p>{{$psv->value}}</p></td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end main products area-->
                <!--Details of Pickup Point and Warehouse-->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <div style="border-left: 1px solid #e6e6e6; padding-left: 10px;">
                                <!--Product Pickup Point-->
                                <p><strong class="text-primary">Pickup Point of this product</strong></p>
                                <p class="color-gray"><i class="fa fa-map"> {{ $product->pickupPoint->name }} </i></p><hr>
                                <!--Product Warehouse-->
                                <p><strong class="text-primary">Warehouse of this product</strong></p>
                                <p class="color-gray"><i class="fa fa-home"> {{ $product->warehouse->name }} </i></p><hr>
                                <!--Product Delivery Details-->
                                <strong class="text-primary"> Home Delivery :</strong>
                                <p class="color-gray" style="font-size:12px; font-weight:bold;">(4-8) days after the order placed.</p>
                                <!--COD Available Check-->
                                @if($product->cash_on_delivery)
                                <p class="color-gray" style="font-size:12px; font-weight:bold;">Cash on Delivery Available - ({{$product->delivery_place}})</p>
                                @else
                                <p class="color-gray" style="font-size:12px; font-weight:bold;">Cash on Delivery Not Available.</p>
                                @endif
                                <hr>
                                <!--Product Return & Warranty-->
                                <strong class="text-primary"> Product Return & Warrenty :</strong><br>
                                <p class="color-gray" style="font-size:12px; font-weight:bold;">7 days return guarranty.</p>
                                <p class="color-gray" style="font-size:12px; font-weight:bold;">Warrenty not available.</p>
                                <hr>
                                <!--Product Video-->
                                <strong class="text-primary">Product Video</strong>
                                @if($product->video != null)
                                <div>
                                    <iframe width="340" height="205" src="https://www.youtube.com/embed/{{ $product->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <!--Video Empty Check-->
                                @else
                                <p class="text-danger">video is not added this product.</p>
                                @endif
                            </div>
                        </div>
                    </div><hr><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <!--Popular Products Show-->
                                @foreach($popular_products as $popular_product)
                                @if($popular_product->product_views > 0)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{route('product.details',['slug'=>$popular_product->slug])}}" title="{{$popular_product->name}}">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$popular_product->image}}" alt="{{$popular_product->name}}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details',['slug'=>$popular_product->slug])}}" class="product-name"><span>{{substr($popular_product->name,0,20)}}..</span></a>
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
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div><!--end sitebar-->

                {{-- Category Related Products --}}
                @if ($related_products->count() > 0)
                    <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="wrap-show-advance-info-box style-1 box-in-site" style="width: 100% !important;" wire:ignore>
                            <h3 class="title-box">Related Products</h3>
                            <div class="wrap-products">
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                                    @foreach($related_products as $related_product)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.details',['slug'=>$related_product->slug])}}" title="{{$related_product->name}}">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$related_product->image}}" width="100%" height="100%" alt="{{$related_product->name}}"></figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="{{route('product.details',['slug'=>$related_product->slug])}}" class="function-link"><i class="fa fa-eye"></i></a>
                                                @if($related_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <a href="#" class="function-link" wire:click.prevent="store({{$related_product->id}},'{{$related_product->name}}',{{$related_product->discounted_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                @else
                                                    <a href="#" class="function-link" wire:click.prevent="store({{$related_product->id}},'{{$related_product->name}}',{{$related_product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>
                                                @endif
                                                @if($related_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <a href="#" class="function-link" wire:click.prevent="addToWishlist({{$related_product->id}},'{{$related_product->name}}',{{$related_product->discounted_price}})"><i class="fa fa-heart"></i></a>
                                                @else
                                                    <a href="#" class="function-link" wire:click.prevent="addToWishlist({{$related_product->id}},'{{$related_product->name}}',{{$related_product->regular_price}})"><i class="fa fa-heart"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.details',['slug'=>$related_product->slug])}}" class="product-name"><span>{{substr($related_product->name,0,20)}}..</span></a>
                                            @if($related_product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <div class="wrap-price">
                                                <span class="product-price">{{$setting->currency}}{{$related_product->discounted_price}}</span>
                                                <del> <span class="product-price reg-price">{{$setting->currency}}{{$related_product->regular_price}}</span></del>
                                            </div>
                                            @else
                                            <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$related_product->regular_price}}</span></div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!--End wrap-products-->
                        </div>
                    </div>
                @endif
            </div><!--end row-->

        </div><!--end container-->

    </main>
</div>
