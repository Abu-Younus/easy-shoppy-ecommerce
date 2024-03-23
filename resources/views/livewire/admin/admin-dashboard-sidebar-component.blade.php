<!--Main Panel-->
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;"><h4 class="text-center">{{ Auth::user()->name }}</h4></div>
    <div class="panel-body">
        <div class="row">
            <!--Admin and Role Admin Profile Image Show-->
            @if ($user->profile->image)
                <div id="circular-image">
                    <img class="card-img-top" src="{{ asset('assets/images/profile') }}{{ '/' }}{{ $user->profile->image }}" alt="{{ Auth::user()->name }}">
                </div>
            @else
                <div id="circular-image">
                    <img class="card-img-top" src="{{ asset('assets/images/dummy.jpg') }}">
                </div>
            @endif
        </div>
        <!--Admin and Role Admin Dashboard Sidebar Links-->
        <ul class="list-group list-group-flush">
            <a title="Dashboard" href="{{ route('admin.dashboard') }}" class="text-muted"> <li class="list-group-item"><i class="fa fa-home"></i> Dashboard</li></a>

            @if($user->categories == 1)
                <a title="Categories" href="{{ route('admin.categories') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-list-alt"></i> Categories</li></a>
            @endif

            @if($user->brands == 1)
                <a title="Brands" href="{{ route('admin.brands') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-bitcoin"></i> Brands</li></a>
            @endif

            @if($user->products == 1)
                <a title="Products" href="{{ route('admin.products') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-product-hunt"></i> Products</li></a>
            @endif

            @if($user->pickup_points == 1)
                <a title="Pickup Points" href="{{ route('admin.pickup_points') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-truck"></i> Pickup Points</li></a>
            @endif

            @if($user->warehouses == 1)
                <a title="Warehouses" href="{{route('admin.warehouses')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-home"></i> Warehouses</li></a>
            @endif

            @if($user->home_slider == 1)
                <a title="Home Slider" href="{{route('admin.homeslider')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-sliders"></i> Home Slider</li></a>
            @endif

            @if($user->sale_setting == 1)
                <a title="Sale Setting" href="{{route('admin.sale')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-bolt"></i> Sale Setting</li></a>
            @endif

            @if($user->offers == 1)
                <a title="Offers" href="{{route('admin.coupons')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-gift"></i> Offers</li></a>
            @endif

            @if($user->orders == 1)
                <a title="Orders" href="{{route('admin.orders')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-shopping-cart"></i> Orders</li></a>
            @endif

            @if($user->return_orders == 1)
                <a title="Return Orders" href="{{route('admin.return.orders')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-undo"></i> Return Orders</li></a>
            @endif

            @if($user->blog_categories == 1)
                <a title="Blog Categories" href="{{ route('admin.blog.categories') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-list"></i> Blog Categories</li></a>
            @endif

            @if($user->blogs == 1)
                <a title="Blogs" href="{{ route('admin.blogs') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-film"></i> Blogs</li></a>
            @endif

            @if($user->user_role == 1)
                <a title="User Role" href="{{ route('admin.user.role') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-user"></i> User Role</li></a>
            @endif

            @if($user->contact_messages == 1)
                <a title="Contact Messages" href="{{route('admin.contact')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-comment"></i> Contact Messages</li></a>
            @endif

            @if($user->product_questions == 1)
                <a title="Product Questions" href="{{route('admin.product.questions')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-question-circle"></i> Product Questions</li></a>
            @endif

            @if($user->tickets == 1)
                <a title="Tickets" href="{{route('admin.show.tickets')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-telegram"></i> Tickets</li></a>
            @endif

            @if($user->all_reports == 1)
                <a title="All Reports" href="{{ route('admin.all.reports') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-file"></i> All Reports</li></a>
            @endif

            @if($user->settings == 1)
                <a title="Settings" href="{{route('admin.settings')}}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-gear"></i> Settings</li></a>
            @endif

            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-muted"> <li class="list-group-item"> <i class="fa fa-sign-out"></i> Logout</li> </a>
            <!--Logout Form-->
            <form id="logout-form" method="POST" action="{{route('logout')}}">
                @csrf
            </form>
        </ul>
    </div>
</div>
