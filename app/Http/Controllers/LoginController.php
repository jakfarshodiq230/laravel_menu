<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MenuModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('Login.Login-aplikasi');
    }


    public function postlogin(Request $request){
        if(FacadesAuth::attempt($request->only('email','password'))){
            return view('/home');
        }    
        return redirect('/login');
    }

    public function logout(){
        FacadesAuth::logout();
        return redirect ('/login');
    }

    public function registrasi(){
        return view('Login.registrasi');
    }

    public function simpanregistrasi(Request $request){
        // dd($request->all());
        $hakases= ' ';
        if($request->level =='admin'){
           $hakases= '1,2,3,4';     
        }elseif($request->level =='dosen'){
            $hakases='1,3';
        }else{
            $hakases='1,4';
        }
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'jlur_akses' => $hakases,
        ]);

        return view('/login.login-aplikasi');

    }
}
