<?php

namespace App\Http\Controllers;

use App\Models\TempatSampah;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAllBinsData()
    {
        $bins = TempatSampah::all();
        $data = collect();
        foreach($bins as $bin)
        {
            $response = $bin->calculateVolume();
            $data->push([
                'id' => $bin->id,
                'longitude' => $bin->lokasi->longitude,
                'latitude' => $bin->lokasi->latitude,
                'volume' => $response
            ]);
        }
        return response()->json($data);
    }

    public function getAllBinsLocation()
    {
        $bins = TempatSampah::all();
        $data = collect();
        foreach($bins as $bin)
        {
            $data->push([
                'id' => $bin->id,
                'location' => $bin->lokasi,
            ]);
        }

        return response()->json($data);
    }
}
