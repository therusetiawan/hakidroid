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

use PDF;
use Session;
use Carbon\Carbon;

class GenerateFileController extends Controller
{   
    public function __construct(){
        $this->middleware('auth:pengusul');
    }
    
    public function getFileDesainIndustri($id){
        $data = DesainIndustri::with('biodata')
                                ->with('uraian')
                                ->with('gambar_foto')
                                ->with('kelas_desain_industri')
                                ->with('pendesain')
                                ->where('id', $id)->firstOrFail();

        $data->tanggal_penerimaan_permohonan_pertama_kali_string = Carbon::parse($data->tanggal_penerimaan_permohonan_pertama_kali)->format('d F Y');
        $data->tanggal_permohonan_string = Carbon::parse($data->tanggal_permohonan)->format('d F Y');
        $data->tanggal_penerimaan_string = Carbon::parse($data->tanggal_penerimaan)->format('d F Y');

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        if($data->status != 1){
            Session::flash('messageError', 'Pengajuan belum disetujui');
            return redirect('/pengajuan');
        }

        $pdf = PDF::loadView('formulir.ajuanindustri', compact('data'));
        return $pdf->download('PengajuanDesainIndustri.pdf');
    }

    public function getFilePaten($id){
        $data = Paten::with('biodata')
                        ->with('dokumen_subtantif_gambar')
                        ->with('dokumen_subtantif_deskripsi')
                        ->where('id', $id)->firstOrFail();

        $data->tanggal_permohonan_string = Carbon::parse($data->tanggal_permohonan)->format('d F Y');
        $data->hak_prioritas->tanggal_penerimaan_permohonan_string = Carbon::parse($data->hak_prioritas->tanggal_penerimaan_permohonan)->format('d F Y');

        if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        if($data->status != 1){
            Session::flash('messageError', 'Pengajuan belum disetujui');
            return redirect('/pengajuan');
        }

        $pdf = PDF::loadView('formulir.paten', compact('data'));
        return $pdf->download('PengajuanPaten.pdf');
    }

    public function getFileHakCipta($id){
    	$data = HakCipta::with('biodata')->with('jenis_hak_cipta')->where('id', $id)->firstOrFail();

        $data->tanggal_sekarang_string = Carbon::now()->format('d F Y');
        $data->tanggal_diumumkan_string = Carbon::parse($data->tanggal_diumumkan)->format('d F Y');

    	if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        if($data->status != 1){
            Session::flash('messageError', 'Pengajuan belum disetujui');
            return redirect('/pengajuan');
        }

        $pdf = PDF::loadView('formulir.cipta', compact('data'));
		return $pdf->download('PengajuanHakCipta.pdf');
    }

    public function getFileMerek($id){
    	$data = Merek::with('biodata')
                        ->with('kelas_barang_jasa')
                        ->where('id', $id)->firstOrFail();
        $data->tanggal_masuk_string = Carbon::parse($data->tgl_masuk)->format('d F Y');
        $data->tanggal_penerimaan_string = Carbon::parse($data->tgl_penerimaan_permohonan)->format('d F Y');
        $data->tanggal_sekarang_string = Carbon::now()->format('d F Y');

    	if($data->biodata->id != auth('pengusul')->user()->id){
            return abort('404');
        }

        if($data->status != 1){
            Session::flash('messageError', 'Pengajuan belum disetujui');
            return redirect('/pengajuan');
        }

        $pdf = PDF::loadView('formulir.merk', compact('data'));
		return $pdf->download('PengajuanMerek.pdf');
    }
}
