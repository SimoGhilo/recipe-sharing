<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::fallback(function () {
    return redirect()->route('error.index')->with('error', 'Page not found');
});

Route::get('/', [RecipeController::class, 'getAllRecipes']);

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show')->where('id', '[0-9]+');

Route::get('/error', [RecipeController::class, 'notFound'])->name('error.index');