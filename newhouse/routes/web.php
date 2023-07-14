<?php

use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/szukaj', [SiteController::class, 'search'])->name('search');
Route::get('/nieruchomosc/{slug}',  [SiteController::class, 'property'])->name('property');

Route::get('/admin',[AuthController::class,'login'])->name('login');
Route::post('/admin',[AuthController::class,'login_admin']);
Route::get('/admin/logout',[AuthController::class,'logout_admin'])->name('logout');


Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/nieruchomosci',[AdminController::class,'list'])->name('immovables_list');
    Route::get('/admin/nieruchomosci/dodaj',[AdminController::class,'add'])->name('immovables_add');
    Route::post('/admin/nieruchomosci/zapisz',[AdminController::class,'insert'])->name('immovables_insert');
    Route::get('/admin/nieruchomosci/edytuj/{id}',[AdminController::class,'edit'])->name('immovables_edit');
    Route::post('/admin/nieruchomosci/zmien/{id}',[AdminController::class,'update'])->name('immovables_update');
    Route::get('/admin/nieruchomosci/usun/{id}',[AdminController::class,'delete'])->name('immovables_delete');
    Route::post('/immovables/{id}/photos/{photo}',[AdminController::class,'deletePhoto'])->name('immovables_deletePhoto');
    Route::post('template.update',[TemplateController::class,'updateTemplate'])->name('immovables_updateTemplate');
    Route::get('template.delete',[TemplateController::class,'deleteTemplate'])->name('immovables_deleteTemplate');
});