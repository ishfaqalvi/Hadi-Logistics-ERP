<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/
Route::get('dashboard', DashboardController::class)->name('dashboard');

/*
|--------------------------------------------------------------------------
| Jobs Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/jobs')->namespace('\App\Http\Controllers\Admin\Job')->group(__DIR__.'/jobs.php');

// Route::controller(JobController::class)->prefix('jobs')->as('jobs.')->group(function () {
//     Route::get('list',                  'index'         )->name('index'         );
//     Route::get('create',                'create'        )->name('create'        );
//     Route::post('store',                'store'         )->name('store'         );
//     Route::get('edit/{id}',             'edit'          )->name('edit'          );
//     Route::get('show/{id}',             'show'          )->name('show'          );
//     Route::patch('update/{job}',        'update'        )->name('update'        );
//     Route::delete('delete/{id}',        'destroy'       )->name('destroy'       );
//     Route::get('get-vehicles',          'getVehicles'   )->name('getVehicles'   );
// });

/*
|--------------------------------------------------------------------------
| Agents Routes
|--------------------------------------------------------------------------
*/
Route::resource('agents', AgentController::class);

/*
|--------------------------------------------------------------------------
| Customers Routes
|--------------------------------------------------------------------------
*/
Route::resource('customers', CustomerController::class);

/*
|--------------------------------------------------------------------------
| Consignees Routes
|--------------------------------------------------------------------------
*/
Route::resource('consignees', ConsigneeController::class);

/*
|--------------------------------------------------------------------------
| Office Routes
|--------------------------------------------------------------------------
*/
Route::resource('offices', OfficeController::class);

/*
|--------------------------------------------------------------------------
| Expenditures  Routes
|--------------------------------------------------------------------------
*/
Route::resource('expenditures', ExpenditureController::class);

/*
|--------------------------------------------------------------------------
| Catalog Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/catalog')->namespace('\App\Http\Controllers\Admin\Catalog')->group(__DIR__.'/catalog.php');

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
    Route::get('list',                  'index'         )->name('index'         );
    Route::get('create',                'create'        )->name('create'        );
    Route::post('store',                'store'         )->name('store'         );
    Route::get('edit/{id}',             'edit'          )->name('edit'          );
    Route::get('show/{id}',             'show'          )->name('show'          );
    Route::patch('update/{user}',       'update'        )->name('update'        );
    Route::delete('delete/{id}',        'destroy'       )->name('destroy'       );
    Route::get('profile',               'profileEdit'   )->name('profileEdit'   );
    Route::post('profile',              'profileUpdate' )->name('profileUpdate' );
    Route::post('check_email',          'checkEmail'    )->name('checkEmail'    );
    Route::post('check_password',       'checkPassword' )->name('checkPassword' );
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
| Error Log Route
|--------------------------------------------------------------------------
*/
Route::get(
    'logs',
    [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']
)->name('logs');
