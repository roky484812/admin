<?php
use Illuminate\Support\Facades\Route;
use Roky\Admin\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('api/admin')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/', 'index')->name('admin.index');
        Route::post('/store', 'store')->name('admin.store');
        Route::post('/update/{id}', 'update')->name('admin.update');
    });
});
