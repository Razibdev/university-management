<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function admin(){
        return $this->belongsTo('App\Models\Admin', 'designation_id')->select('id', 'name', 'type');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'designation_id')->select('id', 'name', 'type');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student', 'designation_id')->select('id', 'name', 'type');
    }


}
