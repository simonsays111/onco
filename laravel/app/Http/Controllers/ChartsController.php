<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class ChartsController extends Controller
{


    public function googleLineChart()
    {
        $visitorChartData = DB::table('patient_data')
            ->select(

                DB::raw("type as type"),
              DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("type")

            ->get();


        $result[] = ['type',' user_id'];
        foreach ($visitorChartData as $key => $value) {
            $result[++$key] = [ $value->type, $value->user_id];
        }


        return json_encode($result);

    }


    public function googleLineChart2()
    {
        $activeChartData = DB::table('patient_data')
            ->select(

                DB::raw("is_active as is_active"),
                DB::raw("COUNT(user_id) as user_id"))
            ->groupBy("is_active")

            ->get();


        $result[] = ['type',' user_id'];
        foreach ($activeChartData as $key => $value) {
            $result[++$key] = [ $value->is_active, $value->user_id];
        }


        return json_encode($result);
    }


}