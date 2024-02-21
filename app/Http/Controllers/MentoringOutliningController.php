<?php

namespace App\Http\Controllers;

use App\Models\MentoringOutlining;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MentoringOutliningController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'mentoring' => 'required',
            'outlining' => 'required',
        ]);

        MentoringOutlining::updateOrCreate([
            'start_id' => $request->start_id,
        ], [
            'user_id' => auth()->user()->id,
            'mentoring' => $request->mentoring,
            'outlining' => $request->outlining,
        ]);

        return redirect()->back()->with('success','Submitted Successfully!');
    }
}
