<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends  Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected  $guarded = 'teacher';
    public function department(){
        return $this->belongsTo('App\Models\Department', 'department_id')->select('id', 'name');
    }


}


