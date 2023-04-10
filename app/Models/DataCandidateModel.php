<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataCandidateModel extends Model
{
    protected $table = 'tbl_candidate';

    public function addData($data)
    {
        return DB::table('tbl_candidate')->insert($data);
    }

    public function update_status_sukses($id, $user) {
        return DB::table('tbl_request')
            ->where('id', $id)
            ->update(['status' => "sukses", 'admin_id' => $user]);
    }


    public function masterCandidate() {
        return DB::table('tbl_candidate')
            ->leftJoin('tbl_request', 'tbl_candidate.id_request', '=', 'tbl_request.id')
            ->orderBy('tbl_candidate.id', 'DESC')
            ->get();
    }
}
