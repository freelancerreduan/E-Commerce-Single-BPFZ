<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPaymentGetwayController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\FrontendBlogController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserCheckoutController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserOrderControler;
use App\Http\Controllers\User\UserWithlistController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    // composer dump-autoload
    dd('Done');
});

Auth::routes();

Route::get('/admin', function(){
    return view('auth.login');
})->name('admin.login');




Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.index');
Route::get('/q', [FrontendHomeController::class, 'search'])->name('frontend.search');
Route::get('/reviews', [FrontendHomeController::class, 'reviews'])->name('frontend.reviews');
Route::get('/category/{slug}', [FrontendHomeController::class, 'category'])->name('frontend.category');
Route::get('/sub-category/{slug}', [FrontendHomeController::class, 'subCategory'])->name('frontend.subCategory.product');
Route::get('/shop/{slug}', [FrontendHomeController::class, 'shop'])->name('frontend.shop');
Route::get('/terms-and-conditions', [FrontendHomeController::class, 'termsAndCondition'])->name('frontend.termsAndCondition');
Route::get('/refund-and-returns-policy', [FrontendHomeController::class, 'returnPolicy'])->name('frontend.returnPolicy');
Route::get('/privacy-policy', [FrontendHomeController::class, 'privacyPolicy'])->name('frontend.privacyPolicy');
Route::get('/about-us', [FrontendHomeController::class, 'about'])->name('frontend.about');
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('frontend.blog');
Route::get('/post/{slug}', [FrontendBlogController::class, 'details'])->name('frontend.blog.details');
Route::get('/post/category/{slug}', [FrontendBlogController::class, 'category'])->name('frontend.blog.category');





Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-list', [AdminHomeController::class, 'userList'])->name('admin.users');
    Route::get('/user/{id}/delete', [AdminHomeController::class, 'deleteUser'])->name('admin.user.delete');

    Route::get('/home-banner', [AdminHomeController::class, 'editHomeBanner'])->name('admin.home.banner');
    Route::post('/home-banner', [AdminHomeController::class, 'updateHomeBanner'])->name('admin.home.banner.update');

    Route::get('/announcement', [AdminHomeController::class, 'announcement'])->name('admin.announcement');
    Route::post('/announcement', [AdminHomeController::class, 'announcementUpdate'])->name('admin.announcementUpdate');


    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('/profile/remove', [AdminProfileController::class, 'remove'])->name('admin.profile.remove');
    Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/profile/change-password', [AdminProfileController::class, 'password'])->name('admin.profile.password');
    Route::post('/profile/update-password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.updatePassword');

    // settings route
    Route::get('/general-setting', [AdminSettingController::class, 'generalSetting'])->name('admin.setting.generalSetting');
    Route::post('/general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('admin.setting.generalSetting.update');
    Route::get('/meta-setting', [AdminSettingController::class, 'metaSetting'])->name('admin.setting.metaSetting');
    Route::post('/meta-setting', [AdminSettingController::class, 'metaSettingUpdate'])->name('admin.setting.metaSetting.update');

    Route::resource('category', AdminCategoryController::class);
    Route::resource('subcategory', AdminSubCategoryController::class);
    Route::post('/add-product-varient', [AdminProductController::class, 'addStep'])->name('admin.add.productVarient');

    Route::resource('product', AdminProductController::class);
    Route::post('/get-subCategory', [AdminProductController::class, 'getSubCategory'])->name('admin.getSubCategory');


    Route::resource('payment-getway', AdminPaymentGetwayController::class);

    Route::resource('page', AdminPageController::class);
    Route::resource('coupon', AdminCouponController::class);
    Route::resource('feedback', AdminFeedbackController::class);
    Route::resource('post', AdminPostController::class);

    Route::get('/orders/pending', [AdminOrderController::class, 'pending'])->name('admin.checkout.pending');
    Route::get('/orders/confirmed', [AdminOrderController::class, 'confirmed'])->name('admin.checkout.confirmed');
    Route::get('/orders/rejected', [AdminOrderController::class, 'rejected'])->name('admin.checkout.rejected');
    Route::get('/orders/canceled', [AdminOrderController::class, 'canceled'])->name('admin.checkout.canceled');
    Route::get('/orders/return', [AdminOrderController::class, 'return'])->name('admin.checkout.return');
    Route::get('/orders/completed', [AdminOrderController::class, 'completed'])->name('admin.checkout.completed');

    Route::post('/orders/status', [AdminOrderController::class, 'status'])->name('admin.order.status');



});


// User Routes
Route::group(['middleware' => ['auth', 'is_user']], function(){
    Route::get('/my-account', [UserHomeController::class, 'index'])->name('user.dashboard');
    Route::get('/account-details', [UserHomeController::class, 'edit'])->name('user.account.edit');
    Route::post('/account-details', [UserHomeController::class, 'update'])->name('user.account.update');
    Route::get('/change-password', [UserHomeController::class, 'password'])->name('user.account.password');
    Route::post('/update-password', [UserHomeController::class, 'passwordUpdate'])->name('user.account.passwordUpdate');
    Route::post('/storeReview', [UserHomeController::class, 'storeReview'])->name('user.review.submit');



    Route::get('/wishlist', [UserWithlistController::class, 'index'])->name('user.wishlist.index');
    Route::post('/wishlist', [UserWithlistController::class, 'store'])->name('user.wishlist.store');
    Route::get('/wishlist/{id}/delete', [UserWithlistController::class, 'delete'])->name('user.wishlist.delete');



    Route::get('/cart', [UserCartController::class, 'index'])->name('user.cart.index');
    Route::post('/cart', [UserCartController::class, 'store'])->name('user.cart.store');
    Route::post('/cart/update', [UserCartController::class, 'update'])->name('user.cart.update');
    Route::get('/cart/{id}delete', [UserCartController::class, 'delete'])->name('user.cart.delete');


    Route::get('/checkout/', [UserCheckoutController::class, 'create'])->name('user.checkout.create');
    Route::post('/getDistrict/', [UserCheckoutController::class, 'getDistrict'])->name('user.getDistrict');
    Route::post('/gettThana/', [UserCheckoutController::class, 'gettThana'])->name('user.gettThana');
    Route::post('/checkout/', [UserCheckoutController::class, 'store'])->name('user.checkout.store');

    Route::get('/orders/', [UserOrderControler::class, 'index'])->name('user.order.index');
    Route::get('/orders/{invoiceId}/show', [UserOrderControler::class, 'show'])->name('user.order.show');



});
