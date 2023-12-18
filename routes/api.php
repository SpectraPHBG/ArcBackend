<?php

use App\Http\Controllers\Api\AirCoolerController;
use App\Http\Controllers\Api\CpuController;
use App\Http\Controllers\Api\GpuController;
use App\Http\Controllers\Api\HDDController;
use App\Http\Controllers\Api\LiquidCoolerController;
use App\Http\Controllers\Api\M2SSDController;
use App\Http\Controllers\Api\MotherboardController;
use App\Http\Controllers\Api\PCCaseController;
use App\Http\Controllers\Api\PowerSupplyController;
use App\Http\Controllers\Api\RamController;
use App\Http\Controllers\Api\RigController;
use App\Http\Controllers\Api\SataSSDController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});

//api/users
//Route::apiResource('users', UserController::class);

Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users', [UserController::class, 'update']);
Route::delete('/users', [UserController::class, 'destroy']);

Route::get('/rams', [RamController::class, 'index']);
Route::get('/rams/{id}', [RamController::class, 'show']);

Route::get('/gpus', [GpuController::class, 'index']);
Route::get('/gpus/{id}', [GpuController::class, 'show']);

Route::get('/m2Ssds', [M2SSDController::class, 'index']);
Route::get('/m2Ssds/{id}', [M2SSDController::class, 'show']);

Route::get('/ssds', [SataSSDController::class, 'index']);
Route::get('/ssds/{id}', [SataSSDController::class, 'show']);

Route::get('/hdds', [HDDController::class, 'index']);
Route::get('/hdds/{id}', [HDDController::class, 'show']);

Route::get('/cpus', [CpuController::class, 'index']);
Route::get('/cpus/{id}', [CpuController::class, 'show']);
Route::get('/cpus/random/{brand}/{count}', [CpuController::class, 'random']);

Route::get('/powerSupplies', [PowerSupplyController::class, 'index']);
Route::get('/powerSupplies/{id}', [PowerSupplyController::class, 'show']);

Route::get('/airCoolers', [AirCoolerController::class, 'index']);
Route::get('/airCoolers/{id}', [AirCoolerController::class, 'show']);

Route::get('/liquidCoolers', [LiquidCoolerController::class, 'index']);
Route::get('/liquidCoolers/{id}', [LiquidCoolerController::class, 'show']);

Route::get('/motherboards', [MotherboardController::class, 'index']);
Route::get('/motherboards/{id}', [MotherboardController::class, 'show']);

Route::get('/cases', [PCCaseController::class, 'index']);
Route::get('/cases/{id}', [PCCaseController::class, 'show']);

Route::post('/compatibilityCheck', [RigController::class, 'check']);
Route::get('/getUserPcs', [RigController::class, 'index']);
Route::post('/savePc', [RigController::class, 'store']);
Route::post('/buildPc', [RigController::class, 'build']);
Route::delete('/deletePc/{id}', [RigController::class, 'destroy']);
