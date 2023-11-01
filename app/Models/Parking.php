<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','jenis_id','kode','plat_nomor', 'merk', 'jam_masuk', 'jam_keluar', 'hitung_jam_masuk', 'status'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function type(){
        return $this->hasOne(Type::class, 'id', 'jenis_id');
    }

    public function getUsernameAttribute(){
        return $this->user->username ?? 'user';
    }
    public function getJenisAttribute(){
        return $this->type->name ?? '';
    }
    public function getMasukAttribute(){
        return Carbon::parse($this->jam_masuk)->format('d-m-Y H:i');
    }
    public function getKeluarAttribute(){
        return Carbon::parse($this->jam_keluar)->format('d-m-Y H:i');
    }
    public function getStatusParkirAttribute(){
        return $this->status == 1 ? 'Parkir' : 'Keluar';
    }

}
