<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class TrashLogsController extends Controller
{
    public function LogSampah()
    {
        Paginator::useBootstrap();

        $logs = DB::table('log_pengambilan_sampah')
                                    ->join('lokasi','lokasi.id_tempat_sampah','=','log_pengambilan_sampah.id_tempat_sampah')
                                    ->orderByRaw('waktu_penuh DESC')
                                    ->paginate(25);

        return view('LogSampah',['logs'=>$logs]);
    }

}
