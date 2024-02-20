<?php

namespace App\Http\Controllers;

use App\Models\Start;
use Illuminate\Http\Request;
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
}
