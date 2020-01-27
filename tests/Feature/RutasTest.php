<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

use App\User;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testComprobandoRutasTest()
    {
        // Existencia Basica Principal
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Test Laravel in');
    }

    public function testCheckRutaLogin()
    {
        /*
            Cuando envío una solicitud GET a la ruta login, 
            entonces debería devolver la vista auth.login.
        */
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function testCheckRutaRegister()
    {
        /*
            Cuando envío una solicitud GET a la ruta register, 
            entonces debería devolver la vista auth.register.
        */
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function testRegistroAndRedirectToHome()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('home'));
        $response->assertStatus(200);
    }
}
