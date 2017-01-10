<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mapel;
use App\Guru;
use App\Kelas;
use App\Siswa;

class HomeController extends Controller
{
    public function index() {
    	return view('admin.home');
    }
}
