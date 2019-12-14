<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'subject_id' , 'subject_name' , 'credit'
    ];

    public function have()
    {
        return $this->hasOne ( 'App\Models\Category' );
    }
}
