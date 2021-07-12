<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LogPengambilanSampah;

class SampleChart extends BaseChart
{
    public ?string $name = 'my_chart';

    public ?string $routeName = 'my_chart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $month=$request->month;
        $binName =(int) $request->binName;

        $bins = DB::table('log_pengambilan_sampah')
                ->join('tempat_sampah', 'log_pengambilan_sampah.id', '=', 'tempat_sampah.id')
                ->select( 'device_name')
                ->get();
        $name = [];
        foreach ($bins as $bin){
            array_push($name,$bin->device_name);
        }

        switch ($binName) {
            case 1:
                $bn = $name[0];
                break;
            case 2:
                $bn = $name[1];
                break;
            case 3:
                $bn = $name[2];
                break;

            default:
                # code...
                break;
        }
        $values = DB::table('log_pengambilan_sampah')
        ->select(DB::raw('DATE(waktu_penuh) as date',), DB::raw('count(*) as frecuency'))
        ->where('id_tempat_sampah','=',$binName)
        ->whereBetween('waktu_penuh',[date("2021-".$month."-01"),date("2021-".$month."-31")])
        ->groupBy('date')
        ->get();

        $date = [];
        $frecuency = [];
        foreach ($values as $val) {
            array_push($date,$val->date);
            array_push($frecuency,$val->frecuency);

        }
        return Chartisan::build()
            ->labels($date)
            ->dataset($bn, $frecuency);
    }


}
