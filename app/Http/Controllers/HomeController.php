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

        $datas = Data::all();

        $temp = collect([]);
        $tempLabel = collect([]);

        // weekly
        if ($request->filter === 'weeks' || !$request->has('filter')) {
            for ($i = 6; $i >= 0; $i--) {
                $temp->push(Data::whereDate('created_at', today()->subDays($i))->count());
                $tempLabel->push(today()->subDays($i)->toDateString());
            }
        }

        // monthly
        if ($request->filter === 'months') {
            for ($i = 6; $i >= 0; $i--) {
                $temp->push(Data::whereDate('created_at', today()->subMonth($i))->count());
                $tempLabel->push(today()->subMonth($i)->format('M Y'));
            }
        }

        // yearly
        if ($request->filter === 'years') {
            for ($i = 6; $i >= 0; $i--) {
                $temp->push(Data::whereDate('created_at', today()->subYear($i))->count());
                $tempLabel->push(today()->subYear($i)->format('Y'));
            }
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
