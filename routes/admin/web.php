<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarController;



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


// (Admin - Captin - Accountant ) Routes + Auth Route Access
Route::prefix("admin")->middleware('auth')->group(function (){


    // DataEntry Manger Routes Access
    Route::middleware('data-entry-manager')->group(function(){
        
        Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard.index');
        Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard.index');

        // Cars
        Route::resource('cars', 'App\Http\Controllers\Admin\CarController');
        Route::post('/search/cars', 'App\Http\Controllers\Admin\CarController@search');
        Route::get('/search/cars', 'App\Http\Controllers\Admin\CarController@index');

    });

    Route::middleware('data-entry')->group(function(){

        // Movments
        Route::resource('movments', 'App\Http\Controllers\Admin\MovmentController');
        Route::post('/search/movments', 'App\Http\Controllers\Admin\MovmentController@search');
        Route::get('/search/movments', 'App\Http\Controllers\Admin\MovmentController@index');
        // Sollar
        Route::resource('sollars', 'App\Http\Controllers\Admin\SollarController');
        // Maintaince
        Route::resource('maintainces', 'App\Http\Controllers\Admin\MaintainceController');
    });

    Route::middleware('inventory-user')->group(function(){

             // Inventory
             Route::resource('inventory', 'App\Http\Controllers\Admin\InventoryController');

    });


    Route::middleware('purchase-user')->group(function(){
        // Purchase
        Route::resource('purchases', 'App\Http\Controllers\Admin\PurchaceController');
    });
    
    
    // Admin Only Routes Access
    Route::middleware('just-admin')->group(function(){


        // Branche
        Route::resource('branches', 'App\Http\Controllers\Admin\BranchController');

        // New User
        Route::get("/newuser", [AuthController::class, "NewUserPage"]);
        Route::post("/newuser", [AuthController::class, "NewUserLogic"]);
        Route::post("/deleteuser/{id}", [AuthController::class, "DeleteUserLogic"]);
    });

   
    //Logout
    Route::get("/logout", [AuthController::class, "LogOutLogic"]);

});


Route::middleware('user')->group(function () {
    
    
    // Login
    Route::get("/login", [AuthController::class, "LoginPage"]);
    Route::post("/login", [AuthController::class, "LoginLogic"]);
    Route::redirect("/","/login");


});






