<?php

namespace Tests\Unit;

use App\Models\Kvar;
use Tests\TestCase;
use App\Models\Klijenti;
use Illuminate\Foundation\Testing\DatabaseMigrations; //da koristimo migracije


class klijentiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use DatabaseMigrations; // da koristimo migracije

    /** @test */
    public function klijentiRutaTest()
    {
        $response = $this->get('/klijenti');
        $response->assertRedirect(); //status bi bio 302 sto znaci redirekcija

    }

    /** @test */
    public function klijentiCreateTest()
    {
        $user = Klijenti::make([
            'name' => 'Vladimir',
            'email' => 'Vladimir@xxx.com',
            'userID' => 1,
            ]);
        $this->assertTrue(true);
    }

    /** @test */
    public function klijentiDeleteTest()
    {
        $user = Klijenti::make([
            'name' => 'Vladimird',
            'email' => 'Vladimir@xfxx.com',
            'userID' => 1,
        ]);

        $user = Klijenti::first();
        if($user) {
            $user->delete();
        }
        $this->assertTrue(true);
    }






}
