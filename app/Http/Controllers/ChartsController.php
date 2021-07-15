<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Administrator;
use App\Models\LogPengambilanSampah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;
use Illuminate\Support\Facades\Hash;

class ChartsController extends Controller
{
    public function index(Request $request)
    {
        $admins = Administrator::first();
        $admin = [];
        foreach ($admins as $key) {
            array_push($admin,$key);

        }
        $item=[];
        $values = DB::table('log_pengambilan_sampah')
        ->select(DB::raw('DATE(waktu_penuh) as date',), DB::raw('count(*) as frecuency'))
        ->where('id_tempat_sampah','=',1)
        ->whereBetween('waktu_penuh',[date("2021-07-01"),date("2021-07-31")])
        ->groupBy('date')
        ->get();

        $date = [];
        $frecuency = [];
        $res[] = ['date', 'frecuency'];
        foreach ($values as $key => $val) {
            $res[++$key] = [$val->date, $val->frecuency];
            array_push($date,$val->date);
            array_push($frecuency,$val->frecuency);
            // $date = $val->date;
            // $frecuency = $val->frecuency;
        }

        $artikel = [
            [
                "judul"=>"fuck this shit",
                "penulis"=>"anonim",
                "harga"=>20000,
            ],
            [
                "judul"=>"sadasd",
                "penulis"=>"sadasd",
                "harga"=>120000,
            ],
        ];
    // return dump($artikel);
    $pw = Hash::make('admin2');
    return dd($pw);
    }
    public function handleChart()
    {
        $userData = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('waktu_penuh', date('Y-M-D'))
                    ->groupBy(DB::raw("id_tempat_sampah"))
                    ->pluck('count');

        $count=[];
        foreach ($userData as $item) {
            array_push($count,$item);
        }
    //get device name of bins
    $logs = DB::table('log_pengambilan_sampah')
            ->join('tempat_sampah', 'log_pengambilan_sampah.id', '=', 'tempat_sampah.id')
            ->select( 'device_name')
            ->get();


        $values = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"))
            ->whereBetween('waktu_penuh',[date("2021-09-22"),date("2021-09-31")])
            ->groupBy(DB::raw("id_tempat_sampah"))
            ->pluck('count');;
        // $userData=LogPengambilanSampah::all();
        foreach ($values as $item) {
            array_push($value,$item);
        }
        if(empty($value))
        {
            // return "kosong";
            $value=[0,0,0];
        }

        $values = LogPengambilanSampah::select(DB::raw("COUNT(*) as data"))
                -> groupBy(DB::raw("id_tempat_sampah"))
                ->get();
        return $values;
        return view('Chart', compact('userData'));
    }
}
