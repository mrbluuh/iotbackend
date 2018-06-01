<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Route extends Model
{

    use Notifiable;

    protected $fillable = [
        'id_user','id_student','status'
    ];
    
    protected $table = 'routes';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }
    public function student()
    {
        return $this->belongsTo('App\User','id_student');
    }
    
}
