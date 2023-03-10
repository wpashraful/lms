<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizzEdit extends Component
{
    public $quizz;
    public $question_id;
    public function render()
    {

        $questions = Question::select(['id', 'name'])->whereNotIn('id', $this->quizz->questions->pluck('id')->toArray())->get();
        return view('livewire.quizz-edit',[
            'questions' => $questions
        ]);
    }



    public function addQuestion(){
        $this->quizz->questions()->attach($this->question_id);
        $this->question_id = '';

        flash()->addSuccess('question added successfully');
        return redirect(route('quizz.edit', $this->quizz->id));
    }
}
