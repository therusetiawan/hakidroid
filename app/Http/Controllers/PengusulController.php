<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Biodata;
use App\DesainIndustri;

use Auth;
use Hash;
use Session;
use Carbon\Carbon;

class PengusulController extends Controller
{
	public function __construct(){
		$sites = array('getIndex', 'getLogin', 'postLogin');
		$this->middleware('auth:pengusul', ['except' => $sites]);
	}

    public function getIndex(){
    	return view('user.index');
    }

    public function getLogin(){
    	return view('layouts.loginlayout');

    }

    public function postLogin(Request $request){
    	$auth = auth('pengusul');

        $credential = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );

        if($auth->attempt($credential)){
            Session::flash('loginSuccess', 'Login berhasil');
            return redirect(Route('pengusul_beranda'));
        }else{
            Session::flash('loginFailed', 'Login Gagal');
            return redirect(Route('pengusul_login'));
        }
    	return redirect(Route('pengusul_login'));
    }

    public function getBeranda(){
    	return view('user.beranda');
    }

    public function getPengajuanDesainIndustri(){
    	return view('user.pengajuandesainindustri');
    }

    public function postPengajuanDesainIndustri(Request $request){
        $desainIndustri = new DesainIndustri;
        $desainIndustri->tanggal_permohonan = Carbon::now();
        $desainIndustri->tanggal_penerimaan = Carbon::now();
        $desainIndustri->nomor_permohonan = '';
        $desainIndustri->biodata_id = auth('pengusul')->user()->id;

        $check_konsultan_hki = false;
        if($request->input('konsultan_hki') == 'on'){
            $check_konsultan_hki = true;
        }

        $desainIndustri->konsultan_hki = $check_konsultan_hki;

        if($check_konsultan_hki){
            $desainIndustri->konsultan_hki_id = $request->input('konsultan_hki_id');
        }else{
            $desainIndustri->konsultan_hki_id = 1;
        }

        $desainIndustri->judul_desain_industri = $request->input('judul_desain_industri');

        $check_hak_prioritas = false;
        if($request->input('hak_prioritas') == 'on'){
            $check_hak_prioritas = true;
        }

        $desainIndustri->hak_prioritas = $check_hak_prioritas;

        if($check_hak_prioritas){
            $desainIndustri->negara = $request->input('negara');
            $desainIndustri->tanggal_penerimaan_permohonan_pertama_kali = $request->input('tanggal_permohonan_pertama_kali');
            $desainIndustri->nomor_prioritas = $request->input('nomor_prioritas');
        }

        if($request->hasFile('lampiran_surat_kuasa')){
            $path = storage_path().'/app/desian_industri/surat_kuasa';
            $file = $request->file('lampiran_surat_kuasa');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Kuasa_'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_surat_kuasa = $fileName;
        }

        if($request->hasFile('lampiran_surat_pernyataan_pengalihan_hak')){
            $path = storage_path().'/app/desian_industri/surat_pernyataan_pengalihan_hak';
            $file = $request->file('lampiran_surat_pernyataan_pengalihan_hak');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Pernyataan_Pengalihan_Hak_'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_pemilikan_hak')){
            $path = storage_path().'/app/desian_industri/bukti_pemilikan_hak';
            $file = $request->file('lampiran_bukti_pemilikan_hak');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Pemilikan_Hak'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_bukti_pemilikan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_prioritas_dan_terjemahan')){
            $path = storage_path().'/app/desian_industri/bukti_prioritas_dan_terjemahan';
            $file = $request->file('lampiran_bukti_prioritas_dan_terjemahan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Prioritas_dan_Terjemahan'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan = $fileName;
        }

        if($request->hasFile('lampiran_dokumen_desain_industri')){
            $path = storage_path().'/app/desian_industri/dokumen_desain_industri';
            $file = $request->file('lampiran_dokumen_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Dokumen_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_dokumen_desain_industri = $fileName;
        }

        if($request->hasFile('gambar_desain_industri')){
            $path = storage_path().'/app/desian_industri/gambar_desain_indsturi';
            $file = $request->file('gambar_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Gambar_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->gambar_desain_industri = $fileName;
        }

        if($request->hasFile('uraian_desain_industri')){
            $path = storage_path().'/app/desian_industri/uraian_desain_industri';
            $file = $request->file('uraian_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Gambar_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->uraian_desain_industri = $fileName;
        }

        if($request->hasFile('contoh_fisik')){
            $path = storage_path().'/app/desian_industri/contoh_fisik';
            $file = $request->file('contoh_fisik');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Contoh_Fisik'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->contoh_fisik = $fileName;
        }

        $desainIndustri->kelas_desain_industri = $request->input('kelas_desain_industri');

        $desainIndustri->save();

        Session::flash('messageSuccess', 'Pengusulan desain industri berhasil');

        return redirect(Route('pengusul_desain_industri_pengajuan'));
    }
}
