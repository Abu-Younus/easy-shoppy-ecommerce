<!--Main Panel-->
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: rgb(150, 150, 150); color:white;"><h4 class="text-center">{{ Auth::user()->name }}</h4></div>
    <div class="panel-body">
        <div class="row">
            <!--Customer Profile Image Show-->
            @if ($customerProfile->image)
                <div id="circular-image">
                    <img class="card-img-top" src="{{ asset('assets/images/profile') }}{{ '/' }}{{$customerProfile->image }}" alt="{{ Auth::user()->name }}">
                </div>
            @else
                <div id="circular-image">
                    <img class="card-img-top" src="{{ asset('assets/images/dummy.jpg') }}">
                </div>
            @endif
        </div>
        <!--Sidebar List-->
        <ul class="list-group list-group-flush">
            <a href="{{ route('user.dashboard') }}" class="text-muted"> <li class="list-group-item"><i class="fa fa-home"></i> Dashboard</li></a>
            <a href="{{ route('user.dashboard.wishlist') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-heart"></i> My Wishlist</li></a>
            <a href="{{ route('user.orders') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-shopping-cart"></i>  My Order</li></a>
            <a href="{{ route('user.coupons') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-gift"></i>  My Coupons</li></a>
            <a href="{{ route('user.product.ratings') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-star"></i>  My Rating</li></a>
            <a href="{{ route('user.website.review') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-pencil"></i>  Write Review</li></a>

            <a href="{{ route('user.settings') }}" class="text-muted"> <li class="list-group-item"><i class="fa fa-gear"></i> Settings</li> </a>
            <a href="{{ route('user.open.tickets') }}" class="text-muted"> <li class="list-group-item"> <i class="fa fa-telegram"></i> Open Ticket</li> </a>
            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-muted"> <li class="list-group-item"> <i class="fa fa-sign-out"></i> Logout</li> </a>
            <!--Logout Form-->
            <form id="logout-form" method="POST" action="{{route('logout')}}">
                @csrf
            </form>
        </ul>
    </div>
</div>
