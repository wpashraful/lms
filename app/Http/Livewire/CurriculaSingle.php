<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class CurriculaSingle extends Component
{
    public $curricula_id;
    public function render()
    {

        $curriculas = Curriculum::findOrFail($this->curricula_id);
        return view('livewire.curricula-single', [
            'curriculas' => $curriculas
        ]);
    }
}
