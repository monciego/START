<?php

namespace App\Http\Controllers;

use App\Models\Start;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DirectoryController extends Controller
{
    public function index() {
        $userId = auth()->user()->id;
        // this is for admin
        $documents = Start::with('user')->latest()->get();
        // this is for user
        $yourDocuments = Start::where('user_id', $userId )->get();
        return Inertia::render("User/Directory", compact('documents', 'yourDocuments'));
    }

    public function show(Start $directory) {
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole("user") && $user->id !== $directory->user->id) {
            abort(403);
        }

        return Inertia::render("User/Directory/Show", [
            'directory' => $directory
        ]);
    }
}
