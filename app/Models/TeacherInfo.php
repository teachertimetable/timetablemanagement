<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherInfo extends Model
{
    protected $table = 'teacher_info';
    protected $primaryKey = 'teacher_id';
    public $incrementing = false;

    protected $fillable = [
        'teacher_id','teacher_name','teacher_pic_src','teacher_email','teacher_tel'
    ];

    public function teach(){
        return $this->hasMany ('App\Models\Subject');
    }
}
