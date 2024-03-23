@section('page-title')
    My Ratings |
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
                                    <h5>My Product Ratings</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <!--Customer Rating Products Count-->
                                        @if($productRatings->count() > 0)
                                            <ul class="product-list grid-products equal-container">
                                                <!--All Rating Products Show-->
                                                @foreach($productRatings as $productRating)
                                                    <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                                                        <div class="product product-style-3 equal-elem ">
                                                            <div class="product-thumnail">
                                                                <a href="{{route('product.details',['slug'=>$productRating->orderItem->product->slug])}}" title="{{$productRating->orderItem->product->name}}">
                                                                    <figure><img src="{{asset('assets/images/products')}}/{{$productRating->orderItem->product->image}}" alt="{{$productRating->orderItem->product->name}}"></figure>
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="{{route('product.details',['slug'=>$productRating->orderItem->product->slug])}}" class="product-name"><span>{{substr($productRating->orderItem->product->name,0,30)}}..</span></a>
                                                                <!--Rating Count-->
                                                                @if($productRating->rating == 5)
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                @elseif($productRating->rating == 4)
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                @elseif($productRating->rating == 3)
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                @elseif($productRating->rating == 2)
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-yellow" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                                                @elseif($productRating->rating == 1)
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
                                                                <!--Rating Product ID Fetch-->
                                                                @php
                                                                    $product = App\Models\Product::find($productRating->orderItem->product->id);
                                                                @endphp
                                                                <!--Rating Product Discounted Price and Regular Price Check-->
                                                                @if($product->discounted_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                                <div class="wrap-price">
                                                                    <span class="product-price">{{$setting->currency}}{{$product->discounted_price}}</span>
                                                                    <del> <span class="product-price reg-price">{{$setting->currency}}{{$product->regular_price}}</span></del>
                                                                </div>
                                                                @else
                                                                <div class="wrap-price"><span class="product-price">{{$setting->currency}}{{$product->regular_price}}</span></div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        <!--Rating Products Empty Check-->
                                        @else
                                            <h4 class="text-center text-danger">No item in added review</h4>
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


