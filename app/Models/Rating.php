<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'designation_id')->select('id', 'name', 'profile_image');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student', 'designation_id')->select('id', 'name', 'profile_image');
    }
    public function book(){
        return $this->belongsTo('App\Models\Library', 'book_id')->select('id', 'book_name');
    }


}
