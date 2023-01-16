<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function curriculums(){
        return $this->hasMany(Curriculum::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'course_students','course_id', 'user_id');
    }
}
