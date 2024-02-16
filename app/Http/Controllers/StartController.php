<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'see' => 'required|string',
            'think' => 'required|string',
            'aim' => 'required|string',
            'refine' => 'required|string',
            'tell' => 'required|string',
        ]);

        $request->user()->starts()->create($validated);
        return redirect(route('dashboard'));
    }
}
