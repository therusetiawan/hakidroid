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

class GenerateFileController extends Controller
{
    public function getFileHakCipta(){
    	$data = HakCipta::where('id', 1)->first();
    	$pdf = PDF::loadView('formulir.cipta', $data);
		return $pdf->download('test.pdf');
    }

    public function getFileMerek(){
    	$data = HakCipta::where('id', 1)->first();
    	$pdf = PDF::loadView('formulir.merk', $data);
		return $pdf->download('test.pdf');
    }

    public function getFilePaten(){
    	$data = HakCipta::where('id', 1)->first();
    	$pdf = PDF::loadView('formulir.paten', $data);
		return $pdf->download('test.pdf');
    }

    public function getFileDesainIndustri(){
    	$data = HakCipta::where('id', 1)->first();
    	$pdf = PDF::loadView('formulir.ajuanindustri', $data);
		return $pdf->download('test.pdf');
    }
}
