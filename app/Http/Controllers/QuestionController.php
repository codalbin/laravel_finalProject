<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function upvote($question)
    {
        // $question->increment('votes');
        // $question = Question::where('slug', $question->slug)->first();
        // dd($question);
        $question = Question::where('slug', $question)->first();
        // dd($question);
        $question->increment('votes');
        return view('question', ['question' => $question, 'answers' => Answer::where('question_id', $question->id)->latest()->paginate(3)]);
    }

    public function downvote($question)
    {
        $question = Question::where('slug', $question)->first();
        $question->decrement('votes');
        return view('question', ['question' => $question, 'answers' => Answer::where('question_id', $question->id)->latest()->paginate(3)]);
    }
}
