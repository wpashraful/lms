<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizzSingle extends Component
{
    public $quizz;
    public $answer;
    public $answers = ['answer_a', 'answer_b', 'answer_c', 'answer_d'];

    public $answered = [];


    public function render()
    {

        $questions = Question::select(['id', 'name'])->get();
        return view('livewire.quizz-single',[
            'questions' => $questions
        ]);
    }

    public function check(){
        $answer_id = explode(',',$this->answer)[1];
        $matchanswer = explode(',',$this->answer)[0];
        $question = Question::findOrFail($answer_id);
        if($question->correct_answer == $matchanswer){
            flash()->addSuccess('right answer');
            $correct = true;
        }else{
            flash()->addWarning('wrong answer');
            $correct = false;
        }

        $this->answered[$answer_id] = $correct ;

    }
}
