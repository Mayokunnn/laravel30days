<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $attributes = $request->validate([
            "email" => ["required", "email", "max:254"],
            "password" => ["required"],
        ]);

        //attempt login
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                "password" => "Sorry!, your credentials does not match",
            ]);
        }
        //regenerate session token
        $request->session()->regenerate();

        //redirect
        return redirect("/jobs");
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
