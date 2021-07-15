<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LogPengambilanSampah;

class SampleChart2 extends BaseChart
{
    public ?string $name = 'my_2ndchart';

    public ?string $routeName = 'my_2ndchart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $month=$request->month;

        $bins = DB::table('log_pengambilan_sampah')
        ->join('tempat_sampah', 'log_pengambilan_sampah.id', '=', 'tempat_sampah.id')
        ->get();


        $name = [];
        foreach ($bins as $bin){
            array_push($name, ["id" => $bin->id, 'name' => $bin->device_name]);
        }
        $labels = ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'];
        $week1 = [];
        $week2 = [];
        $week3 = [];
        $week4 = [];

        //get data untuk week1
        $values1 = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"), 'id_tempat_sampah')
                ->whereBetween('waktu_penuh',[date("2021-".$month."-1"),date("2021-".$month."-7")])
                ->groupBy(DB::raw("id_tempat_sampah"))
                ->get();

        if(count($values1) == 0)
        {
            $week1 = [0,0,0];
        }
        else
        {
            foreach ($name as $key => $value) {
                array_push($week1, $values1[$key] ? $values1[$key]->count : 0);
            }
        }

        //get data untuk week2
        $values2 = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"), 'id_tempat_sampah')
                ->whereBetween('waktu_penuh',[date("2021-".$month."-8"),date("2021-".$month."-14")])
                ->groupBy(DB::raw("id_tempat_sampah"))
                ->get();
        foreach ($name as $key => $value) {
            array_push($week2, isset($values2[$key]) ? $values2[$key]->count : 0);
        }
        if(empty($week2))
        {
            $week2 = [0,0,0];
        }

        //get data untuk week 3
        $values3 = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"), 'id_tempat_sampah')
                ->whereBetween('waktu_penuh',[date("2021-".$month."-15"),date("2021-".$month."-21")])
                ->groupBy(DB::raw("id_tempat_sampah"))
                ->get();
        foreach ($name as $key => $value) {
            array_push($week3, isset($values3[$key]) ? $values3[$key]->count : 0);
        }
        if(empty($week3))
        {
            $week3 = [0,0,0];
        }

        // get data untuk week 4
        $values4 = LogPengambilanSampah::select(DB::raw("COUNT(*) as count"), 'id_tempat_sampah')
                ->whereBetween('waktu_penuh',[date("2021-".$month."-22"),date("2021-".$month."-31")])
                ->groupBy(DB::raw("id_tempat_sampah"))
                ->get();
        foreach ($name as $key => $value) {
            array_push($week4, isset($values4[$key]) ? $values4[$key]->count : 0);
        }
        if(empty($week4))
        {
            $week4 = [0,0,0];
        }



        return Chartisan::build()
            ->labels($labels)
            ->dataset($name[0]['name'], [$week1[0],$week2[0],$week3[0],$week4[0]])
            ->dataset($name[1]['name'], [$week1[1],$week2[1],$week3[1],$week4[1]])
            ->dataset($name[2]['name'], [$week1[2],$week2[2],$week3[2],$week4[2]]);
    }
}
