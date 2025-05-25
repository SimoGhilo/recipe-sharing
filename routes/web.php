<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

Route::fallback(function () {
    return redirect()->route('error.index')->with('error', 'Page not found');
});

//Auth

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.submit');

Route::post('/login', [AuthController::class, 'loginuser'])->name('login.submit');

Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');

//Views routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::get('/profile', [AuthController::class, 'showProfile'])->name('show.profile');

Route::get('/', [RecipeController::class, 'getAllRecipes'])->name('welcome');

Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show')->where('id', '[0-9]+');

Route::get('/error', [RecipeController::class, 'notFound'])->name('error.index');

Route::get('/preview', [RecipeController::class, 'preview'])->name('preview');

Route::get('/recipe/add', [RecipeController::class, 'add'])->name('recipe.add');

Route::post('/recipe/add', [RecipeController::class, 'store'])->name('add.submit');


