<?php

namespace App\Livewire;

use Livewire\Component;
use Session;
use App\Models\Question;
use Illuminate\Support\Str;

class QuestionForm extends Component
{

    public $user_id;
    public $title;
    public $body;
    public $tag_id;

    protected $rules = [
        'user_id' => 'required',
        'title' => 'required',
        'body' => 'required'
    ];

    public function render()
    {
        return view('livewire.question-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validatedData = $this->validate();
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['tag_id'] = 1;

        Session::flash('success', 'Question added successfully!');

        Question::create($validatedData);

        $this->reset();
    }
}
