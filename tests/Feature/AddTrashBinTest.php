<?php

namespace Tests\Feature;

use App\Models\Administrator;
use App\Models\KendaraanPengangkutSampah;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddTrashBinTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = Administrator::first();
        $this->truck = KendaraanPengangkutSampah::first();
    }

    /** @test */
    public function add_trash_bin_page_not_rendered_when_not_authenticated()
    {
        $response = $this
                    ->get('/monitoring-sampah/addTempatSampah')
                    ->assertStatus(302);
        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    /** @test */
    public function add_trash_bin_page_rendered_when_authenticated()
    {
        $response = $this
                    ->actingAs($this->admin)
                    ->get('monitoring-sampah/addTempatSampah');
        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    /** @test */
    public function add_trash_bin_with_all_field_empty()
    {
        $this->actingAs($this->admin)->get(route('addTempatSampah'));
        $response = $this->actingAs($this->admin)->post(route('addTempatSampah'),[]);
        $response->assertRedirect(route('addTempatSampah'));
        $response->assertSessionHasErrors([
            'id_truk' => 'ID truk wajib diisi',
            'nama_tempat_sampah' => 'Nama tempat sampah wajib diisi',
            'volume_tempat_sampah' => 'Volume tempat sampah wajib diisi',
            'tinggi_tempat_sampah' => 'Tinggi tempat sampah wajib diisi',
            'alamat' => 'Alamat wajib diisi',
            'longitude' => 'Longitude wajib diisi',
            'latitude' => 'Latitdue wajib diisi'
        ]);
    }

    /** @test */
    public function add_trash_bin_with_all_numeric_fields_filled_by_non_numeric()
    {
        $this->actingAs($this->admin)->get(route('addTempatSampah'));
        $response = $this->actingAs($this->admin)->post(route('addTempatSampah'), [
            "id_truk" => $this->truck->id,
            "nama_tempat_sampah" => "test",
            "volume_tempat_sampah" => "abc",
            "tinggi_tempat_sampah" => "def",
            'alamat' => "t",
            'longitude' => "klm",
            'latitude' => "hij",
        ]);

        $response->assertRedirect(route('addTempatSampah'));
        $response->assertSessionHasErrors([
            'volume_tempat_sampah' => 'Volume tempat sampah harus dalam numerik',
            'tinggi_tempat_sampah' =>  'Tinggi tempat sampah harus dalam numerik',
            'longitude' => 'Longitude harus dalam numerik',
            'latitude' => 'Latitude harus dalam numerik'
        ]);
    }

    /** @test */
    public function add_trash_bin_with_not_unique_device_name()
    {
        $this->actingAs($this->admin)->get(route('addTempatSampah'));
        $response = $this->actingAs($this->admin)->post(route('addTempatSampah'), [
            "id_truk" => $this->truck->id,
            "nama_tempat_sampah" => "Trash-Bin-1",
            "volume_tempat_sampah" => 1,
            "tinggi_tempat_sampah" => 32,
            'alamat' => "t",
            'longitude' => 109.232,
            'latitude' => -6.323,
        ]);

        $response->assertRedirect(route('addTempatSampah'));
        $response->assertSessionHasErrors([
            'nama_tempat_sampah' => 'Nama tempat sampah sudah ada'
        ]);
    }

    /** @test */
    public function add_trash_bin_with_all_field_filled()
    {
        $truck = KendaraanPengangkutSampah::first();
        $response = $this
                    ->actingAs($this->admin)
                    ->post(route('addTempatSampah'), [
                        "id_truk" => $truck->id,
                        "nama_tempat_sampah" => "test",
                        "volume_tempat_sampah" => 1,
                        "tinggi_tempat_sampah" => 32,
                        'alamat' => "t",
                        'longitude' => 109.232,
                        'latitude' => -6.323,
        ]);

        $response->assertRedirect(route('monitoring-sampah'));
        $this->assertDatabaseHas('tempat_sampah', [
            "id_truk" => $truck->id,
            "device_name" => "test",
            "volume_tempat_sampah" => 1,
            "tinggi_tempat_sampah" => 32,
        ]);
    }
}
