<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogDetailController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ClientAboutController;
use App\Http\Controllers\ClientBlogController;
use App\Http\Controllers\ClientCommentController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ClientGaleryController;
use App\Http\Controllers\ClientIndexController;
use App\Http\Controllers\ClientMenuController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\ClientReservationController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PannierController;
use App\Http\Controllers\RepasController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComndController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// مسارات عامة
Route::get('/clientBlog/search', [ClientBlogController::class, 'search'])->name('search');
Route::get('/blog-detail/store', [BlogDetailController::class, 'store'])->name('createComment');
Route::get('/clientReservation/store', [ClientReservationController::class, 'store'])->name('createReservation');
Route::get('/clientIndex/store', [ClientIndexController::class, 'store'])->name('createreservation');
Route::get('/clientContact/store', [ClientContactController::class, 'store'])->name('createContact');
Route::get('/user/reservations/{id}', [UserController::class, 'reservations'])->name('reservations');
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/user/contacts/{id}', [UserController::class, 'contacts'])->name('contacts');
Route::get('/pannier/add/{id}', [PannierController::class, 'add'])->name('add_pannier');

// مسارات الكوبونات
Route::resource('coupon', CouponController::class);
Route::delete('/coupon/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
Route::get('/coupon/create', [CouponController::class, 'store'])->name('coupon.create');
Route::get('/coupon/add', [CouponController::class, 'addCoupon'])->name('coupon.add');

// مسارات الوجبات
Route::get('/repas/specific', [RepasController::class, 'index_type'])->name('repa.type');

// مسارات الدفع
Route::patch('/commande/Payée/{id}', [ComndController::class, 'payee'])->name('comnd.payee');

// مسارات المتحكمات
Route::resource('pannier', PannierController::class);
Route::resource('repas', RepasController::class);
Route::resource('contact', ContactController::class);
Route::resource('photos', GaleryController::class);
Route::resource('chef', ChefController::class);
Route::resource('reservation', ReservationController::class);
Route::resource('admin', AdminController::class);
Route::resource('user', UserController::class);
Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
Route::resource('comment', CommentController::class);
Route::resource('clientContact', ClientContactController::class);
Route::resource('clientIndex', ClientIndexController::class);
Route::resource('clientReservation', ClientReservationController::class);
Route::resource('clientAbout', ClientAboutController::class);
Route::resource('clientMenu', ClientMenuController::class);
Route::resource('clientGalery', ClientGaleryController::class);
Route::resource('clientBlog', ClientBlogController::class);
Route::resource('clientBlogDetail', BlogDetailController::class);
Route::resource('clientProfile', ClientProfileController::class);
Route::resource('clientComment', ClientCommentController::class);
Route::resource('cart', CartController::class);
Route::resource('commande', CommandeController::class);
Route::resource('comnd', ComndController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('checkout', CheckoutController::class);

// الصفحة الرئيسية
Route::get('/', [ClientIndexController::class, 'index'])->name('home');

// التوثيق
Auth::routes();

// لوحة التحكم للإدارة
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');

// مسارات الدفع باستخدام CMI و PayPal
Route::post('/cmi/callback', [CheckoutController::class, 'callback'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::post('/cmi/okUrl', [CheckoutController::class, 'okUrl'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::post('/cmi/failUrl', [CheckoutController::class, 'failUrl'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::get('/url-of-checkout', [CheckoutController::class, 'yourMethod']);

// مسارات PayPal
Route::get('payment', [CheckoutController::class, 'store'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

// صفحات ثابتة
Route::get('/politique-de-confidentialite', function () {
    return view('client.politique');
})->name('politique');

Route::get('/condition-utilisation', function () {
    return view('client.condition-utilisation');
})->name('Cutilisation');

// قائمة الطعام
Route::get('/Menu/Standard-Drinks', [ClientMenuController::class, 'index'])->name('standard-drinks');
Route::get('/Menu/Sucre', [ClientMenuController::class, 'index_sucre'])->name('sucre');
Route::get('/Menu/Sale', [ClientMenuController::class, 'index_sale'])->name('sale');
Route::get('/Menu/Dessert', [ClientMenuController::class, 'index_dessert'])->name('Dessert');
Route::get('/Menu/Sandwich', [ClientMenuController::class, 'index_sandwich'])->name('sandwich');
Route::get('/Menu/Gdrinks', [ClientMenuController::class, 'index_Gdrinks'])->name('Gdrinks');
Route::get('/Menu/A-La-Carte', [ClientMenuController::class, 'index_Alacarte'])->name('Alacarte');

// اختبار
Route::get('/test', [PannierController::class, 'index']);
Route::get('/test2', function () {
    return view('client.test2');
});

// مسارات أخرى
Route::get('/commande', [ComndController::class, 'showcomnds'])->name('showcomnds');
