<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function upvote($question_id, $answer_id)
    {
        $question = Question::find($question_id);
        $answer = Answer::find($answer_id);
        $answer->increment('votes_count');
        return view('question', ['question' => $question, 'answers' => $question->answers()->latest()->paginate(5)]);
    }

    public function downvote($question_id, $answer_id)
    {
        $question = Question::find($question_id);
        $answer = Answer::find($answer_id);
        $answer->decrement('votes_count');
        return view('question', ['question' => $question, 'answers' => $question->answers()->latest()->paginate(5)]);
    }
}
