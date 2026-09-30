<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\ShoppingListController;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');

Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');

Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

Route::get('/meal-plans', [MealPlanController::class, 'index'])
    ->name('meal-plans.index');

Route::get('/meal-plans/create', [MealPlanController::class, 'create'])
    ->name('meal-plans.create');

Route::post('/meal-plans', [MealPlanController::class, 'store'])
    ->name('meal-plans.store');

Route::delete('/meal-plans/{mealPlan}', [MealPlanController::class, 'destroy'])
    ->name('meal-plans.destroy');

Route::get('/meal-plans/{mealPlan}/edit', [MealPlanController::class, 'edit'])
    ->name('meal-plans.edit');

Route::put('/meal-plans/{mealPlan}', [MealPlanController::class, 'update'])
    ->name('meal-plans.update');   
    
Route::get('/shopping-list', [ShoppingListController::class, 'index'])
    ->name('shopping-list.index');    