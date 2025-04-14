<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function registerUser(Request $request){

        try {
            
            // Validate the data
            $validatedRequest = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|min:10'
            ]);

            $user = User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => Hash::make($validatedRequest['password']),
            ]);

            return redirect()->route('welcome')->with('success', 'User created successfully!');

        } catch (\ValidationException $e) {
            return redirect()->back()
            ->withErrors($e->validator)
            ->withInput();
        }
    }

    public function loginUser(Request $request){
        try {
            // Validate the data
            $validatedRequest = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);
    
            // Find the user by email
            $user = User::where('email', $validatedRequest['email'])->first();
    
            // Check if the user exists and the password is correct
            if ($user && Hash::check($validatedRequest['password'], $user->password)) {
                // Pass the user to session data
                Auth::login($user);
                // If credentials are correct, redirect to the welcome page
                return redirect()->route('welcome')->with(['success'=> 'Login Successful!', 'user'=> $user]);
            } else {
                // If credentials are incorrect, redirect back with an error
                return redirect()->back()->withErrors("Invalid credentials!")
                ->withInput();
            }

            //TODO: send user to frontend, change navbar, add a recipe, ingredient table and pictures
    
        } catch (\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }
    

}
