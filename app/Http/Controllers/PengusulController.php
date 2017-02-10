<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Biodata;
use App\DesainIndustri;
use App\DesainIndustriGambarFoto;
use App\DesainIndustriPendesain;
use App\DesainIndustriUraian;
use App\KelasDesainIndustri;

use App\Paten;
use App\PatenHakPrioritas;
use App\PatenInventor;
use App\PatenSubtantifDeskripsi;
use App\PatenSubtantifGambar;

use App\HakCipta;
use App\JenisHakCipta;

use App\Merek;
use App\KelasBarangJasa;

use Auth;
use Hash;
use Session;
use Carbon\Carbon;
use File;

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

        $dataHakCipta = HakCipta::where('biodata_id', $id)->orderBy('created_at', 'desc')->get();

        $dataMerek = Merek::where('biodata_id', $id)->orderBy('created_at', 'desc')->get();

        $data = collect(null);

        foreach ($dataPaten as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->judul_invensi,
                        'jenis'     => 'Paten',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->status
                        )
                );
        }

        foreach ($dataDesainIndustri as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->judul_desain_industri,
                        'jenis'     => 'Desain Industri',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->status
                        )
                );
        }

        foreach ($dataHakCipta as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->nama_ciptaan,
                        'jenis'     => 'Hak Cipta',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->status
                        )
                );
        }

        foreach ($dataMerek as $key => $value) {
            $data->push(
                    array(
                        'id'        => $value->id,
                        'judul'     => $value->untuk_permohonan_merek,
                        'jenis'     => 'Merek',
                        'tanggal'   => $value->created_at,
                        'status'    => $value->status
                        )
                );
        }
        
        return view('user.daftarusulan')->withData($data);
    }

    public function getDetailDesainIndustri($id){
        $data = DesainIndustri::with('biodata')
                                ->with('uraian')
                                ->with('gambar_foto')
                                ->with('kelas_desain_industri')
                                ->with('pendesain')
                                ->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.detailpengajuanindustri')->withData($data);
    }

    public function getDetailPaten($id){
        $data = Paten::with('biodata')
                        ->with('dokumen_subtantif_gambar')
                        ->with('dokumen_subtantif_deskripsi')
                        ->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }
        
        return view('user.detailpengajuanpaten')->withData($data);
    }

    public function getDetailMerek($id){
        $data = Merek::with('biodata')
                        ->with('kelas_barang_jasa')
                        ->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.detailpengajuanmerek')->withData($data);
    }

    public function getDetailHakCipta($id){
        $data = HakCipta::with('biodata')->with('jenis_hak_cipta')->where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }
        
        return view('user.detailpengajuanhakcipta')->withData($data);
    }

    public function getPengajuanDesainIndustri(){
        $kelasDesainIndustri = KelasDesainIndustri::all();

        return view('user.pengajuandesainindustri')->withKelasDesainIndustri($kelasDesainIndustri);
    }

    public function postPengajuanDesainIndustri(Request $request){
        $desainIndustri = new DesainIndustri;
        $desainIndustri->tanggal_permohonan = Carbon::now();
        $desainIndustri->tanggal_penerimaan = Carbon::now();
        $desainIndustri->nomor_permohonan = '';
        $desainIndustri->biodata_id = auth('pengusul')->user()->id;

        if($request->input('konsultan_hki') == 'on'){
            $desainIndustri->konsultan = $request->input('konsultan_hki_id');
        }else{
            $desainIndustri->konsultan = null;
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
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_bukti_prioritas_dan_terjemahan'), 'Bukti_Prioritas_dan_Terjemahan_','/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan');
            $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan = $fileName;
        }

        if($request->hasFile('lampiran_dokumen_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_dokumen_desain_industri'), 'Dokumen_Desain_Industri_','/app/desain_industri/lampiran_dokumen_desain_industri');

            $desainIndustri->lampiran_dokumen_desain_industri = $fileName;
        }

        /*if($request->hasFile('contoh_fisik')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('contoh_fisik'), 'Contoh_Fisik_','/app/desain_industri/contoh_fisik');
            $desainIndustri->contoh_fisik = $fileName;
        }*/

        $desainIndustri->kelas_desain_industri_id = $request->input('kelas_desain_industri');
        $desainIndustri->status = false;
        $desainIndustri->reviewer_id = null;

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
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('gambar_desain_industri'), 'Gambar_Desain_Industri_','/app/desain_industri/gambar_desain_industri');

            $desainIndustriGambar = new DesainIndustriGambarFoto;
            $desainIndustriGambar->gambar_foto = $fileName;
            // UNDONE
            $desainIndustriGambar->jumlah = 0;
            $desainIndustriGambar->desain_industri_id = $desainIndustri->id;
            $desainIndustriGambar->save();
        }

        if($request->hasFile('uraian_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('uraian_desain_industri'), 'Uraian_Desain_Industri_','/app/desain_industri/uraian_desain_industri');

            $desainIndustriUraian = new DesainIndustriUraian;
            $desainIndustriUraian->nama = $fileName;
            $desainIndustriUraian->desain_industri_id = $desainIndustri->id;
            $desainIndustriUraian->save();
        }

        Session::flash('messageSuccess', 'Pengusulan desain industri berhasil');

        return redirect('/pengajuan');
    }

    public function getEditDesainIndustri($id){
        $kelasDesainIndustri = KelasDesainIndustri::all();

        $data = DesainIndustri::with('biodata')
                                ->with('uraian')
                                ->with('gambar_foto')
                                ->with('pendesain')
                                ->with('kelas_desain_industri')
                                ->where('id', $id)->first();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.editpengajuandesainindustri')->withData($data)->withKelasDesainIndustri($kelasDesainIndustri);
    }

    public function postEditDesainIndustri(Request $request){
        $id = $request->input('id');

        $desainIndustri = DesainIndustri::where('id', $id)->firstOrFail();

        if($desainIndustri == null){
            Session::flash('messageError', 'Data tidak valid');

            return redirect('/pengajuan');
        }

        if($desainIndustri->status == 1){
            Session::flash('messageError', 'Data sudah tidak dapat diubah');

            return redirect('/pengajuan');
        }

        if($desainIndustri->biodata_id != auth('pengusul')->user()->id){
            Session::flash('messageError', 'Akses dilarang');

            return redirect('/pengajuan');
        }

        if($request->input('konsultan_hki') == 'on'){
            $desainIndustri->konsultan = $request->input('konsultan_hki_id');
        }else{
            $desainIndustri->konsultan = null;
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
            if(File::exists(storage_path() . '/app/desain_industri/surat_kuasa/' . $desainIndustri->lampiran_surat_kuasa)){
                File::delete(storage_path() . '/app/desain_industri/surat_kuasa/' . $desainIndustri->lampiran_surat_kuasa);
            }
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_surat_kuasa'), 'Surat_Kuasa_','/app/desain_industri/surat_kuasa');

            $desainIndustri->lampiran_surat_kuasa = $fileName;
        }

        if($request->hasFile('lampiran_surat_pernyataan_pengalihan_hak')){
            if(File::exists(storage_path() . '/app/desain_industri/lampiran_surat_pernyataan_pengalihan_hak/' . $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak)){
                File::delete(storage_path() . '/app/desain_industri/lampiran_surat_pernyataan_pengalihan_hak/' . $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak);
            }
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_surat_pernyataan_pengalihan_hak'), 'Surat_Pernyataan_Pengalihan_Hak_','/app/desain_industri/lampiran_surat_pernyataan_pengalihan_hak');
            $desainIndustri->lampiran_surat_pernyataan_pengalihan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_pemilikan_hak')){
            if(File::exists(storage_path() . '/app/desain_industri/lampiran_bukti_pemilikan_hak/' . $desainIndustri->lampiran_bukti_pemilikan_hak)){
                File::delete(storage_path() . '/app/desain_industri/lampiran_bukti_pemilikan_hak/' . $desainIndustri->lampiran_bukti_pemilikan_hak);
            }
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_bukti_pemilikan_hak'), 'Bukti_Pemilikan_Hak_','/app/desain_industri/lampiran_bukti_pemilikan_hak');
            $desainIndustri->lampiran_bukti_pemilikan_hak = $fileName;
        }

        if($request->hasFile('lampiran_bukti_prioritas_dan_terjemahan')){
            if(File::exists(storage_path() . '/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan/' . $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan)){
                File::delete(storage_path() . '/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan/' . $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan);
            }
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_bukti_prioritas_dan_terjemahan'), 'Bukti_Prioritas_dan_Terjemahan_','/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan');
            $desainIndustri->lampiran_bukti_prioritas_dan_terjemahan = $fileName;
        }

        if($request->hasFile('lampiran_dokumen_desain_industri')){
            if(File::exists(storage_path() . '/app/desain_industri/lampiran_dokumen_desain_industri/' . $desainIndustri->lampiran_dokumen_desain_industri)){
                File::delete(storage_path() . '/app/desain_industri/lampiran_dokumen_desain_industri/' . $desainIndustri->lampiran_dokumen_desain_industri);
            }
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('lampiran_dokumen_desain_industri'), 'Dokumen_Desain_Industri_','/app/desain_industri/lampiran_dokumen_desain_industri');

            $desainIndustri->lampiran_dokumen_desain_industri = $fileName;
        }

        $desainIndustri->kelas_desain_industri_id = $request->input('kelas_desain_industri');

        $desainIndustri->save();

        $desainer = $request->input('nama_desainer');
        $kewarganegaraan = $request->input('kewarganegaraan');

        $temp_desainer = DesainIndustriPendesain::where('desain_industri_id', $id)->delete();

        foreach ($desainer as $i => $d) {
            $dataDesainer = new DesainIndustriPendesain;
            $dataDesainer->nama = $d;
            $dataDesainer->kewarganegaraan = $kewarganegaraan[$i];
            $dataDesainer->desain_industri_id = $desainIndustri->id;
            $dataDesainer->save();
        }

        if($request->hasFile('gambar_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('gambar_desain_industri'), 'Gambar_Desain_Industri_','/app/desain_industri/gambar_desain_industri');

            $desainIndustriGambar = new DesainIndustriGambarFoto;
            $desainIndustriGambar->gambar_foto = $fileName;
            $desainIndustriGambar->jumlah = 0;
            $desainIndustriGambar->desain_industri_id = $desainIndustri->id;
            $desainIndustriGambar->save();
        }

        if($request->hasFile('uraian_desain_industri')){
            $fileName = $this->uploadFile($desainIndustri->biodata_id, $request->file('uraian_desain_industri'), 'Uraian_Desain_Industri_','/app/desain_industri/uraian_desain_industri');

            $desainIndustriUraian = new DesainIndustriUraian;
            $desainIndustriUraian->nama = $fileName;
            $desainIndustriUraian->desain_industri_id = $desainIndustri->id;
            $desainIndustriUraian->save();
        }

        Session::flash('messageSuccess', 'Update Pengajuan Desain Industri berhasil');
        return redirect('/pengajuan');
    }

    public function getPengajuanPaten(){
        return view('user.pengajuanpaten');
    }

    public function postPengajuanPaten(Request $request){
        $paten = new Paten;
        $paten->tanggal_permohonan = Carbon::now();
        $paten->biodata_id = auth('pengusul')->user()->id;
        $paten->judul_invensi = $request->input('judul_invensi');

        $paten->jenis_paten = $request->input('jenis_paten');
        $paten->permohonan_paten_nomor = '';

        if($request->input('konsultan_check') == 'on'){
            $paten->konsultan = $request->input('konsultan');
        }else{
            $paten->konsultan = null;
        }

        if($request->input('nomor_pecahan_check') == 'on'){
            $paten->paten_pecahan_nomor = $request->input('nomor_pecahan');
        }else{
            $paten->paten_pecahan_nomor = null;    
        }
        
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
            $paten->surat_pernyataan_invensi_oleh_lembaga = $fileName;
        }

        if($request->hasFile('dokumen_prioritas_terjemahan')){
            $filName = $this->uploadFile($paten->biodata_id, $request->file('dokumen_prioritas_terjemahan'), 'Dokumen_Prioritas_Terjemahan_','/app/paten/dokumen_prioritas_terjemahan');

            $paten->dokumen_prioritas_terjemahan = $fileName;
        }

        $paten->save();

        if($request->hasFile('uraian_file')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('uraian_file'), 'File_Uraian_','/app/paten/uraian_file');

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

        $paten->status = 0;
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
            $paten_hak_prioritas->paten_id = $paten->id;
            $paten_hak_prioritas->save();

            $paten->hak_prioritas_id = $paten_hak_prioritas->id;
            $paten->save();
        }


        Session::flash('messageSuccess', 'Pengajuan Paten berhasil');
        return redirect(Route('pengusul_pengajuan'));
    }

    public function getEditPaten($id){
        $data = Paten::with('biodata')
                        ->with('inventor')
                        ->with('hak_prioritas')
                        ->with('reviewer')
                        ->with('dokumen_subtantif_deskripsi')
                        ->with('dokumen_subtantif_gambar')
                        ->where('id', $id)->firstOrFail();
        

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.editpengajuanpaten')->withData($data);
    }

    public function postEditPaten(Request $request){
        $id = $request->input('id');

        $paten = Paten::where('id', $id)->firstOrFail();

        if($paten == null){
            Session::flash('messageError', 'Data tidak valid');

            return redirect('/pengajuan');
        }

        if($paten->status == 1){
            Session::flash('messageError', 'Data sudah tidak dapat diubah');

            return redirect('/pengajuan');
        }

        if($paten->biodata_id != auth('pengusul')->user()->id){
            Session::flash('messageError', 'Akses dilarang');

            return redirect('/pengajuan');
        }

        $paten->biodata_id = auth('pengusul')->user()->id;
        $paten->judul_invensi = $request->input('judul_invensi');

        $paten->jenis_paten = $request->input('jenis_paten');

        if($request->input('konsultan_check') == 'on'){
            $paten->konsultan = $request->input('konsultan');
        }else{
            $paten->konsultan = null;
        }

        if($request->input('nomor_pecahan_check') == 'on'){
            $paten->paten_pecahan_nomor = $request->input('nomor_pecahan');
        }else{
            $paten->paten_pecahan_nomor = null;    
        }

        $file_surat_kuasa = $paten->surat_kuasa;
        if($request->hasFile('surat_kuasa')){
            if(File::exists(storage_path() . '/app/paten/surat_kuasa/' . $paten->surat_kuasa)){
                File::delete(storage_path() . '/app/paten/surat_kuasa/' . $paten->surat_kuasa);
            }
            $file_surat_kuasa = $this->uploadFile($paten->biodata_id, $request->file('surat_kuasa'), 'Surat_Kuasa_','/app/paten/surat_kuasa');
            $paten->surat_kuasa = $file_surat_kuasa;
        }

        $file_surat_pengalihan_hak_atas_penemuan = $paten->surat_pengalihan_hak_atas_penemuan;
        if($request->hasFile('surat_pengalihan_hak_atas_penemuan')){
            if(File::exists(storage_path() . '/app/paten/surat_pengalihan_hak_atas_penemuan/' . $paten->surat_pengalihan_hak_atas_penemuan)){
                File::delete(storage_path() . '/app/paten/surat_pengalihan_hak_atas_penemuan/' . $paten->surat_pengalihan_hak_atas_penemuan);
            }
            $file_surat_pengalihan_hak_atas_penemuan = $this->uploadFile($paten->biodata_id, $request->file('surat_pengalihan_hak_atas_penemuan'), 'Surat_Pengalihan_Hak_Atas_Penemuan_','/app/paten/surat_pengalihan_hak_atas_penemuan');
            $paten->surat_pengalihan_hak_atas_penemuan = $file_surat_pengalihan_hak_atas_penemuan;
        }

        $file_bukti_pemilikan_hak_atas_penemuan_inventor = $paten->surat_kepemilikan_invensi_oleh_inventor;
        if($request->hasFile('bukti_pemilikan_hak_atas_penemuan_inventor')){
            if(File::exists(storage_path() . '/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor/' . $paten->surat_kepemilikan_invensi_oleh_inventor)){
                File::delete(storage_path() . '/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor/' . $paten->surat_kepemilikan_invensi_oleh_inventor);
            }
            $file_bukti_pemilikan_hak_atas_penemuan_inventor = $this->uploadFile($paten->biodata_id, $request->file('bukti_pemilikan_hak_atas_penemuan_inventor'), 'Bukti_Pemilikan_Hak_atas_Penemuan_Inventor_','/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor');
            $paten->surat_kepemilikan_invensi_oleh_inventor = $file_bukti_pemilikan_hak_atas_penemuan_inventor;
        }

        $file_surat_pernyataan_invensi_oleh_lembaga = $paten->surat_pernyataan_invensi_oleh_lembaga;
        if($request->hasFile('bukti_pemilikan_hak_atas_penemuan_lembaga')){
            if(File::exists(storage_path() . '/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga/' . $paten->surat_pernyataan_invensi_oleh_lembaga)){
                File::delete(storage_path() . '/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga/' . $paten->surat_pernyataan_invensi_oleh_lembaga);
            }
            $file_surat_pernyataan_invensi_oleh_lembaga = $this->uploadFile($paten->biodata_id, $request->file('bukti_pemilikan_hak_atas_penemuan_lembaga'), 'Bukti_Pemilikan_Hak_atas_Penemuan_Lembaga_','/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga');
            $paten->surat_pernyataan_invensi_oleh_lembaga = $file_surat_pernyataan_invensi_oleh_lembaga;
        }

        $file_dokumen_prioritas_terjemahan = $paten->dokumen_prioritas_terjemahan;
        if($request->hasFile('dokumen_prioritas_terjemahan')){
            if(File::exists(storage_path() . '/app/paten/dokumen_prioritas_terjemahan/' . $paten->dokumen_prioritas_terjemahan)){
                File::delete(storage_path() . '/app/paten/dokumen_prioritas_terjemahan/' . $paten->dokumen_prioritas_terjemahan);
            }
            $file_dokumen_prioritas_terjemahan = $this->uploadFile($paten->biodata_id, $request->file('dokumen_prioritas_terjemahan'), 'Dokimen_Prioritas_Terjemahan_','/app/paten/dokumen_prioritas_terjemahan');

            $paten->dokumen_prioritas_terjemahan = $file_dokumen_prioritas_terjemahan;
        }

        $paten->save();

        if($request->hasFile('uraian_file')){
            $fileName = $this->uploadFile($paten->biodata_id, $request->file('uraian_file'), 'File_Uraian_','/app/paten/uraian_file');

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

        $last_inventor = PatenInventor::where('paten_id', $paten->id)->delete();

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


        Session::flash('messageSuccess', 'Update Pengajuan Paten berhasil');
        return redirect(Route('pengusul_pengajuan'));
        
    }

    public function getPengajuanMerek(){
        $kelas_barang_jasa = KelasBarangJasa::all();

        return view('user.pengajuanmerek')->withKelasBarangJasa($kelas_barang_jasa);
    }

    public function postPengajuanMerek(Request $request){
        $data = new Merek;

        $data->tgl_masuk = Carbon::now();
        $data->no_agenda = '';
        $data->untuk_permohonan_merek = $request->input('nama_merek');
        $data->tgl_penerimaan_permohonan = Carbon::now();

        $data->biodata_id = auth('pengusul')->user()->id;

        $data->kuasa_nama = $request->input('kuasa_nama');
        $data->kuasa_alamat = $request->input('kuasa_alamat');
        $data->kuasa_telpon = $request->input('kuasa_telepon');
        $data->kuasa_email = $request->input('kuasa_email');

        $data->kuasa_alamat_indonesia = $request->input('kuasa_alamat');
        $data->kuasa_nama_negara = 'Indonesia';

        $data->tgl_permohonan = Carbon::now();

        $data->warna_warna_etiket = $request->input('warna_etiket');

        $data->arti_etiket_merek = $request->input('arti_etiket');

        if($request->hasFile('etiket_merek')){
            $fileName = $this->uploadFile($data->biodata_id, $request->file('etiket_merek'), 'Etiket_Merek_','/app/merek/etiket_merek');

            $data->etiket_merek = $fileName;
        }

        $data->kelas_barang_jasa_id = $request->input('kelas_barang_jasa');

        $kelasBarangJasa = KelasBarangJasa::where('id', $data->kelas_barang_jasa)->first();

        $data->jenis = $kelasBarangJasa->deskripsi;

        $data->status = false;

        $data->save();

        Session::flash('messageSuccess', 'Pengajuan Merek berhasil');
        return redirect(Route('pengusul_pengajuan'));
    }

    public function getEditMerek($id){
        $kelas_barang_jasa = KelasBarangJasa::all();

        $data = Merek::with('biodata')
                        ->with('kelas_barang_jasa')
                        ->where('id', $id)->firstOrFail();   

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.editpengajuanmerek')->withData($data)->withKelasBarangJasa($kelas_barang_jasa);
    }

    public function postEditMerek(Request $request){
        $id = $request->input('id');

        $data = Merek::where('id', $id)->first();

        if($data == null){
            Session::flash('messageError', 'Data tidak valid');

            return redirect('/pengajuan');
        }

        if($data->status == 1){
            Session::flash('messageError', 'Data sudah tidak dapat diubah');

            return redirect('/pengajuan');
        }

        if($data->biodata_id != auth('pengusul')->user()->id){
            Session::flash('messageError', 'Akses dilarang');

            return redirect('/pengajuan');
        }

        $data->untuk_permohonan_merek = $request->input('nama_merek');

        $data->kuasa_nama = $request->input('kuasa_nama');
        $data->kuasa_alamat = $request->input('kuasa_alamat');
        $data->kuasa_telpon = $request->input('kuasa_telepon');
        $data->kuasa_email = $request->input('kuasa_email');
        $data->kuasa_alamat_indonesia = $request->input('kuasa_alamat');
        $data->kuasa_nama_negara = 'Indonesia';

        $data->warna_warna_etiket = $request->input('warna_etiket');

        $data->arti_etiket_merek = $request->input('arti_etiket');

        $fileName = $data->etiket_merek;
        if($request->hasFile('etiket_merek')){
            if(File::exists(storage_path() . '/app/merek/etiket_merek/' . $data->etiket_merek)){
                File::delete(storage_path() . '/app/merek/etiket_merek/' . $data->etiket_merek);
            }
            $fileName = $this->uploadFile($data->biodata_id, $request->file('etiket_merek'), 'Etiket_Merek_','/app/merek/etiket_merek');

            $data->etiket_merek = $fileName;
        }

        $data->kelas_barang_jasa_id = $request->input('kelas_barang_jasa');

        $kelasBarangJasa = KelasBarangJasa::where('id', $data->kelas_barang_jasa_id)->first();

        $data->jenis = $kelasBarangJasa->deskripsi;

        $data->save();

        Session::flash('messageSuccess', 'Update Pengajuan Merek berhasil');
        return redirect(Route('pengusul_pengajuan'));
    }

    public function getPengajuanHakCipta(){
        $jenis_hak_cipta = JenisHakCipta::all();

        return view('user.pengajuancipta')->withJenisHakCipta($jenis_hak_cipta);
    }

    public function postPengajuanHakCipta(Request $request){
        $data = new HakCipta;
        $data->biodata_id = auth('pengusul')->user()->id;

        $data->nama_ciptaan = $request->input('nama_ciptaan');

        $data->pencipta_nama = $request->input('pencipta_nama');
        $data->pencipta_kewarganegaraan = $request->input('pencipta_kewarganegaraan');
        $data->pencipta_alamat = $request->input('pencipta_alamat');

        $data->pemegang_hak_cipta_nama = $request->input('pemegang_hak_cipta_nama');
        $data->pemegang_hak_cipta_kewarganegaraan = $request->input('pemegang_hak_cipta_kewarganegaraan');
        $data->pemegang_hak_cipta_alamat = $request->input('pemegang_hak_cipta_alamat');

        $data->kuasa_nama = $request->input('kuasa_nama');
        $data->kuasa_kewarganegaraan = $request->input('kuasa_kewarganegaraan');
        $data->kuasa_alamat = $request->input('kuasa_alamat');

        $data->jenis_hak_cipta_id = $request->input('jenis_hak_cipta_id');
        $data->uraian_ciptaan = $request->input('uraian_ciptaan');

        $data->tanggal_diumumkan = $request->input('tanggal_diumumkan');
        $data->tempat_diumumkan = $request->input('tempat_diumumkan');

        $data->status = 0;
        $data->reviewer_id = null;
        $data->save();

        Session::flash('messageSuccess', 'Pengusulan hak cipta berhasil');

        return redirect('/pengajuan');
    }

    public function getEditHakCipta($id){
        $jenis_hak_cipta = JenisHakCipta::all();

        $data = HakCipta::where('id', $id)->firstOrFail();

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        return view('user.editpengajuancipta')->withData($data)->withJenisHakCipta($jenis_hak_cipta);
    }

    public function postEditHakCipta(Request $request){
        $id = $request->input('id');

        $data = HakCipta::where('id', $id)->first();

        if($data == null){
            Session::flash('messageError', 'Data tidak valid');

            return redirect('/pengajuan');
        }

        if($data->status == 1){
            Session::flash('messageError', 'Data sudah tidak dapat diubah');

            return redirect('/pengajuan');
        }

        if($data->biodata_id != auth('pengusul')->user()->id){
            Session::flash('messageError', 'Akses dilarang');

            return redirect('/pengajuan');
        }

        $data->nama_ciptaan = $request->input('nama_ciptaan');

        $data->pencipta_nama = $request->input('pencipta_nama');
        $data->pencipta_kewarganegaraan = $request->input('pencipta_kewarganegaraan');
        $data->pencipta_alamat = $request->input('pencipta_alamat');

        $data->pemegang_hak_cipta_nama = $request->input('pemegang_hak_cipta_nama');
        $data->pemegang_hak_cipta_kewarganegaraan = $request->input('pemegang_hak_cipta_kewarganegaraan');
        $data->pemegang_hak_cipta_alamat = $request->input('pemegang_hak_cipta_alamat');

        $data->kuasa_nama = $request->input('kuasa_nama');
        $data->kuasa_kewarganegaraan = $request->input('kuasa_kewarganegaraan');
        $data->kuasa_alamat = $request->input('kuasa_alamat');

        $data->jenis_hak_cipta_id = $request->input('jenis_hak_cipta_id');
        $data->uraian_ciptaan = $request->input('uraian_ciptaan');

        $data->tanggal_diumumkan = $request->input('tanggal_diumumkan');
        $data->tempat_diumumkan = $request->input('tempat_diumumkan');

        $data->save();

        Session::flash('messageSuccess', 'Pengusulan hak cipta berhasil');

        return redirect('/pengajuan');
    }


    // Delete Pengajuan
    public function postDeletePengajuan(Request $request){
        $data = null;
        $id = $request->input('id');
        $jenis_pengajuan = $request->input('jenis_pengajuan');

        switch($jenis_pengajuan){
            case 'Paten':
                $data = Paten::where('id', $id)->first();
            break;

            case 'Desain Industri':
                $data = DesainIndustri::where('id', $id)->first();
            break;

            case 'Hak Cipta':
                $data = HakCipta::where('id', $id)->first();
            break;

            case 'Merek':
                $data = Merek::where('id', $id)->first();
            break;
        }

        if($data != null){
            $data->delete();
        }

        Session::flash('messageSuccess','Hapus pengajuan berhasil');
        return redirect('/pengajuan');
    }

    public function uploadFile($id, $file, $tipeDokumen, $path){
            $path = storage_path().$path;

            $extension = $file->getClientOriginalExtension();

            $fileName = $tipeDokumen.$id.'_'.Carbon::now()->format('YmdHis').rand(1,99).'.'.$extension;

            $file->move($path, $fileName);

            return $fileName;
    }

    public function updateUploadFile($filename, $file, $path){
            $path = storage_path().$path;

            $extension = $file->getClientOriginalExtension();

            $file->move($path, $filename);

            return $filename;
    }
}