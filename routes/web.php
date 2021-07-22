<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MessageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('/coupons',CouponController::class)->middleware('auth');
Route::resource('/commandes',CommandeController::class)->middleware('auth');
Route::resource('/produits',ProduitController::class)->middleware('auth');
Route::resource('/categories',CategorieController::class)->middleware('auth');
Route::resource('/utilisateurs',UserController::class)->middleware('auth');
Route::resource('/showrooms',ShowroomController::class)->middleware('auth');
Route::resource('/messages',MessageController::class)->middleware('auth');


Route::get('/accueil',[Controller::class, 'accueil']);
Route::post('/commande', [CommandeController::class,'commande']);
Route::get('/dashboard',[Controller::class, 'index'])->middleware('auth');
Route::get('add-to-cart/{id}', [CommandeController::class, 'ajouterAuPanier']);
Route::patch('update-cart', [CommandeController::class, 'update']);
Route::patch('update-know-cart', [CommandeController::class, 'update_know']);
Route::get('/ajoutcommande', [CommandeController::class, 'ajoutCommande']);
Route::get('/savemessage',[MessageController::class,'savemessage']);
Route::get('/valider/{idc}', [CommandeController::class, 'valider'])->name('valider');
Route::get('/description/{id}',[ProduitController::class, 'showd'])->name('description');


Route::delete('remove-from-cart', [CommandeController::class, 'remove']);
Route::patch('update-coupon', [CommandeController::class, 'updateCoupon']);
Route::get('produitsf', [ProduitController::class, 'showf']);
Route::get('/panier', function () {
    return view('front/panier');
});
Route::get('description', [ProduitController::class, 'showd']);


require __DIR__.'/auth.php';
