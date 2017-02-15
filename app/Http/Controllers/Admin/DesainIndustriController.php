<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DesainIndustri;

class DesainIndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desainindustris = DB::table('desain_industri')
                    ->select('desain_industri.*', 'biodata.nama')
                    ->join('biodata', 'desain_industri.biodata_id', '=', 'biodata.id')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.desainindustri.index')
                ->with('desainindustris', $desainindustris);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desainindustri = DesainIndustri::with('biodata')
                                ->with('uraian')
                                ->with('gambar_foto')
                                ->with('kelas_desain_industri')
                                ->with('pendesain')
                                ->where('id', $id)->firstOrFail();

        return view('admin.desainindustri.detail')
                    ->with('desainindustri', $desainindustri);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input['status'] = '1';
        $data = DesainIndustri::find($id);
        $data->update($input);

        return redirect()->route('admin.desainindustri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DesainIndustri::destroy($id);

        return redirect()->route('admin.desainindustri.index'); 
    }
}
