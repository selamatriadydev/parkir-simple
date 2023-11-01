<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\Petugas;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $petugas = Petugas::paginate(10);
        $activity = LogActivity::paginate(10);
        $type = Type::paginate(10);
        return view('admin.index', compact('petugas', 'activity', 'type'));
    }

    public function petugasBaru(Request $request){
        $request->validate([
            'nama'=>'required',
            'username' => 'required|unique:users,username', 
            'password' => 'required'
        ]);
        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->posisi == 1 ? 'Petugas Masuk' : 'Petugas Keluar'
        ];
        Petugas::create($data);
        $dataUser = [
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => Str::slug($request->nama)."@parkir.com",
            'posisi_parkir' => ($request->posisi == 1) ? 1 : 2
        ];
        User::create($dataUser);
        $this->createLog('admin buat petugas baru');
        return redirect()->route('admin.index')->with('success', 'berhasil login');
    }
    public function typeBaru(Request $request){
        $request->validate([
            'nama'=>'required',
        ]);
        $data = [
            'name' => $request->nama,
            'keterangan' => $request->ket
        ];
        Type::create($data);
        $this->createLog('admin buat type baru');
        return redirect()->route('admin.index')->with('success', 'berhasil login');
    }


}
