<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Adward extends Model
{
    use Notifiable;

    protected $fillable = [
        'id_type_adward','name','icon'
    ];
    
    protected $table = 'adwards';
    public $primaryKey = 'id';
    public $timestamps = true;
    
}
