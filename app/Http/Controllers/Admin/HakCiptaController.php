<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\HakCipta;

class HakCiptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hakciptas = DB::table('hak_cipta')
                    ->select('hak_cipta.*', 'biodata.nama')
                    ->join('biodata', 'hak_cipta.biodata_id', '=', 'biodata.id')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.hakcipta.index')
                ->with('hakciptas', $hakciptas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hakcipta = HakCipta::with('biodata')
                        ->with('jenis_hak_cipta')
                        ->where('id', $id)
                        ->firstOrFail();

        return view('admin.hakcipta.detail')
                    ->with('hakcipta', $hakcipta);
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
        $data = HakCipta::find($id);
        $data->update($input);

        return redirect()->route('admin.hakcipta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HakCipta::destroy($id);

        return redirect()->route('admin.hakcipta.index'); 
    }
}
