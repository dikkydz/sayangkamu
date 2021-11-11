@extends('layouts.app')

@section('title', 'Datas')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Datas</h1>
    </div>

    <div class="section-body">
        @include('flash::message')
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <a href="{{ route('datas.export') }}" class="btn btn-info">Export to Excel</a>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Data</h4>
                        @can('add_datas')
                            <a href="{{ route('datas.create') }}" class="btn btn-success">Create new data</a>
                        @endcan
                    </div>
                    <div class="card-body p-1">
                        <div class="table-responsive">
                            {!! $dataTable->table(['class' => 'table table-striped']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('javascript')
    {!! $dataTable->scripts() !!}
@endpush
