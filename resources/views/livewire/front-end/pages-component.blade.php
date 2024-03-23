@section('page-title')
 Page |
@endsection

<div>
    <main id="main" class="main-site">
        <!--Main Container-->
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>{{ $page->title }}</span></li>
                </ul>
            </div>
        </div>
        <!--Page Details-->
        <div class="container pb-60">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $page->title }}</h3>
                    <p>{!! $page->description !!}</p>
                </div>
            </div>
        </div><!--end container-->
    </main>
</div>
