<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class StudentAdward extends Model
{
    use Notifiable;

    protected $fillable = [
        'id_student','id_adward'
    ];
    
    protected $table = 'student_adwards';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $hidden = [
        'id_student', 'id_adward',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student','id_student');
    }
    public function adward()
    {
        return $this->belongsTo('App\Adward','id_adward');
    }
    
}
