<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculaEdit extends Component
{      public $curricula_id;
        public $curriculaName;
    public function mount(){
        $curriculum = Curriculum::findOrFail($this->curricula_id);
        $this->curricula_id = $curriculum->id;
        $this->curriculaName = $curriculum->name;
    }

    public function render()
    {
        $curricula = Curriculum::findOrFail($this->curricula_id);
        return view('livewire.curricula-edit');

    }

    protected $rules = [
        'curriculaName' => 'required',
    ];
    public function CurriculaEditForm(){
        $curriculum = Curriculum::findOrFail($this->curricula_id);
        $this->validate();

        $curriculum->name = $this->curriculaName;
        $curriculum->save();

        flash()->addSuccess('Curriculum updated successfully');
    }
}
