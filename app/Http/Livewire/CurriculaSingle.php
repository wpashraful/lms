<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
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

    public function attendance($student_id){
            $attendance = Attendance::create([
                'curriculum_id' => $this->curricula_id,
                'user_id' => $student_id
                ]);

            $attendance->save();

            flash()->addSuccess('Attendance Success');
    }
}
