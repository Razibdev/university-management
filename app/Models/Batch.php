<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo('App\Models\Department', 'department_id')->select('id', 'name');
    }
}
