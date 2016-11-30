<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Biodata;
use App\DesainIndustri;
use App\DesainIndustriGambarFoto;
use App\DesainIndustriPendesain;

use App\Paten;
use App\PatenHakPrioritas;
use App\PatenInventor;
use App\PatenDokumenLain;

use Auth;
use Hash;
use Session;
use Carbon\Carbon;

class PengusulController extends Controller
{
	public function __construct(){
		$sites = array('getIndex', 'getLogin', 'postLogin', 'getRegister', 'postRegister');
		$this->middleware('auth:pengusul', ['except' => $sites]);
	}

    public function getIndex(){
    	return view('user.index');
    }

    public function getRegister(){
        return view('layouts.registerlayout');
    }

    public function postRegister(Request $request){
        $biodata = new Biodata;
        $biodata->nama = $request->input('nama');
        $biodata->kewarganegaraan = $request->input('kewarganegaraan');
        $biodata->npwp = $request->input('npwp');
        $biodata->alamat = $request->input('alamat');
        $biodata->email = $request->input('email');
        $biodata->no_hp = $request->input('no_hp');
        $biodata->telepon_fax = '';
        $biodata->username = '';
        $biodata->password = Hash::make($request->input('password'));
        $biodata->api_token = str_random(60);

        $biodata->save();

        Session::flash('messageSuccess', 'Registrasi berhasil');
        return redirect(Route('pengusul_login'));
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
        }else if(auth('')){
            Session::flash('loginSuccess', 'Login berhasil');
            return redirect(Route('admin_beranda'));
        }else{
            Session::flash('loginFailed', 'Login Gagal');
            return redirect(Route('pengusul_login'));
        }
    	return redirect(Route('pengusul_login'));
    }

    public function getLogout(){
        auth('pengusul')->logout();
        auth('admin')->logout();

        return redirect(Route('pengusul_index'));
    }

    public function getBeranda(){
    	return view('user.beranda');
    }

    public function getPengajuan(){
        $dataPaten = Paten::orderby('created_at', 'desc')->get();

        $dataDesainIndustri = DesainIndustri::orderby('created_at', 'desc')->get();

        return view('user.daftarusulan')->withPaten($dataPaten)->withDesainIndustri($dataDesainIndustri);
    }

    public function getPengajuanDesainIndustri(){
    	return view('user.pengajuandesainindustri');
    }

    public function getDetailDesainIndustri(){
        return view('user.detailpengajuanindustri');
    }

    public function getDetailPaten(){
        return view('user.detailpengajuanpaten');
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
            $desainIndustri->tanggal_penerimaan_permohonan_pertama_kali = Carbon::parse($request->input('tanggal_permohonan_pertama_kali'))->format('Y-m-d');
            $desainIndustri->nomor_prioritas = $request->input('nomor_prioritas');
        }

        if($request->hasFile('lampiran_surat_kuasa')){
            $path = storage_path().'/app/desain_industri/surat_kuasa';
            $file = $request->file('lampiran_surat_kuasa');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Kuasa_'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_surat_kuasa = $fileName;
        }

        if($request->hasFile('lampiran_surat_pernyataan_pengalihan_hak')){
            $path = storage_path().'/app/desain_industri/surat_pernyataan_pengalihan_hak';
            $file = $request->file('lampiran_surat_pernyataan_pengalihan_hak');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Pernyataan_Pengalihan_Hak_'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_pemilikan_hak')){
            $path = storage_path().'/app/desain_industri/bukti_pemilikan_hak';
            $file = $request->file('lampiran_bukti_pemilikan_hak');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Pemilikan_Hak'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_bukti_pemilikan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_prioritas_dan_terjemahan')){
            $path = storage_path().'/app/desain_industri/bukti_prioritas_dan_terjemahan';
            $file = $request->file('lampiran_bukti_prioritas_dan_terjemahan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Prioritas_dan_Terjemahan'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan = $fileName;
        }

        if($request->hasFile('lampiran_dokumen_desain_industri')){
            $path = storage_path().'/app/desain_industri/dokumen_desain_industri';
            $file = $request->file('lampiran_dokumen_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Dokumen_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->lampiran_dokumen_desain_industri = $fileName;
        }

        if($request->hasFile('uraian_desain_industri')){
            $path = storage_path().'/app/desain_industri/uraian_desain_indsturi';
            $file = $request->file('uraian_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Uraian_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->uraian_desain_industri = $fileName;
        }

        if($request->hasFile('contoh_fisik')){
            $path = storage_path().'/app/desain_industri/contoh_fisik';
            $file = $request->file('contoh_fisik');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Contoh_Fisik'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustri->contoh_fisik = $fileName;
        }

        $desainIndustri->kelas_desain_industri = $request->input('kelas_desain_industri');

        $desainIndustri->save();

        $desainer = $request->input('nama_desainer');
        $kewarganegaraan = $request->input('kewarganegaraan');

        foreach ($desainer as $i => $d) {
            $dataDesainer = new DesainIndustriPendesain;
            $dataDesainer->nama = $d;
            $dataDesainer->kewarganegaraan = $kewarganegaraan[$i];
            $dataDesainer->desain_industri_id = $desainIndustri->id;
            $dataDesainer->save();
        }

        if($request->hasFile('gambar_desain_industri')){
            $path = storage_path().'/app/desain_industri/gambar_desain_industri';
            $file = $request->file('gambar_desain_industri');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Gambar_Desain_Industri'.$desainIndustri->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $desainIndustriGambar = new DesainIndustriGambarFoto;
            $desainIndustriGambar->nama_gambar = $fileName;
            $desainIndustriGambar->file_gambar = $fileName;
            $desainIndustriGambar->desain_industri_id = $desainIndustri->id;
            $desainIndustriGambar->save();
        }

        Session::flash('messageSuccess', 'Pengusulan desain industri berhasil');

        return redirect(Route('pengusul_desain_industri_pengajuan'));
    }

    public function getPengajuanPaten(){
        return view('user.pengajuanpaten');
    }

    public function postPengajuanPaten(Request $request){
        $paten = new Paten;
        $paten->tanggal_permohonan = Carbon::now();
        $paten->biodata_id = auth('pengusul')->user()->id;        
        $paten->judul_invensi = $request->input('judul_invensi');

        $paten->paten_sederhana = $request->input('paten_sederhana');
        $paten->permohonan_paten_nomor = '';

        $check_konsultan_hki = false;
        if($request->konsultan_hki == 'on'){
            $paten->konsultan_hki_id = $request->input('konsultan_hki_id');
        }else{
            $paten->konsultan_hki = 1;
        }

        $paten->paten_pecahan_nomor = $request->input('permohonan_pecahan_paten');

        if($request->hasFile('surat_kuasa')){
            $path = storage_path().'/app/paten/surat_kuasa';
            $file = $request->file('surat_kuasa');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Kuasa'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->surat_kuasa = $fileName;
        }

        if($request->hasFile('surat_pengalihan_hak_atas_penemuan')){
            $path = storage_path().'/app/paten/surat_pengalihan_hak_atas_penemuan';
            $file = $request->file('surat_pengalihan_hak_atas_penemuan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Surat_Pengalihan_Hak_Atas_Penemuan'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->surat_pengalihan_hak_atas_penemuan = $fileName;
        }

        if($request->hasFile('bukti_pemilikan_hak_atas_penemuan')){
            $path = storage_path().'/app/paten/bukti_pemilikan_hak_atas_penemuan';
            $file = $request->file('bukti_pemilikan_hak_atas_penemuan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Pemilikan_Hak_Atas_Penemuan'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->bukti_pemilikan_hak_atas_penemuan = $fileName;
        }

        if($request->hasFile('bukti_penunjukan_negara_tujuan')){
            $path = storage_path().'/app/paten/bukti_penunjukan_negara_tujuan';
            $file = $request->file('bukti_penunjukan_negara_tujuan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Bukti_Penunjukan_Negara_Tujuan'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->bukti_penunjukan_negara_tujuan = $fileName;
        }

        if($request->hasFile('dokumen_prioritas_terjemahan')){
            $path = storage_path().'/app/paten/dokumen_prioritas_terjemahan';
            $file = $request->file('dokumen_prioritas_terjemahan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Dokumen_Prioritas_Terjemahan'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->dokumen_prioritas_terjemahan = $fileName;
        }

        if($request->hasFile('dokumen_permohonan_paten_internasional')){
            $path = storage_path().'/app/paten/dokumen_permohonan_paten_internasional';
            $file = $request->file('dokumen_permohonan_paten_internasional');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Dokumen_Permohonan_Paten_Internasional'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->dokumen_permohonan_paten_internasional = $fileName;
        }

        if($request->hasFile('sertifikat_penyimpanan_jasad_renik_terjemahan')){
            $path = storage_path().'/app/paten/sertifikat_penyimpanan_jasad_renik_terjemahan';
            $file = $request->file('sertifikat_penyimpanan_jasad_renik_terjemahan');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Sertifikat_Penyimpanan_Jasad_Renik_Terjemahan'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->sertifikat_penyimpanan_jasad_renik_terjemahan = $fileName;
        }

        if($request->hasFile('uraian_file')){
            $path = storage_path().'/app/paten/uraian_file';
            $file = $request->file('uraian_file');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Uraian_File'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->uraian_file = $fileName;
        }

        if($request->hasFile('klaim_file')){
            $path = storage_path().'/app/paten/klaim_file';
            $file = $request->file('klaim_file');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'KlaimF_ile'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->klaim_file = $fileName;
        }

        if($request->hasFile('abstrak')){
            $path = storage_path().'/app/paten/abstrak';
            $file = $request->file('abstrak');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Abstrak'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->abstrak = $fileName;
        }

        if($request->hasFile('gambar')){
            $path = storage_path().'/app/paten/gambar';
            $file = $request->file('gambar');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Gambar'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);
            $paten->gambar = $fileName;
        }

        $paten->hak_prioritas = false;

        $paten->save();

        $inventor = $request->input('nama_inventor');
        $kewarganegaraan = $request->input('kewarganegaraan');

        foreach ($inventor as $i => $d) {
            $dataInventor = new PatenInventor;
            $dataInventor->nama = $d;
            $dataInventor->kewarganegaraan = $kewarganegaraan[$i];
            $dataInventor->paten_id = $paten->id;
            $dataInventor->save();
        }

        if($request->input('hak_prioritas') == 'on'){
            $paten->hak_prioritas = true;
            $paten->save();

            $paten_hak_prioritas = new PatenHakPrioritas;
            $paten_hak_prioritas->nama = $request->input('hak_prioritas_nama');
            $paten_hak_prioritas->tanggal_penerimaan_permohonan = Carbon::parse($request->input('hak_prioritas_tanggal'))->format('Y-m-d');
            $paten_hak_prioritas->nomor_prioritas = $request->input('hak_prioritas_nomor');
            $paten_hak_prioritas->save();
        }

        if($request->hasFile('dokumen_lain')){
            $path = storage_path().'/app/paten/dokumen_lain';
            $file = $request->file('dokumen_lain');

            $extension = $file->getClientOriginalExtension();

            $fileName = 'Dokumen_Lain'.$paten->biodata_id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);

            $dokumen_lain = new PatenDokumenLain;
            $dokumen_lain->paten_id = $paten->id;
            $dokumen_lain->nama_dokumen_lain = $fileName;
            $dokumen_lain->file_dokumen_lain = $fileName;
            $dokumen_lain->save();
        }


        Session::flash('messageSuccess', 'Pengajuan Paten berhasil');
        return redirect(Route('pengusul_paten_pengajuan'));
    }
}
