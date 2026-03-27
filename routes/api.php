<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

Route::get('/test', function () {
    return "test";
});


/*

level 1 electronics
level 2 mobile phones 
level 2 laptops
level 2 televisions
level 2 cameras
level 3 smartphones
level 3 feature phones
level 3 iphone 

*/



//Product Api routes
Route::get("/products" , [ProductController::class , "index"]);
Route::get("/products/{id}" , [ProductController::class , "show"]);
Route::post("/products" , [ProductController::class , "store"]);
Route::put("/products/{id}" , [ProductController::class , "update"]);
Route::delete("/products/{id}" , [ProductController::class , "destroy"]);




// Category Api routes





Route::get("/categories" , [CategoryController::class , "index"]);
Route::get("/categories/{id}" , [CategoryController::class , "show"]);
Route::post("/categories" , [CategoryController::class , "store"]);
Route::put("/categories/{id}" , [CategoryController::class , "update"]);
Route::delete("/categories/{id}" , [CategoryController::class , "destroy"]);



///middleware test
// Route::get("/check-age" , function() {
//     return "welcome";
// })->middleware("check.age");

Route::middleware("check.age")->group(function() {

    Route::get("/check-age-group" , function() {
        return "welcome to group";
    });
    Route::get("/check-age-group-2" , function() {
        return "welcome to group 2";
    });

    Route::get("/check-age-group-3" , function() {
        return "welcome to group 3";
    });

});

//webinar 