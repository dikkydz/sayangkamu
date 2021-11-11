@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Statistik</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-body text-center">
                                        <span>Mobil</span>
                                        <h1>{{ $totalMobil }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-info">
                                    <div class="card-body text-center">
                                        <span>Motor</span>
                                        <h1>{{ $totalMotor }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Data</h4>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{ route('dashboard') }}" method="get">
                                <input type="hidden" name="filter" value="weeks">
                                <input type="submit" value="Minggu" class="btn btn-secondary {{Request::query('filter') === 'weeks' || Request::input('filter') === null ? 'btn-info' : ''}}">
                            </form>
                            <form action="{{ route('dashboard') }}" method="get">
                                <input type="hidden" name="filter" value="months">
                                <input type="submit" value="Bulan" class="btn btn-secondary {{Request::query('filter') === 'months' ? 'btn-info' : ''}}">
                            </form>
                            <form action="{{ route('dashboard') }}" method="get">
                                <input type="hidden" name="filter" value="years">
                                <input type="submit" value="Tahun" class="btn btn-secondary {{Request::query('filter') === 'years' ? 'btn-info' : ''}}">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Diagram PKB & BBNKB</h4>
                    </div>
                    <div class="card-body">
                        {!! $dataTypeChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
{!! $dataTypeChart->script() !!}
@endpush
