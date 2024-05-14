<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('status', [UserController::class, 'userOnlineStatus']);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/login/{provider}/redirect', [LoginController::class, 'redirectToProvider'])->name('redirectProvider');
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('callbackProvider');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
    Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
    Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
});


Route::group(['middleware' => 'auth'], function () {
    // Halaman Dashboard
    Route::prefix('dashboard')->group(function () {
        // Dashboard Admin
        Route::group(['middleware' => ['role:1'], 'prefix' => 'admin'], function () {
            Route::get('/', [HomeController::class, 'adminNSekum'])->name('dashboard_admin');
            Route::get('/user-management', [UserController::class, 'index'])->name('user_management');
            Route::resource('/users', UserController::class);
            Route::resource('/departments', DepartmentController::class);
            Route::resource('/senders', SenderController::class);
            Route::get('/sender/oki', [SenderController::class, 'oki'])->name('sender.oki');
            Route::get('/sender/naungan', [SenderController::class, 'naungan'])->name('sender.naungan');
            Route::get('/sender/others', [SenderController::class, 'others'])->name('sender.others');
        });
        // Dashboard Sekum
        Route::group(['middleware' => ['role:2'], 'prefix' => 'sekum'], function () {
            Route::get('/', [HomeController::class, 'adminNSekum'])->name('dashboard_sekum');
        });
        // Admin dan Sekum untuk dashboard
        Route::group(['middleware' => ['role:1,2']], function () {
            Route::get('/getDataChart', [DocumentController::class, 'getDataChart'])->name('getDataChart');
        });
        // // Dashboard SC Kestari
        Route::group(['middleware' => ['role:3'], 'prefix' => 'oc'], function () {
            Route::get('/', [HomeController::class, 'oc'])->name('dashboard_oc');
            //     Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.oc');
            //     Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update.oc');
        });
        Route::prefix('documents')->group(function () {
            Route::resource('/document', DocumentController::class)->names([
                'store' => 'documents.store',
                'update' => 'documents.update',
                'destroy' => 'documents.destroy',
            ]);
            Route::get('/suratMasuk', [DocumentController::class, 'suratMasuk'])->name('doc.suratMasuk');
            Route::get('/suratKeluar', [DocumentController::class, 'suratKeluar'])->name('doc.suratKeluar');
            Route::get('/suratKeluar/{id}', [DocumentController::class, 'showSuratKeluar'])->name('doc.showSuratKeluar');
            Route::get('/proposalHmti', [DocumentController::class, 'proposalHmti'])->name('doc.proposalHmti');
            Route::get('/proposalNaungan', [DocumentController::class, 'proposalNaungan'])->name('doc.proposalNaungan');
            Route::get('/lpjHmti', [DocumentController::class, 'lpjHmti'])->name('doc.lpjHmti');
            Route::get('/lpjNaungan', [DocumentController::class, 'lpjNaungan'])->name('doc.lpjNaungan');
            Route::get('/export', [DocumentController::class, 'export_excel'])->name('export.report');
        });
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
