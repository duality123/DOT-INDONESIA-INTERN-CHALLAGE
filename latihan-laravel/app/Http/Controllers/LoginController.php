<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }
    public function autentikasi(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/siswa')->with(['success'=>'selamat datang admin !']);
        }
 
        return back()->with('loginError','login gagal pastikan kredensial anda benar');
    }
    public function logout(Request $request){
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login')->with(['success'=>'anda berhasil logout !']);;
    }
}