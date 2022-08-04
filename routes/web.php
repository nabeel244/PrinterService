<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopOwner\ShopOwnerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ShopOwner\RateController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\NotificationController;



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

Route::get('count-notification', [NotificationController::class, 'countNotifications'])->name('count.notification');
Route::get('notification', [NotificationController::class, 'notification'])->name('notification');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('select-shop', [ShopController::class, 'selectShop'])->name('user.select.shop');
Route::get('wallet', [WalletController::class, 'wallet'])->name('wallet');
Route::get('shop-owner-paid-money/{id}', [AdminController::class, 'paidMoneyDetail'])->name('paid.money');
Route::get('history', [HomeController::class, 'history'])->name('history');
Route::get('view-pdf-file/{id}', [FileController::class, 'viewPdf'])->name('view.pdf.file');

// ***************************** User Routes *********************************
Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {

    Route::get('create-account', [UserController::class, 'createAccount'])->name('createAccount');
    Route::get('upload', [FileController::class, 'upload'])->name('upload');
    Route::post('update-account/{id}', [UserController::class, 'updateAccount'])->name('updateAccount');
    Route::post('upload-file', [FileController::class, 'uploadFile'])->name('uploadFile');
    Route::post('update-file', [FileController::class, 'updateFile'])->name('updateFile');
    Route::post('delete-file/{id}', [FileController::class, 'deleteFile'])->name('deleteFile');
    Route::get('file-status', [FileController::class, 'fileStatus'])->name('file.status');
    Route::post('send-file-to-shop', [FileController::class, 'sendFile'])->name('sendFile');
});

// ***************************** Shop Owner Routes *********************************
Route::group(['prefix' => 'shopeowner/', 'as' => 'shopowner.', 'middleware' => 'shop'], function () {

    Route::get('documents', [WalletController::class, 'documents'])->name('document');
    Route::get('my-account', [ShopOwnerController::class, 'myAccount'])->name('myAccount');
    Route::get('user-info/{id}', [ShopOwnerController::class, 'userInfo'])->name('userInfo');
    Route::post('update-file-status', [FileController::class, 'updateFileStatus'])->name('updateFileStatus');
    Route::get('add-user-money', [WalletController::class, 'addMoneyForm'])->name('addMoney');
    Route::get('deduct-user-money', [WalletController::class, 'deductMoneyForm'])->name('deductMoney');
    Route::match(['get', 'post'], 'add-money',  [WalletController::class, 'addMoney'])->name('submit.addMoney');
    Route::post('deduct-money', [WalletController::class, 'deductMoney'])->name('submit.deductMoney');
    Route::post('add-rate', [RateController::class, 'addRate'])->name('addRate');
    Route::post('search-user', [UserController::class, 'searchUser'])->name('searchUser');
    Route::post('remind-user', [UserController::class, 'remindUser'])->name('remind.user');
});

// ***************************** Admin Routes *********************************
Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'middleware' => 'admin'], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('shop-to-approve', [AdminController::class, 'shopToApprove'])->name('shop.to.approve');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::post('update-shop-status/{id}', [AdminController::class, 'updateShopStatus'])->name('update.shop.status');
    Route::get('user-detail/{id}', [AdminController::class, 'userDetail'])->name('user.detail');
    Route::get('shop-owner', [AdminController::class, 'shopOwner'])->name('shop.owner');
    Route::get('shop-owner-detail/{id}', [AdminController::class, 'shopOwnerDetail'])->name('shopOwner.detail');
    Route::get('received-money/{id}', [WalletController::class, 'receivedMoneyDetail'])->name('received.money');
});


Auth::routes();
// -----------------------------login-----------------------------------------
Route::get('/login-or-signup', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.form');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ------------------------------register---------------------------------------
Route::post('/register', [RegisterController::class, 'create'])->name('register');


// -----------------------------forget password ------------------------------
// Route::get('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@getEmail')->name('forget-password');
// Route::post('forget-password', 'App\Http\Controllers\Auth\ForgotPasswordController@postEmail')->name('forget-password');

// Route::get('reset-password/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@getPassword');
// Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@updatePassword');
