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

    public function show(Request $request){
        $id = $request->id;
        $recipe = Recipe::find($id);

        if ($recipe) {
            return view('recipe.show', compact('recipe'));
        } else {
            //TODO: create error view
            return redirect()->route('recipes.index')->with('error', 'Recipe not found');
        }

    } 
}
