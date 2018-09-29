<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Entrada extends Model
{

    protected $fillable = [
        'name'
    ];
    
    protected $table = 'entradas';
    public $primaryKey = 'id';
    public $timestamps = true;
    
}
