<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\Admin\FuelPriceController;
use App\Models\Branch;


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


// (Admin - DataEntry - Accountant ) Routes + Auth Route Access
Route::prefix("admin")->middleware('auth')->group(function (){

    /// Tests Start
    Route::get('logging', function () {
        $branchs = Branch::all();
        return view('admin.logging.index' , ['Branches' => $branchs]);
    });


    Route::resource('notifications', 'App\Http\Controllers\Admin\NotificationController');
    Route::post('notifications-send','App\Http\Controllers\Admin\NotificationController@Send_FCM');

    Route::get('test', function () {
        return view('admin..maintaince.mokeup');
    });


    Route::resource('cartypes', CarTypeController::class);
    // Tests End

    // DataEntry Manger Routes
    Route::middleware('data-entry-manager')->group(function(){

        
        Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard.index');
        Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index');

        // Cars
        Route::resource('cars', 'App\Http\Controllers\Admin\CarController');
        Route::post('/search/cars', 'App\Http\Controllers\Admin\CarController@search');
        Route::get('/search/cars', 'App\Http\Controllers\Admin\CarController@index');

    });

    // DataEntry  Routes
    Route::middleware('data-entry')->group(function(){

        // Movments
        Route::resource('movments', 'App\Http\Controllers\Admin\MovmentController');
        Route::post('/search/movments', 'App\Http\Controllers\Admin\MovmentController@search');
        Route::get('/search/movments', 'App\Http\Controllers\Admin\MovmentController@index');
        // Sollar
        Route::resource('fuel', 'App\Http\Controllers\Admin\SollarController');
        Route::get('fuelprice', 'App\Http\Controllers\Admin\SollarController@fuelprice_Page');
        // Maintaince
        Route::resource('maintainces', 'App\Http\Controllers\Admin\MaintainceController');
        Route::post('search/maintainces', 'App\Http\Controllers\Admin\MaintainceController@search');
    });

    // Inventory Manger Routes
    Route::middleware('inventory-user')->group(function(){

             // Inventory
             Route::resource('inventory', 'App\Http\Controllers\Admin\InventoryController');

    });

    // Purchases Manager Routes
    Route::middleware('purchase-user')->group(function(){
        // Purchase
        Route::resource('purchases', 'App\Http\Controllers\Admin\PurchaceController');
    });
    
    // Admin Only Routes Access
    Route::middleware('just-admin')->group(function(){


        // Branches
        Route::resource('branches', 'App\Http\Controllers\Admin\BranchController');

        // Maintaince Category
        Route::resource('maintaincecateg', 'App\Http\Controllers\Admin\MaintainceCategController');

        // New User
        Route::get("/newuser", [AuthController::class, "NewUserPage"]);
        Route::post("/newuser", [AuthController::class, "NewUserLogic"]);
        Route::post("/deleteuser/{id}", [AuthController::class, "DeleteUserLogic"]);
    });

   
    //Logout For All SignIn 
    Route::get("/logout", [AuthController::class, "LogOutLogic"]);

});


Route::middleware('user')->group(function () {
    
    
    // Login
    Route::get("/login", [AuthController::class, "LoginPage"]);
    Route::post("/login", [AuthController::class, "LoginLogic"]);
    Route::redirect("/","/login");



});






