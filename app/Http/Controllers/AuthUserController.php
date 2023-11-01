<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function index(){
        $dateNow = Carbon::now();
        return view('index', compact('dateNow'));
    }
    public function login(Request $request){
        $request->validate(['username' => 'required', 'password' => 'required']);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            if(Auth::user()->is_admin){
                $this->createLog('admin login');
                return redirect()->route('admin.index')->with('success', 'berhasil login');
            }elseif(Auth::user()->posisi_parkir == 1){
                $this->createLog('admin login');
                return redirect()->route('parkir.masuk')->with('success', 'berhasil login');
            }elseif(Auth::user()->posisi_parkir == 2){
                $this->createLog('admin login');
                return redirect()->route('parkir.keluar')->with('success', 'berhasil login');
            }
            return redirect()->route('login')->with('success', 'gagal login');
        }
        return redirect()->route('login')->with('warning', 'User dan password salah');
    }
    public function logoutUser(Request $request){
        $this->createLog('admin logout');
        Auth::logout();
        return redirect()->route('login')->with('warning', 'User dan password salah');
    }
}
