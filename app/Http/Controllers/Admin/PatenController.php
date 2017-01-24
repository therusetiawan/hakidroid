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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Mapel::find($id);
        $data->update($input);

        return redirect()->route('admin.mapel.index')
            ->with('successMessage', 'Berhasil Mengedit Data'); 
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
