<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function have(){
        return $this->hasMany ('App\Models\TeacherInfo');
    }
}
