<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\BlogBEController;
use App\Http\Controllers\Backend\Blogdetail;
use App\Http\Controllers\Backend\BlogdetailController;
use App\Http\Controllers\backend\BrandlogoController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\FootbannerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TrustController;
use App\Http\Controllers\Backend\VideoControlle;
use App\Http\Controllers\Frontend\AboutusController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LikeController;
use App\Http\Controllers\Frontend\ProductFeController;
use App\Http\Controllers\Frontend\SecureController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Front end controller
Route::get('/', [HomeController::class, 'index'])->name('fe.home');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('fe.wishlist');
Route::get('/cart', [CartController::class, 'cart'])->name('fe.cart');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('fe.checkout');
Route::get('/aboutus', [AboutusController::class, 'aboutus'])->name('fe.aboutus');
Route::get('/contact', [ContactController::class, 'contact'])->name('fe.contact');
Route::get('/blog', [BlogController::class, 'blog'])->name('fe.blog');
Route::get('/faq', [FaqController::class, 'faq'])->name('fe.faq');
Route::get('/product', [ProductFeController::class, 'index'])->name('fe.product');
Route::get('/detail/{name}/{id}', [HomeController::class, 'detail'])->name('fe.detail');
Route::get('/blogdetail/{name}/{id}', [BlogController::class, 'blogdetail'])->name('fe.blogdetail');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('fe.category');


//login,register,forgetpassword
Route::match(['get', 'post'], "/login", [SecureController::class, 'login'])->name("fe.login");
Route::match(['get', 'post'], "/register", [SecureController::class, 'register'])->name("fe.register");
Route::get('/logout', [SecureController::class, 'logout'])->name('fe.logout');
Route::match(['get', 'post'], 'forget', [SecureController::class, 'forget'])->name('fe.forget');

//profile
Route::middleware('phanquyen')->group(function () {
    Route::get('/profile', [SecureController::class, 'profile'])->name('fe.profile');
    Route::post('/profile', [SecureController::class, 'check_profile'])->name('fe.check_profile');
    //change password
    Route::get('/change-password', [SecureController::class, 'change_password'])->name('fe.change_password');
    Route::post('/change-password', [SecureController::class, 'check_change_password'])->name('fe.check_change_password');
});

//Route Search
Route::get('/search/{id?}', [HomeController::class, 'search'])->name('fe.search');

//gio hang
Route::post("/addcart", [CartController::class, 'addcart'])->name("fe.addcart");
Route::match(['get', 'post'], "/cart", [CartController::class, 'cart'])->name("fe.cart");
Route::get("/delcart/{key}", [CartController::class, 'delcart'])->name("fe.delcart");
//checkout
Route::match(['get', 'post'], "/checkout", [CartController::class, 'checkout'])->name("fe.checkout");

Route::get("/verify/{token}", [CartController::class, 'verify'])->name("fe.verify");

//WishList
Route::get('/likes', [LikeController::class, 'index'])->name('fe.likes.index')->middleware('auth');
Route::post('/chi-tiet/like', [LikeController::class, 'store'])->name('fe.likes.store')->middleware('auth');

// ----------------------------------------------------------------

Route::middleware('phanquyen')->group(function () {

    //Back end controller
    Route::get('admin/home', [AdminController::class, 'index'])->name('be.home');

    //Route category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('be.category');
    Route::match(['get', 'post'], 'admin/category/add', [CategoryController::class, 'add'])->name('be.categoryadd');
    Route::match(['get', 'post'], 'admin/category/update{id}', [CategoryController::class, 'update'])->name('be.categoryupdate');
    Route::get('admin/category/del/{id}', [CategoryController::class, 'del'])->name('be.categorydel');

    //Route product
    Route::get('admin/product', [ProductController::class, 'index'])->name('be.product');
    Route::match(['get', 'post'], 'admin/product/add', [ProductController::class, 'add'])->name('be.productadd');
    Route::match(['get', 'post'], 'admin/product/update/{id}', [ProductController::class, 'update'])->name('be.productupdate');
    Route::get('admin/product/del/{id}', [ProductController::class, 'del'])->name('be.productdel');

    //Route home slider
    Route::get('admin/slider', [SliderController::class, 'index'])->name('be.slider');
    Route::match(['get', 'post'], 'admin/slider/add', [SliderController::class, 'add'])->name('be.slideradd');
    Route::match(['get', 'post'], 'admin/slider/update/{id}', [SliderController::class, 'update'])->name('be.sliderupdate');
    Route::get('admin/slider/del/{id}', [SliderController::class, 'del'])->name('be.sliderdel');

    //Route trusted
    Route::get('admin/trust', [TrustController::class, 'index'])->name('be.trust');
    Route::match(['get', 'post'], 'admin/trust/add', [TrustController::class, 'add'])->name('be.trustadd');
    Route::match(['get', 'post'], 'admin/trust/update/{id}', [TrustController::class, 'update'])->name('be.trustupdate');
    Route::get('admin/trust/del/{id}', [TrustController::class, 'del'])->name('be.trustdel');

    //Route Ads
    Route::get('admin/ads', [AdsController::class, 'index'])->name('be.ads');
    Route::match(['get', 'post'], 'admin/ads/add', [AdsController::class, 'add'])->name('be.adsadd');
    Route::match(['get', 'post'], 'admin/ads/update/{id}', [AdsController::class, 'update'])->name('be.adsupdate');
    Route::get('admin/ads/del/{id}', [AdsController::class, 'del'])->name('be.adsdel');

    //Route FootBanner
    Route::get('admin/footbanner', [FootbannerController::class, 'index'])->name('be.footbanner');
    Route::match(['get', 'post'], 'admin/footbanner/add', [FootbannerController::class, 'add'])->name('be.footbanneradd');
    Route::match(['get', 'post'], 'admin/footbanner/update/{id}', [FootbannerController::class, 'update'])->name('be.footbannerupdate');
    Route::get('admin/footbanner/del/{id}', [FootbannerController::class, 'del'])->name('be.footbannerdel');

    //Route blogs
    Route::get('admin/blog', [BlogBEController::class, 'index'])->name('be.blog');
    Route::match(['get', 'post'], 'admin/blog/add', [BlogBEController::class, 'add'])->name('be.blogadd');
    Route::match(['get', 'post'], 'admin/blog/update/{id}', [BlogBEController::class, 'update'])->name('be.blogupdate');
    Route::get('admin/blog/del/{id}', [BlogBEController::class, 'del'])->name('be.blogdel');

    //Route blog detail
    Route::get('admin/blogdetail', [BlogdetailController::class, 'index'])->name('be.blogdetail');
    Route::match(['get', 'post'], 'admin/blogdetail/add', [BlogdetailController::class, 'add'])->name('be.blogdetailadd');
    Route::match(['get', 'post'], 'admin/blogdetail/update/{id}', [BlogdetailController::class, 'update'])->name('be.blogdetailupdate');
    Route::get('admin/blogdetail/del/{id}', [BlogdetailController::class, 'del'])->name('be.blogdetaildel');

    //Route Brand logo
    Route::get('admin/brandlogo', [BrandlogoController::class, 'index'])->name('be.brandlogo');
    Route::match(['get', 'post'], 'admin/brandlogo/add', [BrandlogoController::class, 'add'])->name('be.brandlogoadd');
    Route::match(['get', 'post'], 'admin/brandlogo/update/{id}', [BrandlogoController::class, 'update'])->name('be.brandlogoupdate');
    Route::get('admin/brandlogo/del/{id}', [BrandlogoController::class, 'del'])->name('be.brandlogodel');

    //Route Comment
    Route::get('admin/comment', [CommentController::class, 'index'])->name('be.comment');
    Route::match(['get', 'post'], 'admin/comment/add', [CommentController::class, 'add'])->name('be.commentadd');
    Route::match(['get', 'post'], 'admin/comment/update/{id}', [CommentController::class, 'update'])->name('be.commentupdate');
    Route::get('admin/comment/del/{id}', [CommentController::class, 'del'])->name('be.commentdel');

    //Route Video
    Route::get('admin/video', [VideoControlle::class, 'index'])->name('be.video');
    Route::match(['get', 'post'], 'admin/video/add', [VideoControlle::class, 'add'])->name('be.videoadd');
    Route::match(['get', 'post'], 'admin/video/update/{id}', [VideoControlle::class, 'update'])->name('be.videoupdate');
    Route::get('admin/video/del/{id}', [VideoControlle::class, 'del'])->name('be.videodel');
});
