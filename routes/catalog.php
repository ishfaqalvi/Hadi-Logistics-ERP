<?php
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Vehicle Companies Routes
|--------------------------------------------------------------------------
*/
Route::resource('vehicle-companies', VehicleCompanyController::class);

/*
|--------------------------------------------------------------------------
| Vehicles Routes
|--------------------------------------------------------------------------
*/
Route::resource('vehicles', VehicleController::class);

/*
|--------------------------------------------------------------------------
| Passport Checks Routes
|--------------------------------------------------------------------------
*/
Route::resource('passport-checks', PassportCheckController::class);

/*
|--------------------------------------------------------------------------
| Verifications Routes
|--------------------------------------------------------------------------
*/
Route::resource('verifications', VerificationController::class);

/*
|--------------------------------------------------------------------------
| Documents Routes
|--------------------------------------------------------------------------
*/
Route::resource('documents', DocumentController::class);
