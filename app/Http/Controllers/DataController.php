<?php

namespace App\Http\Controllers;

use App\Data;
use App\DataTables\DataDataTable;
use App\Exports\DatasExport;
use App\Http\Requests\DataRequest;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataDataTable $dataTable)
    {
        return $dataTable->render('app.datas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.datas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'registration_number' => 'required',
            'author' => 'required',
            'address' => 'required',
            'model' => 'required',
            'type' => 'required',
            'production_year' => 'required',
            'silinder' => 'required',
            'chassis_number' => 'required',
            'engine_number' => 'required',
            'bpkb_number' => 'required',
            'service_type' => 'required',
            'photo' => 'required'
        ]);

        $data = new Data($request->all());
        if ($request->has('photo')) {
            $data->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        if ($data->save()) {
            flash()->success('Berhasil menambahkan data');
        } else {
            flash()->error('Gagal menambahkan data');
        }

        return redirect()->route('datas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        return view('app.datas.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        return view('app.datas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        $this->validate($request, [
            'registration_number' => 'required',
            'author' => 'required',
            'address' => 'required',
            'model' => 'required',
            'type' => 'required',
            'production_year' => 'required',
            'silinder' => 'required',
            'chassis_number' => 'required',
            'engine_number' => 'required',
            'bpkb_number' => 'required',
            'service_type' => 'required',
            'photo' => 'required',
        ]);

        $data->fill($request->all());

        if ($request->has('photo')) {
            $data->clearMediaCollection('photo');
            $data->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        if ($data->update()) {
            flash()->success('Berhasil update data');
        } else {
            flash()->error('Gagal update data');
        }

        return redirect()->route('datas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        if ($data->delete()) {
            flash()->success('Berhasil hapus data');
        } else {
            flash()->error('Gagal hapus data');
        }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new DatasExport(Data::all()), 'data.xlsx');
    }
}
