<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function prikazUsera()
    {
        $users = User::all(); // Sva auta
        //$cars = Car::where('name','=','Mercedes')->get();
        return view('klijenti',['users' => $users]);
    }
}
