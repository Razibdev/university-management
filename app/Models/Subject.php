<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo('App\Models\Department', 'department_id')->select('id', 'name');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch', 'batch_id')->select('id', 'name');
    }

    public function semester(){
        return $this->belongsTo('App\Models\Semester', 'semester_id')->select('id', 'name');
    }

}
