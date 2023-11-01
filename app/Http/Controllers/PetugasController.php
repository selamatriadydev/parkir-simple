<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\Petugas;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function masuk()
    {
        $parkir = Parking::where('status',1)->paginate(10);
        $jmlParkir = Parking::count();
        $sisaParkir = 200-$jmlParkir;
        $jenis = Type::get();
        return view('petugas.masuk', compact('parkir', 'sisaParkir','jmlParkir', 'jenis'));
    }
    public function masukNew(Request $request){
        $kode = "EP" . rand(100,999);
        $data = [
            'user_id' => auth()->user()->id,
            'jenis_id' => $request->jenis,
            'kode' => $kode,
            'plat_nomor' =>$request->plat_nomor,
            'merk' =>$request->merk,
            'jam_masuk'=> Carbon::now(),
            'status' => '1'
        ];
        Parking::create($data);
        $this->createLog('kendaraan masuk baru');
        return redirect()->route('parkir.masuk')->with('success', 'berhasil tambah');
    }
    public function keluar()
    {
        $parkir = Parking::where('status',0)->paginate(10);
        $jmlParkir = Parking::count();
        $sisaParkir = 200-$jmlParkir;
        $parkirDetail = "";
        return view('petugas.keluar', compact('parkir', 'sisaParkir','jmlParkir','parkirDetail'));
    }
    public function keluarDetail(Request $request){
        $kode = $request->kode;
        $parkir = Parking::where('status',0)->paginate(10);

        $jmlParkir = Parking::count();
        $parkirDetail = Parking::where('kode', $kode)->first();

        $startTime = Carbon::parse($parkirDetail->jam_masuk);
        $endTime = Carbon::now();
        $hoursDifference = $endTime->diffInHours($startTime);
        $bayar = $hoursDifference*2000;

        return view('petugas.keluar', compact('parkir', 'sisaParkir','jmlParkir','parkirDetail', 'bayar'));
    }
    public function keluarDetailSubmit(Request $request){
        $kode = $request->kode_bayar;
        $parkirDetail = Parking::where('kode', $kode)->first();
        $startTime = Carbon::parse($parkirDetail->jam_masuk);
        $endTime = Carbon::now();
        $hoursDifference = $endTime->diffInHours($startTime);
        // $bayar = $hoursDifference*2000;
        $parkirDetail->hitung_jam_masuk = $hoursDifference;
        $parkirDetail->jam_keluar = Carbon::now();
        $parkirDetail->status = '0';
        $parkirDetail->save();
        $this->createLog('kendaraan keluar baru');
        return redirect()->route('parkir.keluar')->with('success', 'berhasil keluar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas)
    {
        //
    }
}
