<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\OpenTicket;
use App\Models\NewsLetter;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    //render method
    public function render()
    {
        //latest orders fetch
        $orders = Order::orderBy('created_at','DESC')->get()->take(10);
        //latest customers fetch
        $latestCustomers = User::where('utype','USR')->get()->take(10);
        //total sales count
        $totalSales = Order::where('status','delivered')->count();
        //totat revenue sum
        $totalRevenue = Order::where('status','delivered')->sum('total');
        //today sales count
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        //today revenue sum
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        //total canceled order fetch
        $totalCanceled = Order::where('status','canceled')->count();
        //total refund order sum
        $totalRefund = Order::where('status','refund')->sum('total');
        //total pending order count
        $pendingOrder = Order::where('status','pending')->count();
        //total refund completed order count
        $refundCompleted = Transaction::where('status','refunded')->count();
        //total customer count
        $totalCustomer = User::where('utype','USR')->count();
        //total review count
        $totalReview = Review::count();
        //total pending ticket count
        $pendingTicket = OpenTicket::where('status', 0)->count();
        //total subscriber count
        $subscriber = NewsLetter::count();
        //total product count
        $totalProduct = Product::count();
        //active products count
        $activeProduct = Product::where('status', 1)->count();
        //inactive products count
        $inactiveProduct = Product::where('status', 0)->count();
        //total category count
        $totalCategory = Category::count();
        //total brand count
        $totalBrand = Brand::count();
        //total active coupon count
        $activeCoupon = Coupon::where('expiry_date','>=',Carbon::now()->format('Y-m-d'))->count();
        //view of admin dashboard component
        return view('livewire.admin.admin-dashboard-component',[
            'orders'=>$orders,
            'latestCustomers'=>$latestCustomers,
            'totalSales'=>$totalSales,
            'totalRevenue'=>$totalRevenue,
            'todaySales'=>$todaySales,
            'todayRevenue'=>$todayRevenue,
            'totalCanceled'=>$totalCanceled,
            'refundCompleted'=>$refundCompleted,
            'pendingOrder'=>$pendingOrder,
            'totalRefund'=>$totalRefund,
            'totalCustomer'=>$totalCustomer,
            'totalReview'=>$totalReview,
            'pendingTicket'=>$pendingTicket,
            'subscriber'=>$subscriber,
            'totalProduct'=>$totalProduct,
            'activeProduct'=>$activeProduct,
            'inactiveProduct'=>$inactiveProduct,
            'totalCategory'=>$totalCategory,
            'totalBrand'=>$totalBrand,
            'activeCoupon'=>$activeCoupon,
        ])->layout('layouts.master');
    }
}
