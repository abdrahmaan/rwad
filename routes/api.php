<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\AttendanceCaptinController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PayoutController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();

});



    Route::get("admin/attendance/all",[AttendanceController::class,'getAllAttendance']);
    Route::get("admin/attendance/captin",[AttendanceController::class,'getAllCaptinAttendance']);
    Route::get("admin/payments/all",[PaymentController::class,'getAllPayements']);
    Route::get("admin/payouts/all",[PayoutController::class,'getAllPayouts']);
    Route::get("admin/players",[PlayerController::class,'getAllPlayers']);