<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_id','category_name'
    ];
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    public function have(){
        return $this->hasOne ('App\Models\Subject');
    }
}
