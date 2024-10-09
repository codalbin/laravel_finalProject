<?php

use App\Livewire\QuestionForm;
use Illuminate\Support\Facades\Route;
use App\Models\Question;
use App\Models\Answer;
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
        'questions' => Question::all(),
    ]);
});

Route::get('/questions/{question:slug}', function (Question $question) {
    // dd($question->answers);
    return view('question', ['question' => Question::find($question->id), 'answers' => Answer::where('question_id', $question->id)->paginate(3)]);
});

// Route::get('/questions/create' , [QuestionController::class, 'create']);

Route::get('/new-question', function(){
    return view('new-question');
});
