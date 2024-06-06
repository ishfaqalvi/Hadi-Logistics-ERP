<?php

use App\Http\Controllers\Admin\Catalog\DocumentController;
use App\Http\Controllers\Admin\Catalog\VehicleCompanyController;
use App\Http\Controllers\Admin\Catalog\VehicleController;
use App\Http\Controllers\Admin\Catalog\PassportCheckController;
use App\Http\Controllers\Admin\SettingFieldController;
use App\Http\Controllers\Admin\Catalog\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/

Route::get('dashboard', DashboardController::class)->name('dashboard');

/*
|--------------------------------------------------------------------------
| Role Routes
|--------------------------------------------------------------------------
*/
Route::resource('roles', RoleController::class);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::controller(UserController::class)->prefix('users')->as('users.')->group(function () {
    Route::get('list',                'index')->name('index');
    Route::get('create',            'create')->name('create');
    Route::post('store',            'store')->name('store');
    Route::get('edit/{id}',            'edit')->name('edit');
    Route::get('show/{id}',            'show')->name('show');
    Route::patch('update/{user}',    'update')->name('update');
    Route::delete('delete/{id}',    'destroy')->name('destroy');
    Route::get('profile',              'profileEdit')->name('profileEdit');
    Route::post('profile',             'profileUpdate')->name('profileUpdate');
    Route::post('check_email',          'checkEmail')->name('checkEmail');
    Route::post('check_password',    'checkPassword')->name('checkPassword');
});

/*
|--------------------------------------------------------------------------
| Notifications Routes
|--------------------------------------------------------------------------
*/
Route::controller(NotificationController::class)->prefix('notifications')->as('notifications.')->group(function () {
    Route::get('index',               'index')->name('index');
    Route::get('show/{id}',         'show')->name('show');
    Route::delete('destroy/{id}',     'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Audit Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuditController::class)->prefix('audits')->as('audits.')->group(function () {
    Route::get('index',              'index')->name('index');
    Route::get('show/{id}',          'show')->name('show');
    Route::delete('destroy/{id}',    'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function () {
    Route::get('index',         'index')->name('index');
    Route::get('clear-cache',     'clearCache')->name('clear-cache');
    Route::post('save',         'save')->name('save');
});

/*
|--------------------------------------------------------------------------
| Catalog Routes
|--------------------------------------------------------------------------
*/
Route::prefix('catalog')->as('catalog.')->group(function () {
    Route::resource('vehicle-companies', VehicleCompanyController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('passport-checks', PassportCheckController::class);
    Route::resource('verifications', VerificationController::class);
    Route::resource('documents', DocumentController::class);
});

/*
|--------------------------------------------------------------------------
| Error Log Route
|--------------------------------------------------------------------------
*/
Route::get(
    'logs',
    [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']
)->name('logs');
