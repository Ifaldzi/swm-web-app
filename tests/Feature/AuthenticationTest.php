<?php

namespace Tests\Feature;

use App\Models\Administrator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    /** @test */
    public function login_page_can_be_rendered()
    {
        $this->withExceptionHandling();
        $response = $this->get(route('login'))->assertStatus(200);
    }

    /** @test */
    public function admin_can_login_using_correct_account()
    {
        $this->withExceptionHandling();
        $admin = Administrator::first();
        $response = $this->post('/login',[
            "username"=>$admin->username,
            "password"=>'admin'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));

    }

    /** @test */
    public function admin_cannot_login_using_incorrect_account()
    {
        $this->withExceptionHandling();
        $admin = Administrator::first();
        $response = $this->post('/login',[
            "username"=>$admin->username,
            "password"=>"wrong password"
        ]);

        $this->assertGuest();
    }

    /** @test */
    public function admin_cannot_go_to_login_page_after_authenticated()
    {
        $admin = Administrator::first();
        $response = $this->actingAs($admin)->get(route('login'));

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function admin_can_logout_when_authenticated()
    {
        $this->withExceptionHandling();
        $admin = Administrator::first();
        $response = $this->actingAs($admin)->post(route('logout'));
        $response->assertRedirect(route('home'));
        $this->assertGuest();
    }

    /** @test */
    public function admin_cannot_logout_when_not_authenticated()
    {
        $response = $this->post(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

}

