<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AutoAnswer extends Model
{
    protected $fillable = [
        'id_user', 'title', 'body'
    ];
    
    protected $table = 'auto_answers';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    
}
