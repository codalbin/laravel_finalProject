<?php

use App\Http\Controllers\AnswerController;
use App\Livewire\QuestionForm;
use Illuminate\Support\Facades\Route;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Tag;
use App\Models\User;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('questions', [
        'title' => "All Questions",
        'questions' => Question::filter(request(['tag', 'user']))->latest()->paginate(5),
    ]);
});

Route::get('/questions', function () {
    $questions = Question::filter(request(['tag', 'user']))->latest();

    $tag = request('tag');
    $title = 'All Questions';
    if ($tag)
    {
        $tag_name = Tag::where('slug', $tag)->first()->name;
        $title = "Questions tagged with $tag_name";
    }
    return view('questions', [
        'title' => $title,
        'nb_questions' => $questions->count(),
        'questions' => $questions->paginate(5),
    ]);
});

Route::get('/questions/{question:slug}', function (Question $question) {
    $question = Question::where('slug', $question->slug)->first();
    return view('question', ['question' => $question, 'answers' => Answer::where('question_id', $question->id)->latest()->paginate(5)]);
});

Route::post('/questions/{question:id}/upvote', [QuestionController::class, 'upvote'])->name('questions.upvote');
Route::post('/questions/{question:id}/downvote', [QuestionController::class, 'downvote'])->name('questions.downvote');

Route::post('/questions/{question:id}/{answer:id}/upvote', [AnswerController::class, 'upvote'])->name('answers.upvote');
Route::post('/questions/{question:id}/{answer:id}/downvote', [AnswerController::class, 'downvote'])->name('answers.downvote');

Route::get('/new-question', function(){
    return view('new-question');
});

Route::get('/users', function(){
    return view('users', [
        'users' => User::all(),
    ]);
});

Route::get('/about', function () {
    return view('about');
});

