<?php

namespace Tests\Unit;

use App\Models\Administrator;
use App\Models\KendaraanPengangkutSampah;
use App\Models\TempatSampah;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AntaresGetDataTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function get_volume_from_existing_trash_bin()
    {
        $trashBin = TempatSampah::first();
        $value = $trashBin->calculateVolume();
        $this->assertEquals(200, $value['code']);
        $this->assertTrue($value['volume'] >= 0 || $value['volume'] <= 100);
    }

    /** @test */
    public function get_volume_from_non_exisiting_trash_bin_in_antares()
    {
        $truck = KendaraanPengangkutSampah::first();
        $admin = Administrator::first();
        $trashBin = TempatSampah::create([
            'id_truk' => $truck->id,
            'id_administrator' => $admin->id,
            'volume_tempat_sampah' => 2,
            'tinggi_tempat_sampah' => 50,
            'device_name' => 'not_exist_trash_bin',
        ]);
        $value = $trashBin->calculateVolume();
        $this->assertEquals('404', $value['code']);
        $this->assertEquals('ERROR[002] : Application Name or Device Name is Wrong', $value['status']);
    }
}
