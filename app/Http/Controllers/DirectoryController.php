<?php

namespace App\Http\Controllers;

use App\Models\MentoringOutlining;
use App\Models\Start;
use App\Models\TellReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DirectoryController extends Controller
{
    public function index() {
        $userId = auth()->user()->id;
        $documents = Start::with('user')->latest()->get();
        $yourDocuments = Start::where('user_id', $userId )->latest()->get();
        return Inertia::render("User/Directory", compact('documents', 'yourDocuments'));
    }

    public function show(Start $directory) {
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole("user") && $user->id !== $directory->user->id) {
            abort(403);
        }

        $mentoringOutlining = MentoringOutlining::where('start_id', $directory->id)->first();
        $replies = TellReply::where('start_id', $directory->id)->get();

        return Inertia::render("User/Directory/Show", [
            'directory' => $directory,
            'mentoringOutlining' => $mentoringOutlining,
            'replies' => $replies
        ]);
    }
}
