<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\KepalaSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function verifyEmail($id)
    {
        $kepsek = KepalaSekolah::find($id);

        $kepsekId = DB::table('email_verifications')
            ->where('user_id', $id);

        if (is_null($kepsekId) && is_null($kepsek->email_verified_at)) {
            return "link ini sudah tidak valid. Silakan kirim ulang";
        }
        $kepsek->email_verified_at = now();
        $kepsek->save();

        $kepsekId->delete();

        return "Success";
    }
}
