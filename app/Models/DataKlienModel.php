<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataKlienModel extends Model
{
    //use HasFactory;

    public function allData()
    {
        return DB::table('profil')
            ->leftJoin('users', 'profil.id_users', '=', 'users.id')
            ->orderBy('profil.id', 'DESC')
            ->get();

        // return DB::table('tbl_klien')
        //    ->leftJoin('tbl_request', 'tbl_request.id_request', '=', 'tbl_klien.id_request')
        //     ->get();
    }
}
