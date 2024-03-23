@section('page-title')
    My Wishlist |
@endsection

<div>
    <!--Main Container-->
    <div class="container-fluid" style="padding: 30px 0; margin-left:15px; margin-right:15px;">
        <div class="row">
            <div class="col-md-12">
                <!--Main Panel-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                        <h5>Dashboard</h5>
                    </div>
                    <div class="panel-body">
                        <!--Customer Dashboard Sidebar-->
                        <div class="col-md-4">
                            @livewire('user.user-dashboard-sidebar-component')
                        </div>
                        <!--Customer Dashboard Right Panel-->
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;">
                                    <h5>My Wishlist</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <!--Wishlist Item Count-->
                                        @if(Cart::instance('wishlist')->content()->count() > 0)
                                            <ul class="product-list grid-products equal-container">
                                                <!--All Wishlist Item Show-->
                                                @foreach(Cart::instance('wishlist')->content() as $item)
                                                <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                                                    <div class="product product-style-3 equal-elem ">
                                                        <div class="product-thumnail">
                                                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                                                <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{$item->model->name}}</span></a>
                                                            <!--Wishlist Item Product ID Fetch-->
                                                            @php
                                                                $product = App\Models\Product::find($item->model->id);
                                                            @endphp
                                                            <!--Discounted Price and Regular Price Check-->
                                                            @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                            <div class="wrap-price">
                                                                <span class="product-price">{{$setting->currency}}{{$item->model->discounted_price}}</span>
                                                                <del> <span class="product-price reg-price">{{$setting->currency}}{{$item->model->regular_price}}</span></del>
                                                            </div>
                                                            @else
                                                            <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$item->model->regular_price}}</span></div>
                                                            @endif
                                                            <!--Move Product From Wishlist To Cart Button-->
                                                            <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Move To Cart</a>
                                                            <!--Removed For Wishlist Item-->
                                                            <div class="product-wish">
                                                                <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        <!--Wishlist Item Empty Check-->
                                        @else
                                            <h5 class="text-center text-danger">No item in added wishlist</h5>
                                        @endif
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
