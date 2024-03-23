@section('page-title')
 Cart |
@endsection

<main id="main" class="main-site">
    <!--Main Container-->
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <!--Cart Product Show-->
        <div class=" main-content-area">
            @if(Cart::instance('cart')->count() > 0)
            <div class="wrap-iten-in-cart">
                @if(Cart::instance('cart')->count() > 0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('cart')->content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                        </div>
                        <!--Cart item fetch-->
                        @php
                            $product = App\Models\Product::find($item->model->id);
                        @endphp
                        <!--Cart item product attribute fetch-->
                        @foreach ($item->options->unique($product->id) as $itemValue)
                            @if ($itemValue != null)
                                <div class="product-name" style="width: 180px;">
                                    @foreach($product->attributeValues->unique('product_attribute_id') as $av)
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-xs-12">
                                                <select class="form-control">
                                                    @foreach($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                                        <option value="{{$pav->value}}" @if ($itemValue == $pav->value) selected="" @endif>
                                                            {{$pav->value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                        <!--Cart product Discount Or Non Discount Price Show-->
                        @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                            <div class="price-field produtc-price"><p class="price">{{$setting->currency}}{{$item->model->discounted_price}}</p></div>
                        @else
                            <div class="price-field produtc-price"><p class="price">{{$setting->currency}}{{$item->model->regular_price}}</p></div>
                        @endif
                        <!--Cart product Quantity Increase Or Decrease-->
                        <div class="quantity">
                            @if($product->quantity > 0)
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>
                            <!--Stock Quantity Check-->
                            @else
                            <p class="text-danger text-center" style="font-size:13px; font-weight:bold; margin-top:5px; margin-bottom:3px;">Out Of Stock</p>
                            @endif
                            <!--Maximum Quantity Of Database Product Quantity-->
                            @if($item->qty > $product->quantity)
                                <p class="text-danger text-center" style="font-size:12px; font-weight:bold; margin-top:5px; margin-bottom:3px;">Maximum Quantity</p>
                            @endif
                            <p class="text-center"><a href="#" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')">Save for Later</a></p>
                        </div>
                        <div class="price-field sub-total"><p class="price">{{$setting->currency}}{{ $item->subtotal }}</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="Delete" wire:click.prevent="destroy('{{$item->rowId}}')">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!--Cart Item Empty Check-->
                @else
                <h5 class="text-danger text-center" style="padding:30px 0;">No item added in cart!</h5>
                @endif
            </div>
            <!--Order Summary-->
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{$setting->currency}}{{Cart::instance('cart')->subtotal()}}</b></p>
                    <!--Coupon Check to Cart Total After Discount-->
                    @if(Session::has('coupon'))
                        <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}}) <a href="#" title="Remove Coupon" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></span><b class="index">{{$setting->currency}}{{number_format($discount,2)}}</b></p>
                        <p class="summary-info"><span class="title">Subtotal with Discount </span><b class="index">{{$setting->currency}}{{number_format($subtotalAfterDiscount,2)}}</b></p>
                        <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span><b class="index">{{$setting->currency}}{{number_format($taxAfterDiscount,2)}}</b></p>
                        <p class="summary-info total-info "><span class="title"><b>Total</b></span><b class="index">{{$setting->currency}}{{number_format($totalAfterDiscount,2)}}</b></p>
                    @else
                        <p class="summary-info"><span class="title">Tax</span><b class="index">{{$setting->currency}}{{Cart::instance('cart')->tax()}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title"><b>Total</b></span><b class="index">{{$setting->currency}}{{Cart::instance('cart')->total()}}</b></p>
                    @endif
                </div>
                <!--Coupon Check-->
                <div class="checkout-info">
                    @if(!Session::has('coupon'))
                    <label class="checkbox-field" style="margin-top:10px;">
                        <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span>I have coupon code</span>
                    </label>
                    @if($haveCouponCode == 1)
                    <div class="summary-item">
                        <form wire:submit.prevent="applyCouponCode">
                            <h4 class="title-box">Coupon Code</h4>
                            <p class="row-in-form">
                                <label for="coupon-code">Enter your coupon code</label>
                                <input type="text" name="coupon-code" placeholder="Coupon Code" wire:model="couponCode" />
                            </p>
                            <button type="submit" class="btn btn-small">Apply</button>
                        </form>
                    </div>
                    @endif
                    @endif
                    <!--Checkout & Continue Shopping Button-->
                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>
                    <a class="link-to-shop" href="{{ route('shop') }}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
                <!--Cart Clear Button-->
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>
            <!--Cart Empty Check-->
            @else
            <div class="text-center" style="padding: 30px 0;">
                <h2>Your cart is empty!</h2>
                <p>Add items to it now.</p>
                <a href="/shop" class="btn btn-success btn-small">Shop Now</a>
            </div>
            @endif
            <!--Save For Later-->
            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom: 1px solid; padding-bottom: 15px;">{{Cart::instance('saveForLater')->count()}} item(s) Saved For Later</h3>
                @if(Session::has('save_success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('save_success_message')}}
                </div>
                @endif
                @if(Cart::instance('saveForLater')->count() > 0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                        </div>
                        @php
                            $product = App\Models\Product::find($item->model->id);
                        @endphp
                        @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                        <div class="price-field produtc-price"><p class="price">{{$setting->currency}}{{$item->model->discounted_price}}</p></div>
                        @else
                        <div class="price-field produtc-price"><p class="price">{{$setting->currency}}{{$item->model->regular_price}}</p></div>
                        @endif
                        <div class="quantity">
                            <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move To Cart</a></p>
                        </div>
                        <div class="delete">
                            <a href="#" class="btn btn-delete" title="Delete" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')">
                                <span>Delete from save for later</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <!--Save For Later Empty Check-->
                @else
                <p class="text-danger text-center" style="padding:30px 0;">No item in save for later!</p>
                @endif
            </div>
        </div><!--end main content area-->
    </div><!--end container-->

</main>
