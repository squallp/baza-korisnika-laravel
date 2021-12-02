<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\User;
use Database\Factories\UserFactory;
use App\Models\Klijenti;
use App\Models\Kvar;
use Database\Factories\KlijentiFactory;
use Database\Factories\KvarFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(1)->create();

        $nizMailova = collect(['squall.p@gmail.com','squall.p1@gmail.com','squall.p2@gmail.com']);

        $nizMailova->each(function ($item) {
            User::factory()->create(['email'=>$item]);
        });


//        Kvar::factory()
//            ->has(Klijenti::factory()->count(1))
//            ->count(1)
//            ->create();

        Kvar::factory(30)->create();


    }
}
