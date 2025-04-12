<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

Route::fallback(function () {
    return redirect()->route('error.index')->with('error', 'Page not found');
});

//TODO: Working on auth, create views, error below
Route:get('/register', [AuthController::class, 'show'])->name('show.register');

// Route:get('/login', [AuthController::class, 'show'])->name('show.login');

Route::get('/', [RecipeController::class, 'getAllRecipes']);

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show')->where('id', '[0-9]+');

Route::get('/error', [RecipeController::class, 'notFound'])->name('error.index');

Route::get('/preview', [RecipeController::class, 'preview'])->name('preview');

