<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OilController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function() {
    return view("choose");
})->name("home");

Route::prefix("order")->group(function () {
    // Route::get('/', [OrderController::class, "create"])->name("order.home");
    Route::get("/", [OrderController::class, "busy"])->name("order.home");
    Route::post("/store", [OrderController::class, "store"])->name("order.store");
    Route::post("/show", [OrderController::class, "show"])->name("order.show");
    Route::get("/search", [OrderController::class, "search"])->name("order.search");
});

Route::prefix("oil")->group(function () {
    // Route::get("/", [OilController::class, "busy"])->name("oil.home");
    Route::get('/', [OilController::class, "create"])->name("oil.home");
    Route::post("/store", [OilController::class, "store"])->name("oil.store");
    Route::post("/show", [OilController::class, "show"])->name("oil.show");
    Route::get("/search", [OilController::class, "search"])->name("oil.search");
});

Route::middleware("guest")->group(function () {
    Route::get("/login", [UserController::class, "index"])->name("login");
    Route::post("/login", [UserController::class, "login"])->name("login");
    // Route::get("/register", [UserController::class, "create"])->name("register");
    // Route::post("/register", [UserController::class, "register"])->name("register");
});

Route::middleware(["auth"])->prefix("admin")->group(function () {

    Route::get("/", function () {
        return redirect()->route("oil");
    })->name("admin");

    Route::prefix("orders")->group(function () {
        Route::get("/", [OrderController::class, "index"])->name("orders");
        Route::get("/done", [OrderController::class, "done"])->name("orders.done");
        Route::put("/update/{id}", [OrderController::class, "update"])->name("orders.update");
    });

    Route::prefix("oil")->group(function () {
        Route::get("/", [OilController::class, "index"])->name("oil");
        Route::get("/done", [OilController::class, "done"])->name("oil.done");
        Route::put("/update/{id}", [OilController::class, "update"])->name("oil.update");
    });

    Route::get("/logout", [UserController::class, "logout"])->name("logout");
});
