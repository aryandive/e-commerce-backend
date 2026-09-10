<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

// ECOM custom static routes overriding Bagisto core where necessary

Route::group(['middleware' => ['web', 'theme', 'locale', 'currency']], function () {
    Route::get('/home', function () {
        return Redirect::to('/');
    });

    // We let Bagisto core handle '/shop' as defined in store-front-routes.php, 
    // but typically Bagisto uses '/' for home, so we ensure the shop index is accessible.
    // If we need '/shop' specifically mapped to the catalog listing:
    Route::get('/shop', [\Webkul\Shop\Http\Controllers\SearchController::class, 'index'])->name('ecom.shop.index');

    Route::get('/contact', function () {
        return view('shop::static.contact');
    })->name('ecom.contact');

    Route::get('/gallery', function () {
        return view('shop::static.gallery');
    })->name('ecom.gallery');

    Route::get('/reviews', function () {
        return view('shop::static.reviews');
    })->name('ecom.reviews');
});
