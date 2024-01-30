<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = Auth::user();
        if ($user->hasRole("user")) {
            return Inertia::render("User/Dashboard");
        } else if ($user->hasRole("superadministrator")) {
            return Inertia::render("Administrator/Dashboard");
        }
    }
}
