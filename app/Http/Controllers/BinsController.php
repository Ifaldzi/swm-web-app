<?php

namespace App\Http\Controllers;

use App\Models\KendaraanPengangkutSampah;
use App\Models\Lokasi;
use App\Models\TempatSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BinsController extends Controller
{
    /**
     * Display a monitoring of the bins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bins = TempatSampah::all();
        return view('monitoring.sampah', compact('bins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = KendaraanPengangkutSampah::all();
        return view('monitoring.addTempatSampah', compact('trucks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id_truk' => 'required',
            'nama_tempat_sampah' => 'required|unique:tempat_sampah,device_name',
            'volume_tempat_sampah' => 'required|numeric',
            'tinggi_tempat_sampah' => 'required|numeric',
            'alamat' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ];

        $messages = [
            'id_truk.required' => 'ID truk wajib diisi',
            'nama_tempat_sampah.required' => 'Nama tempat sampah wajib diisi',
            'nama_tempat_sampah.unique' => 'Nama tempat sampah sudah ada',
            'volume_tempat_sampah.required' => 'Volume tempat sampah wajib diisi',
            'tinggi_tempat_sampah.required' => 'Tinggi tempat sampah wajib diisi',
            'volume_tempat_sampah.numeric' => 'Volume tempat sampah harus dalam numerik',
            'tinggi_tempat_sampah.numeric' => 'Tinggi tempat sampah harus dalam numerik',
            'alamat.required' => 'Alamat wajib diisi',
            'longitude.required' => 'Longitude wajib diisi',
            'latitude.required' => 'Latitdue wajib diisi',
            'longitude.numeric' => 'Longitude harus dalam numerik',
            'latitude.numeric' => 'Latitude harus dalam numerik',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $administratorId = Auth::id();

        $newBin = TempatSampah::create([
            'id_truk' => $request->id_truk,
            'id_administrator' => $administratorId,
            'volume_tempat_sampah' => $request->volume_tempat_sampah,
            'tinggi_tempat_sampah' => $request->tinggi_tempat_sampah,
            'device_name' => $request->nama_tempat_sampah,
        ]);

        Lokasi::insert([
            'alamat' => $request->alamat,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'id_tempat_sampah' => $newBin->id,
        ]);

        return redirect()->route('monitoring-sampah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
