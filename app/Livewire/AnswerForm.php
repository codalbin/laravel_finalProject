<?php

namespace App\Livewire;

use Livewire\Component;
use Session;
use App\Models\Answer;
use Illuminate\Support\Str;

class AnswerForm extends Component
{

    public $user_id;
    public $body;
    public $question_id;

    protected $rules = [
        'user_id' => 'required',
        'body' => 'required',
        'question_id' => 'required'
    ];

    public function render()
    {
        return view('livewire.answer-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validatedData = $this->validate();
        // dd($this);

        $validatedData['question_id'] = $this->question_id;

        Session::flash('success', 'Answer added successfully!');

        Answer::create($validatedData);

        $this->reset();
    }
}
