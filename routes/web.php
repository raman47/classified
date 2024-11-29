<?php

use App\Http\Middleware\CheckUserType;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Frontend\SubcategoryController as FrontendSubCategoryController;
use App\Http\Controllers\Frontend\PostAdController;
use App\Http\Controllers\Frontend\LocationController;
use Illuminate\Support\Facades\Route;

// Public route for the welcome page (No authentication required)
Route::get('/', function () {
    return view('welcome');
})->name('home.page');

// Protected routes (authentication required)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Admin routes (for authenticated users with 'admin' user_type)
    Route::middleware(CheckUserType::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


    });

    // User routes (for authenticated users with 'user' user_type)
    Route::middleware(CheckUserType::class)->group(function () {
        Route::get('/user-home', function () {
            return view('welcome'); // This is where 'home.page' is rendered for authenticated users
        })->name('user.home.page');

    });

});

// Admin routes (protected by authentication middleware)
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('childcategories', ChildCategoryController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/postad', [PostAdController::class, 'index'])->name('postad');
    Route::post('/postad/preview', [PostAdController::class, 'preview'])->name('postad-preview');
    Route::post('/postad/store', [PostAdController::class, 'store'])->name('postad-store');
});


// Publicly accessible route for subcategories (NO authentication required)
Route::get('/subcategories/{id}', [FrontendSubCategoryController::class, 'getallsubcategories'])->name('frontend.subcategories');

// Publicly accessible routes for getting states and cities
Route::get('/get-states/{country_id}', [LocationController::class, 'getStates'])->name('getStates');
Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities'])->name('getCities');
