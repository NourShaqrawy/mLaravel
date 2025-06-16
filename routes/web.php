<?php


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\excontroller;
use Illuminate\Support\Facades\Route;

//ترتيب الراوت مهم 

Route::get(
    'categories',
    [CategoriesController::class, 'index']
);

Route::get(
    'categories/create',
    [CategoriesController::class, 'create']
);

Route::post(
    'categories',
    [CategoriesController::class, 'store']
);

Route::get(
    'categories/{id}',
    [CategoriesController::class, 'show']
);

Route::get(
    'categories/{id}/edit',
    [CategoriesController::class, 'edit']
);

Route::put(
    'categories/{id}',
    [CategoriesController::class, 'update']
);

Route::delete(
    'categories/{id}',
    [CategoriesController::class, 'destroy']
);
Route::get('', function () {
    return view('welcome');
});
