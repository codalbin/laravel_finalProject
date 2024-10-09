<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(): View
    {
        return view('questions', ['questions' => Question::all()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required',
            'body' => 'required',
        ]);

        // The blog post is valid...

        return redirect('/questions');
    }
}
