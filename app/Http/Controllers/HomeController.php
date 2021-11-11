<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use App\Data;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Chart\GridLines;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Weekly
        $today_datas = Data::whereDate('created_at', today())->count();
        $yesterday_datas = Data::whereDate('created_at', today()->subDays(1))->count();
        $datas_2_days_ago = Data::whereDate('created_at', today()->subDays(2))->count();

        $datas = Data::all();

        $temp = collect([]);
        $tempLabel = collect([]);

        for ($i=6; $i >= 0; $i--) { 
            $temp->push(Data::whereDate('created_at', today()->subDays($i))->count());
            $tempLabel->push(today()->subDays($i)->toDateString());
        }
        $chart = new DataChart;
        $chart->labels($tempLabel);
        $chart->options([
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'stepSize' => 1
                        ],
                    ],
                ],
            ],
        ]);

        $dataset = $chart->dataset('Data terinput', 'bar', $temp);
        $dataset->backgroundColor(collect(['#1abc9c', '#2ecc71', '#3498db', '#9b59b6', '#34495e', '#f1c40f', '#e67e22']));

        // BBNKB / PKB Chart
        $bbnkb = Data::where('service_type', 'BBNKB')->count();
        $pkb = Data::where('service_type', 'PKB')->count();

        $dataTypeChart = new DataChart;
        $dataTypeChart->labels(['BBNKB', 'PKB']);
        $dataTypeChart->minimalist(true);
        $dataTypeDataset = $dataTypeChart->dataset('data', 'pie', [$bbnkb, $pkb]);
        $dataTypeDataset->backgroundColor(collect(['#2980b9', '#8e44ad']));

        $totalMobil = Data::where('type', 'Mobil')->count();
        $totalMotor = Data::where('type', 'Sepeda Motor')->count();



        return view('app/dashboard', compact('chart', 'dataTypeChart', 'totalMobil', 'totalMotor'));
    }
}
