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
            return redirect()->route('error.index')->with('error', 'Recipe not found');
        }

    } 

    public function preview(Request $request)
    {
        $query = $request->input('query');

        $results = Recipe::where('name', 'LIKE', "%{$query}%")->limit(5)->get();

        return response()->json($results);
    }

    public function notFound(){
        return view('error.index');
    }
}
