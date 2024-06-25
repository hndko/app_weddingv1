<?php

use App\Http\Controllers\BrideController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\GroomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\WeddingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [WeddingController::class, 'index'])->name('/');
Route::post('/messages', [WeddingController::class, 'storeMessage'])->name('messages.store');

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::resource('events', EventsController::class);
Route::resource('weddings', WeddingsController::class);
Route::resource('grooms', GroomController::class);
Route::resource('brides', BrideController::class);
Route::resource('stories', StoryController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('gifts', GiftController::class);
Route::resource('messages', MessageController::class);
