<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class DriverPosition extends Model
{
    use Notifiable;

    protected $fillable = [
        'id_driver','lat','lng'
    ];
    
    protected $table = 'driver_position';
    public $primaryKey = 'id';
    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo('App\User','id_driver');
    }
    
}
