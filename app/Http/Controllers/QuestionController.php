<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function upvote($question_id)
    {
        $question = Question::find($question_id);
        $question->increment('votes_count');
        return view('question', ['question' => $question, 'answers' => $question->answers()->latest()->paginate(5)]);
    }

    public function downvote($question_id)
    {
        $question = Question::find($question_id);
        $question->decrement('votes_count');
        return view('question', ['question' => $question, 'answers' => $question->answers()->latest()->paginate(5)]);
    }
}
