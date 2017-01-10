<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function showLogin() {
    	return view('admin.login');
    }

    public function postLogin(Request $request) {
    	if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('web')->user();
            // dd($user);
            return redirect()->intended('admin/home')
                ->with('successMessage','Selamat Datang Administrator');
        }else{
            return back()
                ->withInput()
            	->with('errorMessage','Username atau Password Salah');
        }
    }

    public function getLogout() {
        Auth::guard('web')->logout();
        return redirect()->route('admin.getLogin')
                ->with('successMessage','Anda Berhasil Logout');
    }
}
