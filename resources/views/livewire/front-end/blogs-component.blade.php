@section('page-title')
 Blogs |
@endsection

<div>
    <main id="main" class="main-site">
        <!--Main Container-->
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Blogs</span></li>
                </ul>
            </div>
        </div>

        <div class="container pb-60">
            <div class="col-md-12">
                <!--Blogs Item Count-->
                @if($blogs->count() > 0)
                    <div class="row">
                        <ul class="product-list grid-products equal-container">
                            <!--All Blogs Show-->
                            @foreach($blogs as $blog)
                                <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                                    <div class="product product-style-3 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="">
                                                <figure><img src="{{asset('assets/images/blogs')}}/{{$blog->image}}" alt="{{$blog->title}}" width="100%" height="100%"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><span style="background-color: rgb(233, 233, 233); color:black; text-align: center; padding: 5px;">{{ $blog->title }}</span></a>
                                            <div class="wrap-price">
                                                <span class="product-price">{!! $blog->description !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                <!--Blogs Empty Check-->
                @else
                    <p class="text-danger text-center" style="padding:30px 0; font-size:18px; font-weight:bold;">No blogs</p>
                @endif
                <div class="wrap-pagination-info">
                    {{$blogs->links()}}
                </div>
            </div>
        </div><!--end container-->
    </main>
</div>
