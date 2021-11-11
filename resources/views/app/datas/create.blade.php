@extends('layouts.app')

@section('title', 'Create new data')

@section('content')
<div class="section">
    <div class="section-header">
        <h4>Create new data</h4>
    </div>
    @include('flash::message')
    <div class="section-body">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('datas.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('app.datas._form')
                            <div class="form-group">
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
