<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\DesainIndustri;

use Hash;
use Carbon\Carbon;

class ApiController extends Controller
{
	public function __construct(){
		$sites = array('postRegister', 'postLogin');

		$this->middleware('auth:api_pengusul', ['except' => $sites]);
	}

    public function postRegister(Request $request){
    	$biodata = new Biodata;
        $biodata->nama = $request->input('nama');
        $biodata->kewarganegaraan = $request->input('kewarganegaraan');
        $biodata->npwp = $request->input('npwp');
        $biodata->alamat = $request->input('alamat');
        $biodata->email = $request->input('email');
        $biodata->no_hp = $request->input('no_hp');
        $biodata->telepon_fax = $request->input('telepon_fax');
        $biodata->username = $request->input('username');
        $biodata->password = Hash::make($request->input('password'));
        $biodata->api_token = str_random(60);

        $biodata->save();

        return array(
	        	'status' => 'success',
	        	'data' => array(
	        			'user' => $biodata,
	        			'api_token' => $biodata->api_token
	        		)
	        	);
    }

    public function postLogin(Request $request){
    	$email = $request->input('email');
    	$password = $request->input('password');

    	$auth = auth('pengusul');

    	if($auth->attempt(array('email' => $email, 'password' => $password))){
        	return array(
        			'status' => 'success',
        			'data' => array(
        					'user' => $auth->user(),
        					'api_token' => $auth->user()->api_token
        				)
        		);
        }else{
        	return array(
        			'status' => 'error',
        			'message' => 'Authentication Failed'
        		);
        }

    }

    public function getDesainIndustri(){
    	$user_id = auth('api_pengusul')->user();
    	$desainIndustri = DesainIndustri::where('biodata_id', $user_id)->first();

    	return array(
    			'status' => 'success',
    			'data' => $desainIndustri
    			);
    }

    public function postDesainIndustri(Request $request){
    	$desainIndustri = new DesainIndustri;
        $desainIndustri->tanggal_permohonan = Carbon::now();
        $desainIndustri->tanggal_penerimaan = Carbon::now();
        $desainIndustri->nomor_permohonan = '';
        $desainIndustri->biodata_id = auth('api_pengusul')->user()->id;
        $desainIndustri->konsultan_hki = $request->input('konsultan_hki');

        if($request->input('konsultan_hki')){
            $desainIndustri->konsultan_hki_id = $request->input('konsultan_hki_id');
        }else{
            $desainIndustri->konsultan_hki_id = 1;
        }

        $desainIndustri->judul_desain_industri = $request->input('judul_desain_industri');
        $desainIndustri->hak_prioritas = $request->input('hak_prioritas');

        if($request->input('hak_prioritas')){
            $desainIndustri->negara = $request->input('negara');
            $desainIndustri->tanggal_penerimaan_permohonan_pertama_kali = $request->input('tanggal_penerimaan_permohonan_pertama_kali');
            $desainIndustri->nomor_prioritas = $request->input('nomor_prioritas');
        }
        
        //rev
        $desainIndustri->kelas_desain_industri = $request->input('kelas_desain_industri');

        $desainIndustri->save();

        return array(
        		'status' => 'success',
        		'data' => $desainIndustri
        		);
    }
}
