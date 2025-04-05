<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function getAllRecipes(){
        $recipes = Recipe::all();
        return view('welcome', compact('recipes'));
    }
}
