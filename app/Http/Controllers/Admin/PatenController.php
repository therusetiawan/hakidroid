<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paten;

class PatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patens = DB::table('paten')
                    ->select('paten.*', 'biodata.nama')
                    ->join('biodata', 'paten.biodata_id', '=', 'biodata.id')
                    ->get();

        return view('admin.paten.index')
                ->with('patens', $patens);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paten = DB::table('paten')
                    ->join('biodata', 'paten.biodata_id', '=', 'biodata.id')
                    ->select('paten.*', 'biodata.nama', 'biodata.alamat', 'biodata.kewarganegaraan', 'biodata.npwp', 'biodata.no_hp')
                    ->where('paten.id', $id)
                    ->first();

        return view('admin.paten.detail')
                    ->with('paten', $paten);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);

        return view('admin.mapel.edit')
                ->with('mapel', $mapel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mapel::destroy($id);

        return redirect()->route('admin.mapel.index')
                ->with('successMessage', 'Berhasil Menghapus Data'); 
    }
}
