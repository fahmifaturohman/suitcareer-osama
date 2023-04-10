<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CandidateModel extends Model
{
    //use HasFactory;

    public function allData()
    {
        return DB::table('tbl_klien')->get();

        // return DB::table('tbl_klien')
        //    ->leftJoin('tbl_request', 'tbl_request.id_request', '=', 'tbl_klien.id_request')
        //     ->get();
    }

    //CARA MENGAMBIL DATA SATU KOLOM
    public function detailData($id_klien)
    {
        return DB::table('tbl_klien')->where('id_klien', $id_klien)->first();
    }

    public function editData($id_klien, $data)
    {
        return DB::table('tbl_klien')->where('id_klien', $id_klien)->update($data);
    }

    public function deleteData($id_klien)
    {
        return DB::table('tbl_klien')->where('id_klien', $id_klien)->delete();
    }

    public function joinData()
    {
    }
}
