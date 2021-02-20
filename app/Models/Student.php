<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected  $guarded = 'student';

    public function department(){
        return $this->belongsTo('App\Models\Department', 'department_id')->select('id', 'name');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch', 'batch_id')->select('id', 'name');
    }

    public function attendance(){
        return $this->belongsTo('App\Models\Attendance', 'student_id')->select('id', 'attendance_date', 'attendance', 'subject_id');
    }



}
