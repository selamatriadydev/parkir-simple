<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createLog($keterangan){
        $data = [
            'user_id' => auth()->user()->id,
            'keterangan' => $keterangan,
            'login' => Carbon::now(),
        ];
        LogActivity::create($data);
    }
}
