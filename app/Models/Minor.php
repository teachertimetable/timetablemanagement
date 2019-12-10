<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minor extends Model
{
    protected $table = "minor_info";
    protected $primaryKey = "minor_id";
    public $incrementing = false;
    protected $fillable = [
        'minor_id' , 'minor_info'
    ];
    protected $keyType = 'string';
}
