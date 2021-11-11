@extends('layouts.app')

@section('title', 'Data Edit')

@section('content')
<div class="section">
    <div class="section-header">
        <h4>Edit Data {{$data->name}}</h4>
    </div>
    @include('flash::message')
    <div class="section-body">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('datas.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('app.datas._form')
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
