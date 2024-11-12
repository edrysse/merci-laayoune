<?php

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

// إضافة مسار clientIndex.index
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


// مسارات الدفع
Route::get('payment', [CheckoutController::class, 'store'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

// سياسات الاستخدام
Route::get('/politique-de-confidentialite', function() {
    return view('client.politique');
})->name('politique');
Route::get('/condition-utilisation', function() {
    return view('client.condition-utilisation');
})->name('Cutilisation');

// قائمة الطعام
Route::get('/Menu/Standard-Drinks', [clientMenu::class, 'index'])->name('standard-drinks');
Route::get('/Menu/Sucre', [clientMenu::class, 'index_sucre'])->name('sucre');
Route::get('/Menu/Sale', [clientMenu::class, 'index_sale'])->name('sale');
Route::get('/Menu/Dessert', [clientMenu::class, 'index_dessert'])->name('Dessert');
Route::get('/Menu/Sandwich', [clientMenu::class, 'index_sandwich'])->name('sandwich');
Route::get('/Menu/Gdrinks', [clientMenu::class, 'index_Gdrinks'])->name('Gdrinks');
Route::get('/Menu/A-La-Carte', [clientMenu::class, 'index_Alacarte'])->name('Alacarte');

// المصادقة
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
