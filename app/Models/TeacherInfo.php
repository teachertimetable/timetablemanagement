<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherInfo extends Model
{
    public function teach(){
        return $this->hasMany ('App\Models\Subject');
    }
}
