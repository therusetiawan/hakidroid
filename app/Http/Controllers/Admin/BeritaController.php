<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Berita;
use File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::all();

        return view('admin.berita.index')
                ->with('beritas', $beritas);
    }


    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $path = public_path('berita/');

        $file = $request->file('foto');
        $file->move($path, $file->getClientOriginalName());
        $input['foto'] = $file->getClientOriginalName();
        
        Berita::create($input);

        return redirect()->route('admin.berita.index')
            ->with('successMessage', 'Berhasil Menambahkan Data Baru'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit')
                ->with('berita', $berita);
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

        $input['foto'] = $request->input('foto_lama');

        if($request->hasFile('foto')){
            $path = public_path('berita/');

            $file = $request->file('foto');
            $file->move($path, $file->getClientOriginalName());
            $input['foto'] = $file->getClientOriginalName();
        }

        $data = Berita::find($id);
        $data->update($input);

        return redirect()->route('admin.berita.index')
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
        Berita::destroy($id);

        return redirect()->route('admin.berita.index'); 
    }
}
