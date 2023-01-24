<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RolePermissionController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\OfficeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\UpazilaController;
use App\Http\Controllers\Backend\UnionController;
use App\Http\Controllers\Backend\BlockController;
use App\Http\Controllers\Backend\VillageController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\FiscalYearController;


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

// ****************************************** Essential Links *****************************************
Route::get('/updateapp', function()
{
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');

    return "Clean";
    // return what you want
});

Route::get('/link-storage', function() {
    $exitCode = Artisan::call('storage:link');

    return "Linked";
    // return what you want
});

// ****************************************** Front-end Links *****************************************
Route::get('/', function() {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

// ****************************************** Back-end Links *****************************************
Route::group(['middleware' => ['AuthGates'], 'prefix' => '/admin', 'as' => 'admin.'], function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::group(['prefix' => '/role', 'as' => 'role.'], function() {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/active/{id}', [RoleController::class, 'active'])->name('active');
        Route::get('/disable/{id}', [RoleController::class, 'disable'])->name('disable');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => '/permission', 'as' => 'permission.'], function() {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/store', [PermissionController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/role-permission', 'as' => 'rolePermission.'], function() {
        Route::get('/', [RolePermissionController::class, 'index'])->name('index');
        Route::get('/showPermission/{roleId}', [RolePermissionController::class, 'showPermission'])->name('showPermission');
        Route::post('/remove-permission', [RolePermissionController::class, 'removePermission'])->name('removePermission');
        Route::post('/give-permission', [RolePermissionController::class, 'givePermission'])->name('givePermission');
    });

    Route::group(['prefix' => '/designation', 'as' => 'designation.'], function() {
        Route::get('/', [DesignationController::class, 'index'])->name('index');
        Route::post('/store', [DesignationController::class, 'store'])->name('store');
        Route::post('/update/{id}', [DesignationController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => '/office', 'as' => 'office.'], function() {
        Route::get('/', [OfficeController::class, 'index'])->name('index');
        Route::get('/archived', [OfficeController::class, 'archived'])->name('archived');
        Route::post('/store', [OfficeController::class, 'store'])->name('store');
        Route::get('/show/{id}', [OfficeController::class, 'show'])->name('show');
        Route::post('/update/{id}', [OfficeController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => '/user', 'as' => 'user.'], function() {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('/edit-user-minimum/{id}', [UserController::class, 'editUserMinimum'])->name('editUserMinimum');
        Route::post('/update-user-minimum', [UserController::class, 'updateUserMinimum'])->name('updateUserMinimum');
        Route::get('/block/{id}', [UserController::class, 'block'])->name('block');
        Route::get('/active/{id}', [UserController::class, 'active'])->name('active');
        Route::get('/show/{id}', [UserCOntroller::class, 'show'])->name('show');
        Route::post('/update-password', [UserCOntroller::class, 'updatePassword'])->name('updatePassword');
        Route::post('/change-other-user-password', [UserCOntroller::class, 'changeOtherUserPassword'])->name('changeOtherUserPassword');
    });

    Route::get('/edit-profile', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/update-profile', [UserController::class, 'update_profile'])->name('update_profile');

    Route::group(['prefix' => '/fiscal-year'], function() {
        Route::get('/', [FiscalYearController::class, 'index'])->name('fiscal_year.index');
        Route::post('/store', [FiscalYearController::class, 'store'])->name('fiscal_year.store');
        Route::get('/edit/{id}', [FiscalYearController::class, 'edit'])->name('fiscal_year.edit');
        Route::post('/edit/{id}', [FiscalYearController::class, 'update'])->name('fiscal_year.update');
        Route::get('/view/{id}', [FiscalYearController::class, 'view'])->name('fiscal_year.view');
        Route::get('/delete/{id}', [FiscalYearController::class, 'destroy'])->name('fiscal_year.delete');
    });

    Route::group(['prefix' => '/region'], function() {
        Route::get('/', [DivisionController::class, 'index'])->name('region.index');
        Route::post('/store', [DivisionController::class, 'store'])->name('region.store');
        Route::get('/edit/{region_id}', [DivisionController::class, 'edit'])->name('region.edit');
        Route::post('/edit/{region_id}', [DivisionController::class, 'update'])->name('region.update');
        Route::get('/view/{region_id}', [DivisionController::class, 'view'])->name('region.view');
        Route::get('/delete/{region_id}', [DivisionController::class, 'destroy'])->name('region.delete');
    });

    Route::group(['prefix' => '/district'], function() {
        Route::get('/', [DistrictController::class, 'index'])->name('district.index');
        Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
        Route::get('/edit/{district_id}', [DistrictController::class, 'edit'])->name('district.edit');
        Route::post('/edit/{district_id}', [DistrictController::class, 'update'])->name('district.update');
        Route::get('/view/{district_id}', [DistrictController::class, 'view'])->name('district.view');
        Route::get('/delete/{district_id}', [DistrictController::class, 'destroy'])->name('district.delete');
    });

    Route::group(['prefix' => '/upazila'], function() {
        Route::get('/', [UpazilaController::class, 'index'])->name('upazila.index');
        Route::post('/store', [UpazilaController::class, 'store'])->name('upazila.store');
        Route::get('/edit/{upazila_id}', [UpazilaController::class, 'edit'])->name('upazila.edit');
        Route::post('/edit/{upazila_id}', [UpazilaController::class, 'update'])->name('upazila.update');
        Route::get('/view/{upazila_id}', [UpazilaController::class, 'view'])->name('upazila.view');
        Route::get('/delete/{upazila_id}', [UpazilaController::class, 'destroy'])->name('upazila.delete');
    });

    Route::group(['prefix' => '/union'], function() {
        Route::get('/', [UnionController::class, 'index'])->name('union.index');
        Route::get('/create', [UnionController::class, 'create'])->name('union.create');
        Route::post('/store', [UnionController::class, 'store'])->name('union.store');
        Route::get('/edit/{id}', [UnionController::class, 'edit'])->name('union.edit');
        Route::post('/edit/{id}', [UnionController::class, 'update'])->name('union.update');
        Route::get('/view/{id}', [UnionController::class, 'view'])->name('union.view');
        Route::get('/delete/{id}', [UnionController::class, 'destroy'])->name('union.delete');
    });

    Route::group(['prefix' => '/block'], function() {
        Route::get('/', [BlockController::class, 'index'])->name('block.index');
        Route::get('/create', [BlockController::class, 'create'])->name('block.create');
        Route::post('/store', [BlockController::class, 'store'])->name('block.store');
        Route::get('/edit/{id}', [BlockController::class, 'edit'])->name('block.edit');
        Route::post('/edit/{id}', [BlockController::class, 'update'])->name('block.update');
        Route::get('/view/{id}', [BlockController::class, 'view'])->name('block.view');
        Route::get('/delete/{id}', [BlockController::class, 'destroy'])->name('block.delete');
    });

    Route::group(['prefix' => '/village'], function() {
        Route::get('/', [VillageController::class, 'index'])->name('village.index');
        Route::get('/create', [VillageController::class, 'create'])->name('village.create');
        Route::post('/store', [VillageController::class, 'store'])->name('village.store');
        Route::get('/edit/{id}', [VillageController::class, 'edit'])->name('village.edit');
        Route::post('/edit/{id}', [VillageController::class, 'update'])->name('village.update');
        Route::get('/view/{id}', [VillageController::class, 'view'])->name('village.view');
        Route::get('/delete/{id}', [VillageController::class, 'destroy'])->name('village.delete');
    });

    Route::group(['prefix' => '/notification'], function() {
        Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
        Route::get('/read/{message}/{reference_id}', [NotificationController::class, 'read_view'])->name('notification.read_view');
    });

    Route::group(['prefix' => '/setting'], function() {
        Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        Route::post('/update/{id}', [SettingController::class, 'update'])->name('setting.update');
    });

});
