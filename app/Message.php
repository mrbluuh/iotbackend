<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Message extends Model
{
    
    use Notifiable;

    protected $fillable = [
        'id_user_from','id_user_to','id_type_message','body', 'accepted'
    ];
    
    protected $table = 'messages';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $hidden = [
        'id_user_from', 'id_user_to',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','id_user_from');
    }
    
}
