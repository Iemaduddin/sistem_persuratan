<?php

use Illuminate\Support\Facades\Route;

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
	return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\OcController;
use App\Http\Controllers\ScController;
use App\Http\Controllers\StakeholderController;

// Route::get('/', function () {
// 	return redirect('/dashboard');
// })->middleware('auth');
Route::get('/', function () {
	return redirect()->route('login');
});
// Halaman Awal
// Route::get('/home', function () {
// 	return view('auth.login');
// })->name('login');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

Route::middleware(['guest'])->group(function () {
	Route::get('/register', [RegisterController::class, 'create'])->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});

Route::group(['middleware' => 'auth'], function () {
	// Halaman Dashboard
	Route::prefix('dashboard')->group(function () {
		// Dashboard Admin
		Route::group(['middleware' => ['role:1'], 'prefix' => 'admin'], function () {
			Route::get('/', [HomeController::class, 'admin'])->name('dashboard_admin');
			Route::get('/user-management', [AdminController::class, 'user_management'])->name('user_management');
			Route::resource('/stakeholder', StakeholderController::class);
			Route::resource('/letter', LetterController::class);
			Route::resource('/sc', ScController::class);
			Route::resource('/oc', OcController::class);
			// Export Excel
			Route::get('/export-sc', [ScController::class, 'export_excel'])->name('export-sc');
			Route::get('/export-oc', [OcController::class, 'export_excel'])->name('export-oc');
			Route::get('/export-stakeholder', [StakeholderController::class, 'export_excel'])->name('export-stakeholder');
			Route::get('/export-letter', [LetterController::class, 'export_excel'])->name('export-letter');
			// Import Excel
			Route::post('/import-sc', [ScController::class, 'import_excel'])->name('import-sc');
			Route::post('/import-oc', [OcController::class, 'import_excel'])->name('import-oc');
			Route::post('/import-stakeholder', [StakeholderController::class, 'import_excel'])->name('import-stakeholder');
			// Download Template Excel
			Route::get('/download-template-sc', [ScController::class, 'downloadTemplate'])->name('download-template-sc');
			Route::get('/download-template-oc', [OcController::class, 'downloadTemplate'])->name('download-template-oc');
			// Halaman surat
			Route::get('/detail-surat/{letter_id}', [AdminController::class, 'detail_letter'])->name('detail-surat.admin');
		});
		// Dashboard Sekum
		Route::group(['middleware' => ['role:2'], 'prefix' => 'sekum'], function () {
			Route::get('/', [HomeController::class, 'sekum'])->name('dashboard_sekum');
			Route::get('/profile', [ScController::class, 'showSekum'])->name('profile.sekum');
			Route::post('/profile{sc_id}', [ScController::class, 'update'])->name('profile.update.sekum');
			// Halaman surat
			Route::get('/create-letter', [LetterController::class, 'createLetter'])->name('create-letter.sekum');
		});
		// Dashboard SC Kestari
		Route::group(['middleware' => ['role:3'], 'prefix' => 'sc_kestari'], function () {
			Route::get('/', [HomeController::class, 'sc_kestari'])->name('dashboard_sc_kestari');
			Route::get('/profile', [ScController::class, 'showScKestari'])->name('profile.sc_kestari');
			Route::post('/profile{sc_id}', [ScController::class, 'update'])->name('profile.update.sc_kestari');
			// Halaman surat
			Route::get('/create-letter', [LetterController::class, 'createLetter'])->name('create-letter.sc_kestari');
		});
		// Dashboard OC
		Route::group(['middleware' => ['role:4'], 'prefix' => 'oc'], function () {
			Route::get('/', [HomeController::class, 'oc'])->name('dashboard_oc');
			Route::get('/profile', [OcController::class, 'index'])->name('profile.oc');
			Route::post('/profile{oc_id}', [OcController::class, 'update'])->name('profile.update.oc');
			// Halaman surat
			Route::get('/create-letter', [LetterController::class, 'createLetter'])->name('create-letter.oc');
		});
	});
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
// Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
// Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
// Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
// Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
// Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
// Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
// Route::get('/{page}', [PageController::class, 'index'])->name('page');