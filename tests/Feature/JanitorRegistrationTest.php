<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Administrator;
use App\Models\KendaraanPengangkutSampah;
use App\Models\PetugasKebersihan;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JanitorRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;
   
    /** @test */
    
   public function janitor_registration_page_can_be_rendered_when_authenticated()
   {
       $admin = Administrator::first();
       $response = $this->actingAs($admin)->get(route('registration'));
       $response->assertStatus(200);
   }

   /** @test */ 
   public function janitor_registration_page_cannot_be_rendered_when_not_authenticated()
   {   
       $response = $this ->get(route('registration'));
       $this->assertGuest();
       $response->assertRedirect(route('login'));
   }
   
   /** @test */ 
   public function all_data_can_be_inserted_to_database()
   {
       $this->withoutExceptionHandling();
       $admin = Administrator::first();
       $truk =  KendaraanPengangkutSampah::first();
       $response = $this->actingAs($admin)->post('/registration',[
       "id_truk"=>$truk->id,
       "nama"=>"Testing",
       "jenis_kelamin"=>"Pria",
       "alamat"=>"Alamat tester",
       "no_telp"=>"082118217660",
       "username_petugas"=>"usertest4",
       "password_petugas"=>"passtest4",
       ]);
       $response->assertRedirect(route('registration'));
   }

    /** @test */ 
   public function all_data_inserted_are_null()
   {
    $this->withoutExceptionHandling();
    $admin = Administrator::first();
    $this->actingAs($admin)->get(route('registration'));
    $response = $this->actingAs($admin)->post('/registration',[
    "id_truk"=>null,
    "nama"=>"",
    "jenis_kelamin"=>null,
    "alamat"=>"",
    "no_telp"=>"",
    "username_petugas"=>"",
    "password_petugas"=>"",
    ]);
    $response->assertSessionHasErrors([
        'id_truk'     => 'truk wajib dipilih',
        'nama'     => 'nama wajib diisi',
        'jenis_kelamin'     => 'jenis kelamin wajib dipilih',
        'alamat'     => 'Alamat wajib diisi',
        'no_telp'     => 'Nomor Telepon wajib diisi',
        'username_petugas'     => 'Username wajib diisi',
        'password_petugas'     => 'Password wajib diisi',
    ]);
    $response->assertRedirect('/registration');
   }
   
   /** @test */ 
   public function username_petugas_isnt_unique_and_password_petugas_lack_of_char()
   {
    $this->withoutExceptionHandling();
    $admin = Administrator::first();
    $truk =  KendaraanPengangkutSampah::first();
    $petugas = PetugasKebersihan::first(); 
    $this->actingAs($admin)->get(route('registration'));
    $response = $this->actingAs($admin)->post('/registration',[
    "id_truk"=>$truk->id,
    "nama"=>"name tester",
    "jenis_kelamin"=>"Wanita",
    "alamat"=>"alamat tester",
    "no_telp"=>"082118217660",
    "username_petugas"=>$petugas->username_petugas,
    "password_petugas"=>"123",
    ]);
    $response->assertSessionHasErrors([
        'username_petugas'     => 'Username tersebut telah digunakan',
        'password_petugas'     => 'Password minimal 4 karakter',
    ]);
    $response->assertRedirect('/registration');
   }
   
   /** @test */ 
   public function no_telp_validation()
   {
    $this->withoutExceptionHandling();
    $admin = Administrator::first();
    $truk =  KendaraanPengangkutSampah::first();
    $this->actingAs($admin)->get(route('registration'));
    $response = $this->actingAs($admin)->post('/registration',[
    "id_truk"=>$truk->id,
    "nama"=>"name tester",
    "jenis_kelamin"=>"Wanita",
    "alamat"=>"alamat tester",
    "no_telp"=>"testing",
    "username_petugas"=>"usertest5",
    "password_petugas"=>"passtest5",
    ]);
    $response->assertSessionHasErrors([
       'no_telp'     => 'Nomor Telepon min 11 digit(Angka) dan maks 13 digit(Angka)',
    ]);
    $response->assertRedirect('/registration');
   }
}
