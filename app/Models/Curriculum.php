<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{

    protected $fillable = [
        'name',
        'course_id',
    ];
    use HasFactory;
    public function homeworks(){
        return $this->hasMany(HomeWork::class);
    }
    public function attandance(){
        return $this->hasMany(Invoice::class);
    }

    public function notes(){
        return $this->belongsToMany(Note::class, 'note_curriculla', 'curriculla_id', 'note_id');
    }

    public function course(){
        return  $this->belongsTo(Course::class,'course_id');
    }

    public function presentstudents(){
        $attendance = Attendance::where('curriculum_id',$this->id)->count();
        return $attendance;
    }


}
