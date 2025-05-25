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

    public function add(){
        return view('recipe.add');
    }

    public function store(Request $request) {
        $recipe = new Recipe();

        $validatedRequest = $request->validate([
            'name' => 'required|string|max:255',
            'ingredient' => 'required|nullable|string|max:255',
            'instruction' => 'required|nullable|string|max:255',
        ]);

        // Basic fields
        $recipe->name = $validatedRequest->input('name');

        // Dynamic ingredient fields (ingredient1, ingredient2, ..., ingredient10)
        $recipe->ingredient = $validatedRequest->input('ingredient');
        for ($i = 1; $i <= 10; $i++) {
            $recipe->{'ingredient' . $i} = htmlspecialchars($request->input('ingredient' . $i), ENT_QUOTES, 'UTF-8');
        }

        // Dynamic instruction fields (instruction1, instruction2, ..., instruction10)
        $recipe->instruction = $validatedRequest->input('instruction');
        for ($i = 1; $i <= 10; $i++) {
            $recipe->{'instruction' . $i} = htmlspecialchars($request->input('instruction' . $i), ENT_QUOTES, 'UTF-8');
        }

        // Save the model to the DB
        $recipe->save();

        // Optional: redirect or return response
        return redirect()->route('welcome')->with('success', 'Recipe saved!');
    }

}
