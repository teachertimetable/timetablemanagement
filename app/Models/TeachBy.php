<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachBy extends Model
{
    public $timestamps = true;
    public $incrementing = true;
    protected $table = "teach_by";
    protected $primaryKey = "subject_id";
    protected $fillable = [
       "subject_id","teacher_id"
    ];
    protected $keyType = 'string';

    public function haveSubjectName()
    {
        return $this->belongsTo ( 'App\Models\Subject' , 'subject_id');
    }

    public function haveTeacher()
    {
        return $this->belongsTo ( 'App\Models\TeacherInfo' , 'teacher_id');
    }
}
