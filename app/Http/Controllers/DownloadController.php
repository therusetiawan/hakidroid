<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function getPatenSuratKuasa($filename){
		$path = storage_path().'/app/paten/surat_kuasa';		
		$path .= '/'.$filename;	

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratPengalihanHakPenemuan($filename){
    	$path = storage_path().'/app/paten/surat_pengalihan_hak_atas_penemuan';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratKepemilikanInventor($filename){
    	$path = storage_path().'/app/paten/bukti_pemilikan_hak_atas_penemuan_inventor';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenSuratKepemilikanLembaga($filename){
    	$path = storage_path().'/app/paten/bukti_pemilikan_hak_atas_penemuan_lembaga';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenDokumenSubtantifDeskripsi($filename){
    	$path = storage_path().'/app/paten/uraian_file';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }

    public function getPatenDokumenSubtantifGambar($filename){
    	$path = storage_path().'/app/paten/gambar';
    	$path .= '/'.$filename;

	    if(!File::exists($path)) return abort('400');

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
    }


}
