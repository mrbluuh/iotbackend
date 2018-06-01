<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TypeAdward extends Model
{

    protected $fillable = [
        'name', 
    ];
    
    protected $table = 'type_adwards';
    public $primaryKey = 'id';
    public $timestamps = true;

}
