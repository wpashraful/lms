<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Curriculum;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCreate extends Component
{

    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $enddate;


    public $days = [
        'Saturday',
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday'

    ];



    protected $rules = [
      'name' => 'required|unique:courses,name',
      'description' => 'required',
      'price' => 'required',
        'enddate' => 'required',
    ];


    public function CourseFormSubmit(){

        $this->validate();

        $course = Course::Create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id,
        ]);

        $course->save();

//        $start_date = new DateTime(now());
//        $end_date =   new DateTime($this->end_date);
//        $interval =  new DateInterval('P1D');
//        $date_range = new DatePeriod($start_date, $interval, $end_date);

        $end_date = new DateTime($this->enddate);
        $interval = new DateInterval('P1D');
        $current_date = new DateTime(now());
        $date_range = new DatePeriod($current_date, $interval,$end_date  );


        foreach ($this->selectedDays as $selectedDay){
            foreach ($date_range as $date){
                if ($date->format('l') == $selectedDay){
                    $curriculla  = Curriculum::create([
                        'name' => $this->name,
                        'description' => $this->description,
                        'course_id' => $course->id
                    ]);

                    $curriculla->save();

                }
            }
        }
//        while ($current_date <= $end_date) {
//            if ($current_date->format('l') == 'Sunday') {
//                $sundays++;
//            }
//            $current_date->modify('+1 day');
//        }




        flash()->addSuccess('course created successfully');
        return redirect()->route('course.index');

    }
    public function render()
    {

        return view('livewire.course-create');
    }




}
