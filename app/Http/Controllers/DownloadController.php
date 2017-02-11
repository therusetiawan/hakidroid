<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class DownloadController extends Controller
{
    public function __construct(){
        $this->middleware('auth:pengusul');
    }
    
	// Paten
    public function getPatenSuratKuasa($filename){
		$path = storage_path().'/app/paten/surat_kuasa';		
		$path .= '/'.$filename;	

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratPengalihanHakPenemuan($filename){
    	$path = storage_path().'/app/paten/surat_pengalihan_hak_atas_penemuan';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratKepemilikanInventor($filename){
    	$path = storage_path().'/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratKepemilikanLembaga($filename){
    	$path = storage_path().'/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenDokumenTerjemahan($filename){
    	$path = storage_path().'/app/paten/dokumen_prioritas_terjemahan';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenDokumenSubtantifDeskripsi($filename){
    	$path = storage_path().'/app/paten/uraian_file';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenDokumenSubtantifGambar($filename){
    	$path = storage_path().'/app/paten/gambar';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    // Desain Industri

    public function getDesainIndustriSuratKuasa($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/surat_kuasa');
    	return $response;
    }

    public function getDesainIndustriSuratPernyataanPengalihanHak($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/lampiran_surat_pernyataan_pengalihan_hak');
    	return $response;
    }

    public function getDesainIndustriBuktiPemilikanHak($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/lampiran_bukti_pemilikan_hak');
    	return $response;
    }

    public function getDesainIndustriBuktiPrioritasTerjemahan($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/lampiran_bukti_prioritas_dan_terjemahan');
    	return $response;
    }

    public function getDesainIndustriDokumenDesainIndustri($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/lampiran_dokumen_desain_industri');
    	return $response;
    }

    public function getDesainIndustriUraian($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/uraian_desain_industri');
    	return $response;
    }

    public function getDesainIndustriGambarDesainIndustri($filename){
    	$response = $this->getDownload($filename, '/app/desain_industri/gambar_desain_industri');
    	return $response;
    }
    

    // Merek    

    public function getMerekEtiketMerek($filename){
        $response = $this->getDownload($filename, '/app/merek/etiket_merek');
        return $response;
    }

    public function getDownload($filename, $pathname){
		$path = storage_path().$pathname;
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('404');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    return $response->header("Content-Type", $type);
    }
}
