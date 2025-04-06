<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'getAllRecipes']);

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
