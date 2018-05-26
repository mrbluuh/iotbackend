<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Newsfeed extends Model
{

    protected $fillable = [
        'id_user', 'title', 'body', 'image'
    ];
    
    protected $table = 'newsfeeds';
    public $primaryKey = 'id';
    public $timestamps = true;
    
}
