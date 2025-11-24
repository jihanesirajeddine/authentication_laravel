<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;




///////////////////////                  Authentication                     //////////////////////////////

Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::get('/login','showLogin')->name('show.login');
    Route::get('/register','showRegister')->name('show.register');
    Route::post('/login','storeLogin')->name('store.login');
    Route::post('/register','storeRegister')->name('store.register');
});
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

/////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::get('/',action: [StoryController::class,'index'])->name('stories.index');

Route::middleware('auth')->controller(StoryController::class)->group(function(){
    Route::get('/stories/create','create')->name('stories.create');
    Route::post('/stories','store')->name('stories.store');
    Route::get('/stories/{story}/edit', 'edit')->name('stories.edit');
    Route::put( '/stories/{story}','update')->name('stories.update');
    Route::get('/stories/mystories','show')->name( 'stories.show');
    Route::delete('/stories/{story}','destroy')->name('stories.destroy');
});
//////   Route::get('/create',[StoryController::class,'create'])->name('stories.create')->middleware('auth');

