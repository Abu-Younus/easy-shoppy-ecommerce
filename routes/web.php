<?php

use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Livewire\FrontEnd\HomeComponent;
use App\Http\Livewire\FrontEnd\ShopComponent;
use App\Http\Livewire\FrontEnd\CartComponent;
use App\Http\Livewire\FrontEnd\CheckoutComponent;
use App\Http\Livewire\FrontEnd\BlogsComponent;
use App\Http\Livewire\FrontEnd\ProductCategoryComponent;
use App\Http\Livewire\FrontEnd\ProductBrandComponent;
use App\Http\Livewire\FrontEnd\ProductDetailsComponent;
use App\Http\Livewire\FrontEnd\SearchComponent;
use App\Http\Livewire\FrontEnd\WishlistComponent;
use App\Http\Livewire\FrontEnd\ThankYouComponent;
use App\Http\Livewire\FrontEnd\ContactComponent;
use App\Http\Livewire\FrontEnd\AboutComponent;
use App\Http\Livewire\FrontEnd\PagesComponent;
use App\Http\Livewire\FrontEnd\CampaignProductComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReturnProductComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserWebsiteReviewComponent;
use App\Http\Livewire\User\UserDashboardWishlistComponent;
use App\Http\Livewire\User\UserProductRatingsComponent;
use App\Http\Livewire\User\UserSettingsComponent;
use App\Http\Livewire\User\UserCouponsComponent;
use App\Http\Livewire\User\UserOpenTicketsComponent;
use App\Http\Livewire\User\UserAddOpenTicketComponent;
use App\Http\Livewire\User\UserShowOpenTicketComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminAddSpecificationValueComponent;
use App\Http\Livewire\Admin\AdminEditSpecificationValueComponent;
use App\Http\Livewire\Admin\AdminPickupPointComponent;
use App\Http\Livewire\Admin\AdminAddPickupPointComponent;
use App\Http\Livewire\Admin\AdminEditPickupPointComponent;
use App\Http\Livewire\Admin\AdminWarehousesComponent;
use App\Http\Livewire\Admin\AdminAddWarehouseComponent;
use App\Http\Livewire\Admin\AdminEditWarehouseComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoriesComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminCampaignsComponent;
use App\Http\Livewire\Admin\AdminAddCampaignComponent;
use App\Http\Livewire\Admin\AdminEditCampaignComponent;
use App\Http\Livewire\Admin\AdminCampaignProductComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminReturnOrdersComponent;
use App\Http\Livewire\Admin\AdminReturnOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminBlogCategoryComponent;
use App\Http\Livewire\Admin\AdminAddBlogCategoryComponent;
use App\Http\Livewire\Admin\AdminEditBlogCategoryComponent;
use App\Http\Livewire\Admin\AdminBlogsComponent;
use App\Http\Livewire\Admin\AdminAddBlogComponent;
use App\Http\Livewire\Admin\AdminEditBlogComponent;
use App\Http\Livewire\Admin\AdminUserRoleComponent;
use App\Http\Livewire\Admin\AdminAddUserRoleComponent;
use App\Http\Livewire\Admin\AdminEditUserRoleComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminContactMessageReplyComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\Admin\AdminEditLogoFaviconComponent;
use App\Http\Livewire\Admin\AdminProfileComponent;
use App\Http\Livewire\Admin\AdminPagesComponent;
use App\Http\Livewire\Admin\AdminAddPagesComponent;
use App\Http\Livewire\Admin\AdminEditPagesComponent;
use App\Http\Livewire\Admin\AdminSEOComponent;
use App\Http\Livewire\Admin\AdminSMTPComponent;
use App\Http\Livewire\Admin\AdminPaymentGatewayComponent;
use App\Http\Livewire\Admin\AdminAttributesComponent;
use App\Http\Livewire\Admin\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminAddBrandComponent;
use App\Http\Livewire\Admin\AdminEditBrandComponent;
use App\Http\Livewire\Admin\AdminProductSpecificationsComponent;
use App\Http\Livewire\Admin\AdminAddProductSpecificationComponent;
use App\Http\Livewire\Admin\AdminEditProductSpecificationComponent;
use App\Http\Livewire\Admin\AdminShowOpenTicketComponent;
use App\Http\Livewire\Admin\AdminOpenTicketDetailsComponent;
use App\Http\Livewire\Admin\AdminProductQuestionsComponent;
use App\Http\Livewire\Admin\AdminProductQuestionReplyComponent;
use App\Http\Livewire\Admin\AdminAllReportsComponent;
use App\Http\Livewire\Admin\AdminOrderInvoiceComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Socialite Routes
Route::get('/auth/{provider}/redirect', [SocialiteLoginController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteLoginController::class, 'callback'])->name('auth.socialite.callback');

//Front End Home Route
Route::get('/', HomeComponent::class);

//Front End Shop Route
Route::get('/shop', ShopComponent::class)->name('shop');

//Front End Cart Route
Route::get('/cart', CartComponent::class)->name('product.cart');

//Front End Checkout Route
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

//Front End Blogs Route
Route::get('/blogs', BlogsComponent::class)->name('blogs');

//Front End Product Details Route
Route::get('/product/{slug}/{campaign_slug?}/{campaign_product_id?}', ProductDetailsComponent::class)->name('product.details');

//Front End Category, Sub Category, Child Category Product Route
Route::get('/product-category/{category_slug}/{scategory_slug?}/{ccategory_slug?}', ProductCategoryComponent::class)->name('product.category');

//Front End Brand Product Route
Route::get('/product-brand/{brand_slug}', ProductBrandComponent::class)->name('product.brand');

//Front End Search Route
Route::get('/search', SearchComponent::class)->name('product.search');

//Front End Wishlist Route
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

//Front End Thank You Route
Route::get('/thank-you', ThankYouComponent::class)->name('thankyou');

//Front End Contact Us Route
Route::get('/contact-us', ContactComponent::class)->name('contact');

//Front End About Us Route
Route::get('/about-us', AboutComponent::class)->name('about');

//Front End Return Policy Route
Route::get('/page/{page_slug}', PagesComponent::class)->name('page');
//Front End Campaign Product Route
Route::get('/campaign/product/{campaign_slug}', CampaignProductComponent::class)->name('campaign.product');

//User/Customer Routes
Route::middleware(['auth:sanctum','authuser'])->group(function() {
    //User Dashboard Route
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    //User Orders & Review Routes
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/return/order/{order_id}', UserReturnProductComponent::class)->name('user.return.order');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');

    //User Website Review Route
    Route::get('/user/website/review', UserWebsiteReviewComponent::class)->name('user.website.review');

    //User Dashboard Wishlist Route
    Route::get('/user/wishlist', UserDashboardWishlistComponent::class)->name('user.dashboard.wishlist');

    //User Product Review Route
    Route::get('/user/product/ratings', UserProductRatingsComponent::class)->name('user.product.ratings');

    //User Settings Route
    Route::get('/user/settings', UserSettingsComponent::class)->name('user.settings');

    //User Coupons Route
    Route::get('/user/coupons', UserCouponsComponent::class)->name('user.coupons');

    //User Open Ticket Routes
    Route::get('/user/open/tickets', UserOpenTicketsComponent::class)->name('user.open.tickets');
    Route::get('/user/add/open/ticket', UserAddOpenTicketComponent::class)->name('user.add.open.ticket');
    Route::get('/user/show/ticket/{ticket_id}', UserShowOpenTicketComponent::class)->name('user.show.ticket');
});

//Admin Routes
Route::middleware(['auth:sanctum','authadmin'])->group(function() {
    //Admin Dashboard Route
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    //Admin Category, Sub Category, Child Category Routes
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}/{subcategory_slug?}/{childcategory_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    //Admin Product Routes
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    //Admin Product Specification Value Route
    Route::get('/admin/product/add/specification-value/{product_slug}', AdminAddSpecificationValueComponent::class)->name('admin.add.specification_value');
    Route::get('/admin/product/edit/specification-value/{product_slug}', AdminEditSpecificationValueComponent::class)->name('admin.edit.specification_value');

    //Admin Product Pickup Points Routes
    Route::get('/admin/pickup-points', AdminPickupPointComponent::class)->name('admin.pickup_points');
    Route::get('/admin/add-pickup-point', AdminAddPickupPointComponent::class)->name('admin.add_pickup_point');
    Route::get('/admin/edit-pickup-point/{p_point_id}', AdminEditPickupPointComponent::class)->name('admin.edit_pickup_point');

    //Admin Product Warehouses Routes
    Route::get('/admin/warehouses', AdminWarehousesComponent::class)->name('admin.warehouses');
    Route::get('/admin/addwarehouse', AdminAddWarehouseComponent::class)->name('admin.addwarehouse');
    Route::get('/admin/editwarehouse/{warehouse_id}', AdminEditWarehouseComponent::class)->name('admin.editwarehouse');

    //Admin Banner Slider Routes
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    //Admin Home Categories Show Route
    Route::get('/admin/home-categories', AdminHomeCategoriesComponent::class)->name('admin.homecategories');

    //Admin Sale Offer Route
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    //Admin Coupons Routes
    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.editcoupon');

    //Admin Campaigns Routes
    Route::get('/admin/campaigns', AdminCampaignsComponent::class)->name('admin.campaigns');
    Route::get('/admin/campaign/add', AdminAddCampaignComponent::class)->name('admin.addcampaign');
    Route::get('/admin/campaign/edit/{slug}', AdminEditCampaignComponent::class)->name('admin.editcampaign');
    Route::get('/admin/campaign/product/{campaign_slug}', AdminCampaignProductComponent::class)->name('admin.campaign.product');

    //Admin Orders Routes
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    //Admin Return Orders Routes
    Route::get('/admin/return/orders', AdminReturnOrdersComponent::class)->name('admin.return.orders');
    Route::get('/admin/return/order/details/{return_order_id}', AdminReturnOrderDetailsComponent::class)->name('admin.return.order.details');

    //Admin Blog Categories Route
    Route::get('/admin/blog/categories', AdminBlogCategoryComponent::class)->name('admin.blog.categories');
    Route::get('/admin/add/blog/category', AdminAddBlogCategoryComponent::class)->name('admin.add.blog.category');
    Route::get('/admin/edit/blog/category/{blog_category_slug}', AdminEditBlogCategoryComponent::class)->name('admin.edit.blog.category');

    //Admin Blogs Routes
    Route::get('/admin/blogs', AdminBlogsComponent::class)->name('admin.blogs');
    Route::get('/admin/add/blog', AdminAddBlogComponent::class)->name('admin.add.blog');
    Route::get('/admin/edit/blog/{blog_slug}', AdminEditBlogComponent::class)->name('admin.edit.blog');

    //Admin User Role Route
    Route::get('/admin/user/role', AdminUserRoleComponent::class)->name('admin.user.role');
    Route::get('/admin/add/user/role', AdminAddUserRoleComponent::class)->name('admin.add.user.role');
    Route::get('/admin/edit/user/role/{user_id}', AdminEditUserRoleComponent::class)->name('admin.edit.user.role');

    //Admin Contact Messages Route
    Route::get('/admin/contact-us', AdminContactComponent::class)->name('admin.contact');
    Route::get('/admin/contact-message/reply/{contact_id}', AdminContactMessageReplyComponent::class)->name('admin.contact.message.reply');

    //Admin Website Settings Routes
    Route::get('/admin/settings', AdminSettingComponent::class)->name('admin.settings');
    Route::get('/admin/logo-favicon/{setting_id}', AdminEditLogoFaviconComponent::class)->name('admin.edit-logo-favicon');
    Route::get('/admin/profile', AdminProfileComponent::class)->name('admin.profile');
    Route::get('/admin/pages', AdminPagesComponent::class)->name('admin.pages');
    Route::get('/admin/addpage', AdminAddPagesComponent::class)->name('admin.addpage');
    Route::get('/admin/editpage/{page_slug}', AdminEditPagesComponent::class)->name('admin.editpage');
    Route::get('/admin/seo', AdminSEOComponent::class)->name('admin.seo');
    Route::get('/admin/smtp', AdminSMTPComponent::class)->name('admin.smtp');
    Route::get('/admin/payment-gateway', AdminPaymentGatewayComponent::class)->name('admin.payment-gateway');

    //Admin Product Attributes Routes
    Route::get('/admin/attributes', AdminAttributesComponent::class)->name('admin.attributes');
    Route::get('/admin/attribute/add', AdminAddAttributeComponent::class)->name('admin.add_attribute');
    Route::get('/admin/attribute/edit/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.edit_attribute');

    //Admin Brands Routes
    Route::get('/admin/brands', AdminBrandComponent::class)->name('admin.brands');
    Route::get('/admin/addbrand', AdminAddBrandComponent::class)->name('admin.addbrand');
    Route::get('/admin/editbrand/{brand_slug}', AdminEditBrandComponent::class)->name('admin.editbrand');

    //Admin Product Specifications Routes
    Route::get('/admin/specifications', AdminProductSpecificationsComponent::class)->name('admin.specifications');
    Route::get('/admin/add/product/specification', AdminAddProductSpecificationComponent::class)->name('admin.add.product.specification');
    Route::get('/admin/edit/product/specification/{specification_id}', AdminEditProductSpecificationComponent::class)->name('admin.edit.product.specification');

    //Admin Show Tickets Routes
    Route::get('/admin/show/tickets', AdminShowOpenTicketComponent::class)->name('admin.show.tickets');
    Route::get('/admin/open/ticket/details/{ticket_id}', AdminOpenTicketDetailsComponent::class)->name('admin.open.ticket.details');

    //Admin Product Questions Routes
    Route::get('/admin/product/questions', AdminProductQuestionsComponent::class)->name('admin.product.questions');
    Route::get('/admin/product/question/reply/{question_id}', AdminProductQuestionReplyComponent::class)->name('admin.product.question.reply');

    //Admin All Reports Route
    Route::get('/admin/all/reports', AdminAllReportsComponent::class)->name('admin.all.reports');
    //Admin All Orders Report Routes
    Route::get('/admin/order/invoice/{order_id}', [AdminAllReportsComponent::class,'orderInvoice'])->name('admin.order.invoice');
    Route::get('/admin/all/orders/report', [AdminAllReportsComponent::class, 'allOrdersReport'])->name('admin.all.orders.report');
    //Admin All Products Stock Report Route
    Route::get('/admin/all/products/stock/report', [AdminAllReportsComponent::class, 'allProductsStockReport'])->name('admin.product.stock.report');
    //Admin All Tickets Report Route
    Route::get('/admin/all/tickets/report', [AdminAllReportsComponent::class, 'allTicketsReport'])->name('admin.all.tickets.report');
});
