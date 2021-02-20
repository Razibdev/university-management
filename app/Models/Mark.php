<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id')->select('id', 'name', 'exam_roll', 'department_id', 'batch_id');
    }

    public function exam(){
        return $this->belongsTo('App\Models\Exam', 'exam_id')->select('id', 'exam_title', 'exam_type');
    }
}
