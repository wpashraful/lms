<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseSingle extends Component
{
    public $course_id;
    public function render()

    {
        $course = Course::with(['curriculums', 'students'])->findOrFail($this->course_id);

        return view('livewire.course-single',[
            'course'=> $course,
        ]);
    }
}
