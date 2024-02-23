<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $identifierId = 'STRT' . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $validated = $request->validate([
            'see' => 'required|string',
            'think' => 'required|string',
            'aim' => 'required|string',
            'refine' => 'required|string',
            'tell' => 'required|string',
        ]);

        $request->user()->starts()->create([
            'see' => $request->see,
            'think' => $request->think,
            'aim' => $request->aim,
            'refine' => $request->refine,
            'tell' => $request->tell,
            'identifier_id' => $identifierId,
        ]);

        return redirect(route('dashboard'))->with('success', 'Submitted Successfully!');
    }
}
