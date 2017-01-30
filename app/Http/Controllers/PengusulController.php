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
use App\PatenSubtantifDeskripsi;
use App\PatenSubtantifGambar;

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
        if(auth('pengusul')->check()){
            return redirect(Route('pengusul_beranda'));
        }
    	return view('user.index');
    }

    public function getRegister(){
        if(auth('pengusul')->check()){
            return redirect(Route('pengusul_beranda'));
        }
        
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
        if(auth('pengusul')->check()){
            return redirect(Route('pengusul_beranda'));
        }
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

    public function getLogout(){
        auth('pengusul')->logout();
        auth('admin')->logout();

        return redirect(Route('pengusul_index'));
    }

    public function getBeranda(){
    	return view('user.beranda');
    }

    public function getPengajuan(){
        $id = auth('pengusul')->user()->id;

        $dataPaten = Paten::where('biodata_id', $id)->orderby('created_at', 'desc')->get();

        $dataDesainIndustri = DesainIndustri::where('biodata_id', $id)->orderby('created_at', 'desc')->get();

        $data = collect(null);

        foreach ($dataPaten as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->judul_invensi,
                        'jenis'     => 'Paten',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->satus
                        )
                );
        }

        foreach ($dataDesainIndustri as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->judul_invensi,
                        'jenis'     => 'Desain Industri',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->status
                        )
                );
        }

        return view('user.daftarusulan')->withData($data);
    }

    public function getDetailDesainIndustri($id){
        $data = DesainIndustri::with('biodata')->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.detailpengajuanindustri')->withData($data);
    }

    public function getDetailPaten($id){
        $data = Paten::with('biodata')->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }
        
        return view('user.detailpengajuanpaten')->withData($data);
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
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_surat_kuasa'), 'Surat_Kuasa_','/app/desain_industri/surat_kuasa');
            $desainIndustri->lampiran_surat_kuasa = $fileName;
        }

        if($request->hasFile('lampiran_surat_pernyataan_pengalihan_hak')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_surat_pernyataan_pengalihan_hak'), 'Surat_Pernyataan_Pengalihan_Hak_','/app/desain_industri/lampiran_surat_pernyataan_pengalihan_hak');
            $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_pemilikan_hak')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_bukti_pemilikan_hak'), 'Bukti_Pemilikan_Hak_','/app/desain_industri/lampiran_bukti_pemilikan_hak');
            $desainIndustri->lampiran_bukti_pemilikan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_prioritas_dan_terjemahan')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('bukti_prioritas_dan_terjemahan'), 'Bukti_Prioritas_dan_Terjemahan','/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan');
            $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan = $fileName;
        }

        if($request->hasFile('lampiran_dokumen_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_dokumen_desain_industri'), 'Dokumen_Desain_Industri_','/app/desain_industri/lampiran_dokumen_desain_industri');

            $desainIndustri->lampiran_dokumen_desain_industri = $fileName;
        }

        if($request->hasFile('uraian_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('uraian_desain_industri'), 'Uraian_Desain_Industri_','/app/desain_industri/uraian_desain_industri');

            $desainIndustri->uraian_desain_industri = $fileName;
        }

        if($request->hasFile('contoh_fisik')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('contoh_fisik'), 'Contoh_Fisik_','/app/desain_industri/contoh_fisik');
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
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('gambar_desain_industri'), 'Gambar_Desain_Industri_','/app/desain_industri/uraian_desain_industri');

            $desainIndustriGambar = new DesainIndustriGambarFoto;
            $desainIndustriGambar->nama_gambar = $fileName;
            $desainIndustriGambar->file_gambar = $fileName;
            $desainIndustriGambar->desain_industri_id = $desainIndustri->id;
            $desainIndustriGambar->save();
        }

        Session::flash('messageSuccess', 'Pengusulan desain industri berhasil');

        return redirect(Route('pengusul_desain_industri_pengajuan'));
    }

    public function getEditPengajuanIndustri($id){
        // UNDONE
        return view('');
    }

    public function postEditPengajuanIndustri($id){
        // UNDONE
        return redirect('/pengajuan');
    }

    public function postPengajuanPaten(Request $request){
        $paten = new Paten;
        $paten->tanggal_permohonan = Carbon::now();
        $paten->biodata_id = auth('pengusul')->user()->id;
        $paten->judul_invensi = $request->input('judul_invensi');

        $paten->jenis_paten = $request->input('jenis_paten');
        $paten->permohonan_paten_nomor = '';

        $check_konsultan_hki = false;

        if($request->input('konsultan_check') == 'on'){
            $paten->konsultan = $request->input('konsultan');
        }else{
            $paten->konsultan_hki = $request->input('konsultan');
        }

        $paten->paten_pecahan_nomor = $request->input('permohonan_pecahan_paten');

        if($request->hasFile('surat_kuasa')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('surat_kuasa'), 'Surat_Kuasa_','/app/paten/surat_kuasa');
            $paten->surat_kuasa = $fileName;
        }

        if($request->hasFile('surat_pengalihan_hak_atas_penemuan')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('surat_pengalihan_hak_atas_penemuan'), 'Surat_Pengalihan_Hak_Atas_Penemuan_','/app/paten/surat_pengalihan_hak_atas_penemuan');
            $paten->surat_pengalihan_hak_atas_penemuan = $fileName;
        }

        if($request->hasFile('bukti_pemilikan_hak_atas_penemuan_inventor')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('bukti_pemilikan_hak_atas_penemuan_inventor'), 'Bukti_Pemilikan_Hak_atas_Penemuan_Inventor_','/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor');
            $paten->surat_kepemilikan_invensi_oleh_inventor = $fileName;
        }

        if($request->hasFile('bukti_pemilikan_hak_atas_penemuan_lembaga')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('bukti_pemilikan_hak_atas_penemuan_lembaga'), 'Bukti_Pemilikan_Hak_atas_Penemuan_Lembaga_','/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga');
            $paten->surat_kepemilikan_invensi_oleh_inventor = $fileName;
        }

        if($request->hasFile('dokumen_prioritas_terjemahan')){
            $filName = $this->uploadFile($paten->biodata_id, $request->file('dokumen_prioritas_terjemahan'), 'Dokimen_Prioritas_Terjemahan_','/app/paten/dokumen_prioritas_terjemahan');

            $paten->dokumen_prioritas_terjemahan = $fileName;
        }

        $paten->save();

        if($request->hasFile('uraian_file')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('urian_file'), 'File_Uraian_','/app/paten/uraian_file');

            $dokumen = new PatenSubtantifDeskripsi;
            $dokumen->paten_id = $paten->id;
            $dokumen->nama_file = $fileName;
            $dokumen->save();
        }

        if($request->hasFile('gambar_file')){
            
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('gambar_file'), 'File_Gambar_','/app/paten/gambar');

            $dokumen = new PatenSubtantifGambar;
            $dokumen->paten_id = $paten->id;
            $dokumen->nama_file = $fileName;
            $dokumen->save();
        }

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

            $paten_hak_prioritas = new PatenHakPrioritas;
            $paten_hak_prioritas->nama = $request->input('hak_prioritas_nama');
            $paten_hak_prioritas->tanggal_penerimaan_permohonan = Carbon::parse($request->input('hak_prioritas_tanggal'))->format('Y-m-d');
            $paten_hak_prioritas->nomor_prioritas = $request->input('hak_prioritas_nomor');
            $paten_hak_prioritas->save();

            $paten->hak_prioritas_id = $paten_hak_prioritas->id;
            $paten->save();
        }


        Session::flash('messageSuccess', 'Pengajuan Paten berhasil');
        return redirect(Route('pengusul_pengajuan'));
    }

    public function getEditPaten($id){
        // UNDONE
        $data = Paten::with('biodata')->where('id', $id)->first();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return redirect('/pengajuan');
        }

        return redirect('/pengajuan');
    }

    public function postEditPaten($id){
        // UNDONE
        $data = Paten::with('biodata')->where('id', $id)->first();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return redirect('/pengajuan');
        }

        return redirect('/pengajuan');
    }

    public function uploadFile($id, $file, $tipeDokumen, $path){
            $path = storage_path().$path;

            $extension = $file->getClientOriginalExtension();

            $fileName = $tipeDokumen.$id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);

            return $fileName;
    }
}
