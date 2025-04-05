<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function getAllRecipes(){
        $recipes = Recipe::all();
        $recipes = $recipes->slice(0,3);
        return view('welcome', compact('recipes'));
    }
}
