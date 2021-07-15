<?php

namespace Tests\Feature;

use App\Models\Administrator;
use App\Models\KendaraanPengangkutSampah;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddTrucksTest extends TestCase
{
    use DatabaseTransactions;
   /** @test */
    public function add_truck_page_cannot_be_rendered_when_not_authenticated()
    {
        $response = $this->get(route('addTruk'))->assertStatus(302);
        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }

    /** @test */
    public function add_truck_page_can_be_rendered_when_authenticated()
    {
        $admin = Administrator::first();
        $response = $this->actingAs($admin)->get(route('addTruk'))->assertStatus(200);
        $this->assertAuthenticatedAs($admin);
    }

    /** @test */
    public function admin_can_create_new_truck()
    {
        $this->withoutExceptionHandling();
        $admin = Administrator::first();
        $response = $this->actingAs($admin)->post(route('addTruk'),[
            "device_name"=>"Telolet3",
            "kapasitas_pengangkut_sampah"=>10000.00
        ]);
        $response->assertRedirect(route('monitoring-truk'));
        $this->assertDatabaseHas('kendaraan_pengangkut_sampah', [
            'device_name' => 'Telolet3',
        ]);
    }

    /** @test */
    public function admin_cannot_create_new_truck_when_field_is_not_filled()
    {
        $this->withoutExceptionHandling();
        $admin = Administrator::first();
        $this->actingAs($admin)->get(route('addTruk'));
        $response = $this->actingAs($admin)->post(route('addTruk'),[
            "device_name"=>"",
            "kapasitas_pengangkut_sampah"=>null
        ]);
        $response->assertSessionHasErrors([
            "device_name" =>"Nama truk wajib diisi",
            "kapasitas_pengangkut_sampah" =>"Kapasitas truk wajib diisi"
        ]);
        $response->assertRedirect(route('addTruk'));
    }

    /** @test */
    public function admin_cannot_create_new_truck_when_the_device_name_has_already_exist()
    {
        $this->withoutExceptionHandling();
        $admin = Administrator::first();
        $truck = KendaraanPengangkutSampah::first();
        $this->actingAs($admin)->get(route('addTruk'));
        $response = $this->actingAs($admin)->post(route('addTruk'),[
            "device_name"=>$truck->device_name,
            "kapasitas_pengangkut_sampah"=>$truck->kapasitas_pengangkut_sampah
        ])->assertStatus(302);

        $response->assertSessionHasErrors([
            "device_name" =>"Nama truk tersebut sudah digunakan",
        ]);
    }
}
