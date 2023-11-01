<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'keterangan',
        'login',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getUsernameAttribute(){
        return $this->user->username ?? 'user';
    }

}
