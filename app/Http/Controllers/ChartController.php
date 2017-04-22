<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Charts;

class ChartController extends Controller
{
    public function index()
    {
        $chart1 = Charts::database(Expense::all(), 'bar', 'highcharts')
            ->title("Biểu đồ thống kê 2017")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByMonth('2017', true);

        $chart2 = Charts::database(Expense::all(), 'bar', 'highcharts')
            ->title("Biểu đồ thống kê 2016")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByMonth('2016', true);

        return view('chart.index', [
            'chart1' => $chart1, 
            'chart2' => $chart2
        ]);
    }
}
