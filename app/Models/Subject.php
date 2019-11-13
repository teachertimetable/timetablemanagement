<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    public $incrementing = false;

    protected $fillable = [
        'subject_id','subject_name','credit','teacher_id','start_time','end_time'
    ];

    public function have(){
        return $this->hasMany ('App\Models\TeacherInfo');
    }
}
