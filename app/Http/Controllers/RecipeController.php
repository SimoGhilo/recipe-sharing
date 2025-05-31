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
            'ingredient' => 'required|nullable|string|max:1000',
            'instruction' => 'required|nullable|string|max:1000',
            'fileInput' => 'required|file|mimes:jpg,jpeg,png|max:5048',
        ]);

        // Basic fields
        $recipe->name = $validatedRequest['name'];

        // Dynamic ingredient fields (ingredient1, ingredient2, ..., ingredient10)
        $recipe->ingredients = $validatedRequest['ingredient'] . ', ';
        for ($i = 1; $i <= 10; $i++) {
            $value = $request->input('ingredient' . $i);
            if ($value) {
                $recipe->ingredients .= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . ', ';
            }
        }

        // Dynamic instruction fields (instruction1, instruction2, ..., instruction10)
        $recipe->instructions = '1. ' . $validatedRequest['instruction'] . ' ';
        for ($i = 1; $i <= 10; $i++) {
            $value = $request->input('instruction' . $i);
            if ($value) {
                $lastChar = substr($value, -1);
                if($lastChar == '.'){
                    $recipe->instructions .= ($i + 1) . '. ' . $value;
                } else {
                    $recipe->instructions .= ($i + 1) . '. ' . $value . '. ';
                }
                
            }
        }

        //File upload

        if ($request->hasFile('fileInput') && $request->file('fileInput')->isValid()) {
            $file = $request->file('fileInput');

            $nameWithoutExt = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $nameWithoutExt);
            $extension = $file->getClientOriginalExtension();
            $filename = $safeName . '.' . $extension;

            // Final path: public/img/
            $destinationPath = public_path('img');

            // Make sure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the file
            $file->move($destinationPath, $filename);

            // Save relative path for use in views or DB
            $recipe->image_url = '/img/' . $filename;
        }


        $recipe->user_id = auth()->id();

        // Save the model to the DB
        $recipe->save();

        // Optional: redirect or return response
        return redirect()->route('welcome')->with('success', 'Recipe saved!');
    }

}
