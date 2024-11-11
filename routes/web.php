<?php
<<<<<<< HEAD
namespace App\Http\Controllers;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ChambreController;
use Illuminate\Support\Facades\Route;

// مسارات الإدارة
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // حجز الغرف
    Route::get('reservation-chambre', [ReservationController::class, 'indexChambreReservation'])->name('reservation.chambre.index');
    Route::get('reservation-chambre/create', [ReservationController::class, 'createChambreReservation'])->name('reservation.chambre.create');
    Route::post('reservation-chambre/store', [ReservationController::class, 'storeChambreReservation'])->name('reservation.chambre.store');
    Route::get('reservation-chambre/{id}', [ReservationController::class, 'showChambreReservation'])->name('reservation.chambre.show');
    Route::get('reservation-chambre/{id}/edit', [ReservationController::class, 'editChambreReservation'])->name('reservation.chambre.edit');
    Route::put('reservation-chambre/{id}', [ReservationController::class, 'updateChambreReservation'])->name('reservation.chambre.update');
    Route::delete('reservation-chambre/{id}', [ReservationController::class, 'destroyChambreReservation'])->name('reservation.chambre.destroy');

    // حجز طاولات العملاء
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

// مسارات العميل
Route::get('/clientReservation', [ReservationController::class, 'create'])->name('clientReservation.create');
Route::post('/clientReservation/store', [ReservationController::class, 'store'])->name('clientReservation.store');

// إذا كان هناك مسار clientIndex.index مفقود
Route::get('/clientIndex', [ReservationController::class, 'index'])->name('clientIndex.index');

// تواصل العملاء
Route::get('/clientContact', [ContactController::class, 'create'])->name('clientContact.create');
Route::post('/clientContact/store', [ContactController::class, 'store'])->name('clientContact.store');

// مسارات الشيف
Route::get('/chefs', [ChefController::class, 'index'])->name('chefs.index');
Route::get('/chefs/{id}', [ChefController::class, 'show'])->name('chefs.show');

// مسارات المعرض
Route::get('/gallery', [GaleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [GaleryController::class, 'show'])->name('gallery.show');

// مسارات الغرف
Route::get('/chambres', [ChambreController::class, 'index'])->name('chambres.index');
Route::get('/chambres/{id}', [ChambreController::class, 'show'])->name('chambres.show');
=======

use App\Http\Controllers\AdminController;
use App\Http\Controllers\blog_detailController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\chefControler;
use App\Http\Controllers\clientAbout;
use App\Http\Controllers\clientBlog;
use App\Http\Controllers\clientComment;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ClientGaleryController;
use App\Http\Controllers\clientIndex;
use App\Http\Controllers\clientMenu;
use App\Http\Controllers\clientProfile;
use App\Http\Controllers\clientReservation;
use App\Http\Controllers\commandeController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\ContactConroller;
use App\Http\Controllers\galeryConroller;
use App\Http\Controllers\pannierController;
use App\Http\Controllers\RepasConroller;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComndController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/clientBlog/search', [App\Http\Controllers\clientBlog::class, 'search'])->name('search');
Route::get('/blog_detailController/store', [App\Http\Controllers\blog_detailController::class, 'store'])->name('createComment');
Route::get('/clientReservation/store', [App\Http\Controllers\clientReservation::class, 'store'])->name('createReservation');
Route::get('/clientIndex/store', [App\Http\Controllers\clientIndex::class, 'store'])->name('createreservation');
Route::get('/clientContact/store', [App\Http\Controllers\ClientContactController::class, 'store'])->name('createContact');
Route::get('/user/reservations/{id}', [App\Http\Controllers\UserController::class, 'reservations'])->name('reservations');
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::get('/user/contacts/{id}', [App\Http\Controllers\UserController::class, 'contacts'])->name('contacts');
Route::get('/pannier/add/{id}', [App\Http\Controllers\pannierController::class, 'add'])->name('add_pannier');
Route::get('/Coupon', [App\Http\Controllers\CouponController::class, 'index'])->name('coupon.index');
Route::delete('/Coupon/destroy/{id}', [App\Http\Controllers\CouponController::class, 'destroy'])->name('coupon.destroy');
Route::get('/Coupon/create', [App\Http\Controllers\CouponController::class, 'store'])->name('coupon.create');
Route::get('/Coupon/add', [App\Http\Controllers\CouponController::class, 'addCoupon'])->name('coupon.add');
Route::get('/repas/specific', [App\Http\Controllers\RepasConroller::class, 'index_type'])->name('repa.type');

Route::patch('/commande/Payée/{id}', [App\Http\Controllers\ComndController::class, 'payee'])->name('comnd.payee');

Route::resource('pannier', pannierController::class);
Route::resource('repas',RepasConroller::class);
Route::resource('contact', ContactConroller::class);
Route::resource('photos',galeryConroller::class);
Route::resource('chef',chefControler::class);
Route::resource('reservation',reservationController::class);
Route::resource('admin',AdminController::class);
Route::resource('user',UserController::class);
Route::resource('blog',blogController::class);
Route::resource('category',categoryController::class);
Route::resource('comment',commentController::class);
Route::resource('clientContact',ClientContactController::class);
// Route::resource('clientIndex',clientIndex::class)->middleware('auth');
Route::resource('clientIndex',clientIndex::class);
Route::resource('clientReservation',clientReservation::class);
Route::resource('clientAbout',clientAbout::class);
Route::resource('clientMenu',clientMenu::class);
Route::resource('clientGalery',ClientGaleryController::class);
Route::resource('clientBlog',clientBlog::class);
Route::resource('clientBlog_detail',blog_detailController::class);
Route::resource('clientprofile',clientProfile::class);
Route::resource('clientComment',clientComment::class);
Route::resource('cart',cartController::class);
Route::resource('commande',commandeController::class);
Route::resource('comnd',ComndController::class);
Route::resource('reviews',ReviewController::class);
Route::resource('checkout',CheckoutController::class);





// Route::get('/', [clientIndex::class, 'index']);
Route::get('/', [clientIndex::class, 'index']);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// tests :

// Route::get('/test', function() {return view('client.validation');});
// Route::get('/test', [ComndController::class, 'index']);
Route::get('/test', [pannierController::class, 'index']);
Route::get('/test2', function(){
    return view('client.test2');
});
Route::get('/commande', [ComndController::class, 'showcomnds'])->name('showcomnds');


// Route::get('/Menu/starters', [clientMenu::class, 'index'])->name('starters');
// Route::get('/Menu/main', [clientMenu::class, 'index_main'])->name('main');
// Route::get('/Menu/drinks', [clientMenu::class, 'index_drinks'])->name('drinks');
// Route::get('/Menu/desserts', [clientMenu::class, 'index_desserts'])->name('desserts');


Route::post('/cmi/callback', [CheckoutController::class, 'callback'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class); //notez que vous pouvez utiliser le chemin que vous voulez, mais vous devez utiliser la méthode de rappel (callback) implémentée dans la trait CmiGateway
Route::post('/cmi/okUrl', [CheckoutController::class, 'okUrl'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);// dans la trait CmiGateway, cette méthode est vide pour que vous puissiez implémenter votre propre processus après un paiement réussi
Route::post('/cmi/failUrl', [CheckoutController::class, 'failUrl'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);// la fail url redirigera l'utilisateur vers shopUrl avec une erreur pour que l'utilisateur puisse essayer de payer à nouveau
Route::get('/url-of-checkout', [CheckoutController::class, 'yourMethod']);// Par exemple, c'est la route où l'utilisateur cliquera sur "Payer maintenant. "( Nous recommandons de l'utiliser comme shopUrl, afin de pouvoir rediriger l'utilisateur en cas d'échec du paiement)


// Route::get('payment', [PayPalController::class, 'payment'])->name('payment');
Route::get('payment', [CheckoutController::class, 'store'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');



Route::get('/politique-de-confidentialite', function(){
    return view('client.politique');
})->name('politique');
Route::get('/condition-utilisation', function(){
    return view('client.condition-utilisation');
})->name('Cutilisation');



Route::get('/Menu/Standard-Drinks', [clientMenu::class, 'index'])->name('standard-drinks');
Route::get('/Menu/Sucre', [clientMenu::class, 'index_sucre'])->name('sucre');
Route::get('/Menu/Sale', [clientMenu::class, 'index_sale'])->name('sale');
Route::get('/Menu/Dessert', [clientMenu::class, 'index_dessert'])->name('Dessert');
Route::get('/Menu/Sandwich', [clientMenu::class, 'index_sandwich'])->name('sandwich');
Route::get('/Menu/Gdrinks', [clientMenu::class, 'index_Gdrinks'])->name('Gdrinks');
Route::get('/Menu/A-La-Carte', [clientMenu::class, 'index_Alacarte'])->name('Alacarte');


//auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
>>>>>>> 41441e3 (Your commit message)
