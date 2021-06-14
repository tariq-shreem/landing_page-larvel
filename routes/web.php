<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioImageController;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/',[HomeController::class,'getData']);

Route::get('/category/all',[CatController::class,'all']);
Route::post('/category/add',[CatController::class,'add']);
Route::get('category/delete/{id}',[CatController::class,'Softdelete']);
Route::get('category/restore/{id}',[CatController::class,'restore']);
Route::get('category/forceDelete/{id}',[CatController::class,'forceDelete']);

Route::get('brand/all',[BrandController::class,'all']);
Route::post('brand/add',[BrandController::class,'add']);
Route::get('brand/update/{id}',[BrandController::class,'update']);
Route::post('brand/updateDone/{id}',[BrandController::class,'updateDone']);
Route::get('brand/delete/{id}',[BrandController::class,'delete']);

Route::get('about/all',[AboutController::class,'all']);
Route::post('about/add',[AboutController::class,'add']);
Route::get('about/delete/{id}',[AboutController::class,'delete']);
Route::get('about/edit/{id}',[AboutController::class,'edit']);
Route::post('about/updateDone/{id}',[AboutController::class,'updateDone']);

Route::get('slider/all',[SliderController::class,'all']);
Route::post('slider/add',[SliderController::class,'add']);
Route::get('slider/delete/{id}',[SliderController::class,'delete']);
Route::get('slider/edit/{id}',[SliderController::class,'edit']);
Route::post('slider/update/{id}',[SliderController::class,'update']);

Route::get('contact',[ContactController::class,'show']);

Route::get('contact/all',[ContactController::class,'all']);
Route::post('contact/add',[ContactController::class,'add']);
Route::post('contact/form',[ContactController::class,'contactForm']);
Route::get('contact/form',[ContactController::class,'getFormContact']);
Route::get('contact/form-delete/{id}',[COntactController::class,'deleteContact']);
Route::get('contact/form-recopnce1/{id}',[COntactController::class,'responceOne']);
Route::post('contact/form-recopnce2/{id}',[COntactController::class,'responceTwo']);

Route::get('changePassword',[ChangePassword::class,'changePassword']);
Route::post('updatePassword',[ChangePassword::class,'updatePassword']);
Route::get('editprofile',[ChangePassword::class,'editProfile']);
Route::post('updateProfile',[ChangePassword::class,'updateProfile']);


Route::get('service/all',[ServiceController::class,'all']);
Route::post('service/add',[ServiceController::class,'add']);
Route::get('service/delete/{id}',[ServiceController::class,'delete']);
Route::get('service/edit/{id}',[ServiceController::class,'edit']);
Route::post('service/updateDone/{id}',[ServiceController::class,'updateDone']);


Route::get('portfolio/all',[PortfolioController::class,'all']);
Route::post('portfolio/add',[PortfolioController::class,'add']);
Route::get('portfolio/delete/{id}',[PortfolioController::class,'delete']);
Route::get('portfolio/edit/{id}',[PortfolioController::class,'edit']);
Route::post('portfolio/update/{id}',[PortfolioController::class,'update']);

Route::get('portfolioImage/all',[PortfolioImageController::class,'all']);
Route::post('portfolioImage/add',[PortfolioImageController::class,'add']);
Route::get('portfolioImage/delete/{id}',[PortfolioImageController::class,'delete']);

Route::get('user/logout',[AuthController::class,'logout']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
return view('admin.index',['users'=>$users]);
})->name('dashboard');
