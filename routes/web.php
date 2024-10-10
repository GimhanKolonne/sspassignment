<?php

use App\Http\Controllers\BrokerController;
use App\Http\Controllers\BrokerProfileController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/property', [PropertyController::class, 'index'])->name('properties');
Route::get('/community', [CommunityController::class, 'index'])->name('community');
Route::get('/loans', [LoanController::class, 'index'])->name('loans');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property/store', [PropertyController::class, 'store'])->name('property.store');
Route::get('/property/{id}/edit', [PropertyController::class, 'edit'])->name('property.edit');
Route::put('/property/update/{property}', [PropertyController::class, 'update'])->name('property.update');
Route::delete('/property/{property}/delete', [PropertyController::class, 'destroy'])->name('property.destroy');
Route::get('/property/{property}', [PropertyController::class, 'show'])->name('property.show');
Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');
Route::get('/properties/{id}', [PropertyController::class, 'viewProperty'])->name('property.view');
Route::get('/properties/contact', [PropertyController::class, 'contact'])->name('property.contact');



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/broker-profile/create', [BrokerProfileController::class, 'create'])->name('broker-profile.create');
    Route::post('/broker-profile', [BrokerProfileController::class, 'store'])->name('broker-profile.store');
    Route::get('/broker-profile/{brokerProfile}/edit', [BrokerProfileController::class, 'edit'])->name('broker-profile.edit');
    Route::put('/broker-profile/{brokerProfile}', [BrokerProfileController::class, 'update'])->name('broker-profile.update');
    Route::get('broker-profile/{id}', [BrokerProfileController::class, 'show'])->name('broker-profile.show');
    Route::get('/broker-profiles', [BrokerProfileController::class, 'exploreBrokers'])->name('broker-profiles.index');
    Route::get('/broker-profiles/{id}', [BrokerProfileController::class, 'showBrokers'])->name('broker-profiles.view');



    Route::get('/property/{id}/images', [PropertyController::class, 'getImages']);
    Route::get('/properties', [PropertyController::class, 'findProperties'])->name('property.list');
    Route::get('/properties/search', [PropertyController::class, 'searchProperties'])->name('properties.search');
    Route::get('/properties/filter/price', [PropertyController::class, 'filterByPrice'])->name('properties.filter.price');
    Route::get('/properties/filter/type', [PropertyController::class, 'filterByType'])->name('properties.filter.type');

});
//Admin Access Only
Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.user');
        Route::put('users/update/{id}', [AdminController::class, 'updateUserSubmit'])->name('admin.user.update');
        Route::delete('users/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

        Route::get('/propertiesoption', [AdminController::class, 'propertyIndex'])->name('admin.property.option');
        Route::post('property/store', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::delete('property/{property}/delete', [PropertyController::class, 'destroy'])->name('admin.property.delete');
        Route::get('/admin/brokers', [AdminController::class, 'brokers'])->name('admin.broker');});
    Route::delete('/admin/brokers/{brokerProfile}', [AdminController::class, 'deleteBroker'])->name('admin.broker.delete');

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
