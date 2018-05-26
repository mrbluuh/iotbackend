<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TypeMessage extends Model
{
    protected $fillable = [
        'name',
    ];
    
    protected $table = 'type_messages';
    public $primaryKey = 'id';
    public $timestamps = true;
}
