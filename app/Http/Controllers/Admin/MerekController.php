<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Merek;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mereks = DB::table('merek')
                    ->select('merek.*', 'biodata.nama')
                    ->join('biodata', 'merek.biodata_id', '=', 'biodata.id')
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('admin.merek.index')
                ->with('mereks', $mereks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merek = Merek::with('biodata')
                        ->with('kelas_barang_jasa')
                        ->where('id', $id)->firstOrFail();

        return view('admin.merek.detail')
                    ->with('merek', $merek);
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
        $data = Merek::find($id);
        $data->update($input);

        return redirect()->route('admin.merek.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merek::destroy($id);

        return redirect()->route('admin.merek.index'); 
    }
}
