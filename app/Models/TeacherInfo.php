<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherInfo extends Model
{
    protected $table = 'teacher_info';
    protected $primaryKey = 'teacher_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'teacher_id','teacher_name','teacher_pic_src','teacher_email','teacher_tel','teacher_tel_fax','teacher_minor','position'
    ];
}
