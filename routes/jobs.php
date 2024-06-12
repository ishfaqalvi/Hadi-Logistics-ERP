<?php
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Jobs Routes
|--------------------------------------------------------------------------
*/
Route::controller(JobController::class)->as('jobs.')->group(function () {
    Route::get('list',                  'index'         )->name('index'         );
    Route::get('create',                'create'        )->name('create'        );
    Route::post('store',                'store'         )->name('store'         );
    Route::get('edit/{id}',             'edit'          )->name('edit'          );
    Route::get('show/{id}',             'show'          )->name('show'          );
    Route::patch('update/{job}',        'update'        )->name('update'        );
    Route::delete('delete/{id}',        'destroy'       )->name('destroy'       );
    Route::get('get-vehicles',          'getVehicles'   )->name('getVehicles'   );
});

/*
|--------------------------------------------------------------------------
| Job document Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix'    => 'document',
    'as'        => 'jobs.document.',
    'controller'=> DocumentController::class
], function () {
    Route::get('/{id}',             'index'  )->name('index'  );
    Route::post('store',            'store'  )->name('store'  );
    Route::post('update',           'update' )->name('update' );
    Route::delete('delete/{id}',    'destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Job document Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix'    => 'verification',
    'as'        => 'jobs.verification.',
    'controller'=> VerificationController::class
], function () {
    Route::get('/{id}',             'index'  )->name('index'  );
    Route::post('store',            'store'  )->name('store'  );
    Route::post('update',           'update' )->name('update' );
    Route::delete('delete/{id}',    'destroy')->name('destroy');
});


/*
|--------------------------------------------------------------------------
| Job document Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix'    => 'passport-check',
    'as'        => 'jobs.passport-check.',
    'controller'=> PassportCheckController::class
], function () {
    Route::get('list/{id}',         'index'  )->name('index'  );
    Route::post('store',            'store'  )->name('store'  );
    Route::post('update',           'update' )->name('update' );
    Route::delete('delete/{id}',    'destroy')->name('destroy');
});
