<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Student extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','id_user','last_name','group_id'
    ];
    
    protected $table = 'students';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $hidden = [
        'id_user', 'group_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    public function group()
    {
        return $this->belongsTo('App\GroupGrade','group_id');
    }
    
}
