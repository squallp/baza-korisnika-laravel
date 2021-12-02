<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klijenti extends Model
{
    use HasFactory;

    protected $table = 'klijentis';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    public function kvarovi()
    {
        return $this->hasMany(Kvar::class);
    }
}
