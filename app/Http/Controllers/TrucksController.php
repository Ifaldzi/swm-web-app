<?php

namespace App\Http\Controllers;

use App\Models\KendaraanPengangkutSampah;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class TrucksController extends Controller
{
    /**
     * Display a monitoring of the truck.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator:: useBootstrap();
        $trucks = KendaraanPengangkutSampah::paginate(3);
        return view('monitoring/truk',['trucks'=>$trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitoring/addTruk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules=[
            'device_name' => 'required|max:55|unique:kendaraan_pengangkut_sampah',
            'kapasitas_pengangkut_sampah' => 'required|numeric',

        ];

        //custom validation error messages.
        $messages = [
            'device_name.required'     => 'Nama truk wajib diisi',
            'device_name.unique'       => 'Nama truk tersebut sudah digunakan',
            'kapasitas_pengangkut_sampah.required'     => 'Kapasitas truk wajib diisi',
            'kapasitas_pengangkut_sampah.numeric'     => 'Kapasitas truk hanya bisa diisi nilai numerik',
        ];
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput($request->all());
        }
        KendaraanPengangkutSampah::create($request->all());
        return redirect()
                ->intended(route('monitoring-truk'))
                ->with('status','Truk Baru Berhasil Ditambahkan!');
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
