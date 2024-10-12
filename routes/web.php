<?php

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
    return view('welcome');
});

Route::get('/questions', function () {
    return view('questions', [
        'title' => "All Questions",
        'questions' => Question::latest()->paginate(5),
    ]);
});

Route::get('/questions/{question:slug}', function (Question $question) {
    $question = Question::where('slug', $question->slug)->first();
    // $question->increment('views');
    return view('question', ['question' => $question, 'answers' => Answer::where('question_id', $question->id)->latest()->paginate(3)]);
});

Route::post('/questions/{question:slug}/upvote', [QuestionController::class, 'upvote'])->name('questions.upvote');
Route::post('/questions/{question:slug}/downvote', [QuestionController::class, 'downvote'])->name('questions.downvote');

Route::get('/new-question', function(){
    return view('new-question');
});

Route::get('/users', function(){
    return view('users', [
        'users' => User::all(),
    ]);
});

Route::get('/tags/{tag:slug}', function(Tag $tag){
    $questions = $tag->questions ;
    return view ('questions', ['title' => 'Questions related to ' . $tag->name, 'questions' => $questions]) ;
});

Route::get('/user/{user:username}', function(User $user){
    $questions = $user->questions ;
    return view ('questions', ['title' => 'Questions from ' . $user->name, 'questions' => $questions]) ;
});

