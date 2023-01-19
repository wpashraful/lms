<?php

namespace App\Http\Livewire;

use App\Models\Quizz;
use Livewire\Component;

class QuizzIndex extends Component
{
    public function render()
    {
        $quizzs = Quizz::paginate(10);
        return view('livewire.quizz-index',[
            'quizzs' => $quizzs
        ]);
    }
    public function quizzDelete($id){
            $quizz = Quizz::findOrFail($id);
            $quizz->delete();

            flash()->addsuccess('Quizz deleted');
    }
}
