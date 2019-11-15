<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectType extends Model
{
    protected $table = "subject_type";
    protected $primaryKey = "subject_type_id";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'subject_type_id','subject_describe','subject_type'
    ];

    public function have(){
        return $this->hasOne('App\Models\Subject');
    }
}
