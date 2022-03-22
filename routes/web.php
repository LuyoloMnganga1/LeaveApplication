<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/',[HomeController::class, 'index']);
Route::group(['middleware' => 'auth'], function(){   
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('auth', RegisteredUserController::class);
    Route::get('RegisterForm',[ RegisteredUserController::class, 'create'])->name('RegisterForm');
    Route::resource('users', DashboardController::class);
    Route::get('userEdit/{id}', [DashboardController::class, 'edit']);
    Route::resource('leave', LeaveApplicationController::class);
    Route::get('leaveForm', [LeaveApplicationController::class, 'create'])->name('leaveForm');
    Route::get('leaveStatus/{id}', [LeaveApplicationController::class, 'update'])->name('leaveStatus');
    Route::get('leaveApply', [LeaveApplicationController::class, 'store'])->name('leaveApply');
    Route::get('/userList',[DashboardController::class,'userList'])->name('userList');
    Route::get('/applicationList',[LeaveApplicationController::class,'index'])->name('applicationList');
    Route::post('updateUser/{id}',[DashboardController::class,'update'])->name('updateUser');
    Route::get('destroy/{id}',[DashboardController::class, 'destroy'])->name('destroy');
    Route::get('deleteApplication/{id}',[LeaveApplicationController::class, 'destroy'])->name('deleteApplication');
    Route::get('SignOut',[AuthenticatedSessionController::class,'destroy'])->name('SignOut');
});

Route::group(["middleware" => "role:admin,department-head"], function() {
    Route::get('register', [RegisteredUserController::class, 'store'])
                ->name('register');
    Route::get('department', [DashboardController::class, 'department'])
                ->name('department');
    Route::get('leaves', [LeaveApplicationController::class, 'leaves'])
                ->name('leaves');
    Route::get('holiday', [LeaveApplicationController::class, 'holiday'])
                ->name('holiday');
    Route::get('holidayAdd', [LeaveApplicationController::class, 'holidayAdd'])
                ->name('holidayAdd');
    Route::get('holidayStore', [LeaveApplicationController::class, 'holidayStore'])
                ->name('holidayStore');
    Route::get('holidaydestroy/{id}', [LeaveApplicationController::class, 'holidaydestroy'])
                ->name('holidaydestroy');
    Route::get('holidayEdit/{id}', [LeaveApplicationController::class, 'holidayEdit'])
                ->name('holidayEdit');
    Route::get('holidayUpdate/{id}', [LeaveApplicationController::class, 'holidayUpdate'])
                ->name('holidayUpdate');
    Route::get('leavesAdd', [LeaveApplicationController::class, 'leavesAdd'])
                ->name('leavesAdd');
    Route::get('leavesStore', [LeaveApplicationController::class, 'leavesStore'])
                ->name('leavesStore');
    Route::get('leavesdestroy/{id}', [LeaveApplicationController::class, 'leavesdestroy'])
                ->name('leavesdestroy');
    Route::get('leavesEdit/{id}', [LeaveApplicationController::class, 'leavesEdit'])
                ->name('leavesEdit');
    Route::get('leavesUpdate/{id}', [LeaveApplicationController::class, 'leavesUpdate'])
                ->name('leavesUpdate');
    Route::get('departmentAdd', [DashboardController::class, 'departmentAdd'])
                ->name('departmentAdd');
    Route::get('departmentStore', [DashboardController::class, 'departmentStore'])
                ->name('departmentStore');
    Route::post('updateDepartment/{id}/{name}', [DashboardController::class, 'updateDepartment'])->name('updateDepartment');
    Route::get('editDepartment/{id}', [DashboardController::class, 'editDepartment'])->name('editDepartment');
    Route::get('departmentdestroy/{id}',[DashboardController::class, 'departmentdestroy'])->name('departmentdestroy');
    });
   
Route::middleware('auth', 'role:department-head')->group(function () {
        Route::get('/userListHod',[DashboardController::class,'userListHod'])->name('userListHod');
        Route::get('/applicationListHod',[LeaveApplicationController::class,'indexHod'])->name('applicationListHod');
 });
Route::get("login",[AuthenticatedSessionController::class,'create']);
Route::get("AdminEmail",[DashboardController::class,'sendEmail']);

require __DIR__.'/auth.php';
