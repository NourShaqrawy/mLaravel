<?php

use App\Http\Controllers\Api\apicontroller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user',function(Request $request){
    return $request -> user();
});
Route::apiResource('categories ',apicontroller::class);