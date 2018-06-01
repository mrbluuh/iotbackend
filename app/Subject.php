<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Subject extends Model
{

    use Notifiable;

    protected $fillable = [
        'id_group_grade','id_user','name'
    ];
    
    protected $table = 'subjects';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $hidden = [
        'id_group_grade', 'id_user',
    ];

    public function group_grade()
    {
        return $this->belongsTo('App\GroupGrade','id_group_grade');
    }
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

    
    
}
