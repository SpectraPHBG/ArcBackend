<?php

use App\Admin\Controllers\AirCoolerController;
use App\Admin\Controllers\AirCoolerSocketController;
use App\Admin\Controllers\BrandController;
use App\Admin\Controllers\CaseFormController;
use App\Admin\Controllers\ChipsetController;
use App\Admin\Controllers\CpuController;
use App\Admin\Controllers\ExpansionSlotController;
use App\Admin\Controllers\ExpSlotMBController;
use App\Admin\Controllers\FormFactorController;
use App\Admin\Controllers\GpuController;
use App\Admin\Controllers\GraphicChipsetController;
use App\Admin\Controllers\GraphicMemoryTypeController;
use App\Admin\Controllers\HardDriveController;
use App\Admin\Controllers\LiquidCoolerController;
use App\Admin\Controllers\LiquidCoolerSocketController;
use App\Admin\Controllers\M2FormFactorsController;
use App\Admin\Controllers\M2SSDController;
use App\Admin\Controllers\MemoryTypeController;
use App\Admin\Controllers\MotherboardController;
use App\Admin\Controllers\PCCaseController;
use App\Admin\Controllers\PCCaseFanController;
use App\Admin\Controllers\PCCaseFormFactorController;
use App\Admin\Controllers\PCCaseMotherboardController;
use App\Admin\Controllers\PowerSupplyController;
use App\Admin\Controllers\RamController;
use App\Admin\Controllers\SataSSDController;
use App\Admin\Controllers\SocketController;
use App\Admin\Controllers\StorageInterfaceController;
use App\Admin\Controllers\StorageInterfaceMotherboardController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('brands', BrandController::class);
    $router->resource('caseForms', CaseFormController::class);
    $router->resource('sockets', SocketController::class);
    $router->resource('storageInterfaces', StorageInterfaceController::class);
    $router->resource('memoryTypes', MemoryTypeController::class);
    $router->resource('gpuMemories', GraphicMemoryTypeController::class);
    $router->resource('chipsets', ChipsetController::class);
    $router->resource('expansionSlots', ExpansionSlotController::class);
    $router->resource('formFactors', FormFactorController::class);
    $router->resource('cpus', CpuController::class);
    $router->resource('rams', RamController::class);
    $router->resource('sataSSDs', SataSSDController::class);
    $router->resource('m2SSDs', M2SSDController::class);
    $router->resource('powerSupplies', PowerSupplyController::class);
    $router->resource('motherboards', MotherboardController::class);
    $router->resource('m2FormFactors', M2FormFactorsController::class);
    $router->resource('liquidCoolerSockets', LiquidCoolerSocketController::class);
    $router->resource('liquidCoolers', LiquidCoolerController::class);
    $router->resource('hardDrives', HardDriveController::class);
    $router->resource('gpus', GpuController::class);
    $router->resource('expansionSlotsMB', ExpSlotMBController::class);
    $router->resource('cases', PCCaseController::class);
    $router->resource('caseFans', PCCaseFanController::class);
    $router->resource('caseFormFactors', PCCaseFormFactorController::class);
    $router->resource('casesMotherboards', PCCaseMotherboardController::class);
    $router->resource('airCoolers', AirCoolerController::class);
    $router->resource('airCoolerSockets', AirCoolerSocketController::class);
    $router->resource('storageInterfacesMotherboards', StorageInterfaceMotherboardController::class);

});
