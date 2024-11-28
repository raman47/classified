<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;

use App\Http\Controllers\Frontend\SubcategoryController as FrontendSubCategoryController;
use App\Http\Controllers\Frontend\PostAdController;
use App\Http\Controllers\Frontend\LocationController;
use Illuminate\Support\Facades\Route;

// Public route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard and authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/postad', [PostAdController::class, 'index'])->name('postad');
    Route::post('/postad/preview', [PostAdController::class, 'index'])->name('post-preview');
});

// Admin routes (protected by authentication middleware)
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('childcategories', ChildCategoryController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
});

// Publicly accessible route for subcategories (NO authentication required)
Route::get('/subcategories/{id}', [FrontendSubCategoryController::class, 'getallsubcategories'])->name('frontend.subcategories');


Route::get('/get-states/{country_id}', [LocationController::class, 'getStates'])->name('getStates');
Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities'])->name('getCities');



