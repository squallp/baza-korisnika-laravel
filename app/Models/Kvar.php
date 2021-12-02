<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kvar extends Model
{
    use HasFactory;

    protected $table = 'kvars';
    public $timestamps = true;
    protected $primaryKey = 'id';


    public function klijent(){
        return $this->belongsTo(Klijenti::class, 'klijentID', 'id');
    }

/*
    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            Klijenti::class,
            'userID', // Foreign key on the cars table...
            'id', // Foreign key on the owners table...
            'id', // Local key on the mechanics table...
            'userID' // Local key on the cars table...);
        );
    }
*/
}
