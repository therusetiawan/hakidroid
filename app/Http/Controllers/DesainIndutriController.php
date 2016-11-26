<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesainIndustri;

class DesainIndutriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desainIndustri = new DesainIndustri;
        $desainIndustri->tanggal_permohonan = Carbon::now();
        $desainIndustri->tanggal_penerimaan = Carbon::now();
        $desainIndustri->nomor_permohonan = '';
        $desainIndustri->biodata_id = auth()->user()->id;
        $desainIndustri->konsultan_hki = $request->input('konsultan_hki');

        if($request->input('konsultan_hki')){
            $desainIndustri->konsultan_hki_id = $request->input('konsultan_hki_id');
        }else{
            $desainIndustri->konsultan_hki_id = 1;
        }

        $desainIndustri->judul_desain_industri = $request->input('judul_desain_industri');
        $desainIndustri->hak_prioritas = $request->input('hak_prioritas');

        if($request->input('hak_prioritas')){
            $desainIndustri->negara = $request->input('negara');
            $desainIndustri->tanggal_penerimaan_permohonan_pertama_kali = $request->input('tanggal_penerimaan_permohonan_pertama_kali');
            $desainIndustri->nomor_prioritas = $request->input('nomor_prioritas');
        }

        if($request->hasFile('lampiran_surat_kuasa')){
            $path = storage_path().'/app/desian_industri/surat_kuasa';
            $file = $request->file('lampiran_surat_kuasa');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Kuasa_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($destination, $fileName);
        }

        //rev
        $desainIndustri->kelas_desain_industri = '';
        $desainIndustri->uraian_desain_industri = '';

        $desainIndustri->save();

        Session::flash('messageSuccess', 'Pengusulan desain industri berhasil');

        return redirect('/pengajuanindustri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
