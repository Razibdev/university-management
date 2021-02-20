<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo('App\Models\Student', 'student_id')->select('id', 'name', 'exam_roll', 'department_id', 'batch_id');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department', 'department_id')->select('id', 'name');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch', 'batch_id')->select('id', 'name');
    }

    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject_id')->select('id', 'name');
    }

}
