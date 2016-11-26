<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Biodata;

class BiodataController extends Controller
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
        $biodata = new Biodata;
        $biodata->nama = $request->input('nama');
        $biodata->kewarganegaraan = $request->input('kewarganegaraan');
        $biodata->npwp = $requets->input('npwp');
        $biodata->alamat = $request->input('alamat');
        $biodata->email = $request->input('email');
        $biodata->no_hp = $request->input('no_hp');
        $biodata->telepon_fax = $request->input('telepon_fax');
        $biodata->username = $request->input('username');
        $biodata->password = Hash::make($request->input('password'));
        $biodata->api_token = str_random(60);

        $biodata->save();

        Session::flash('messageSuccess', 'Pendaftaran berhasil');
        return redirect('/');
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
