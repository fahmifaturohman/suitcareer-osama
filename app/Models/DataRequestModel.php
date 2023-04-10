<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataRequestModel extends Model
{
    protected $table = 'tbl_candidate';

    public function allData()
    {
        return DB::table('tbl_request')
            ->orderBy('id', 'DESC')
            ->simplePaginate(3);
    }

    public function detailData($id)
    {
        return DB::table('tbl_request')->where('id', $id)->first();
    }

    public function addData($data)
    {
        return DB::table('tbl_candidate')->insert($data);
    }


    /* custom query */
    # pencarian request
    public function search_request($search) {
        return DB::table('tbl_request')->where('nama_perusahaan', 'LIKE', '%'.$search.'%')
        ->orWhere('kebutuhan', 'LIKE', '%'.$search.'%')
        ->orderBy('id', 'DESC')
        ->simplePaginate(3);
        //->get();
    }

    #update status dari pending ke proses
    public function update_status($id, $user) {
        return DB::table('tbl_request')
            ->where('id', $id)
            ->update(['status' => "proses", 'admin_id' => $user]);
    }

    public function get_candidate_request($id) {
        return DB::table('tbl_candidate')
            ->where('id_request', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequest() {
        return DB::table('tbl_request')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestPending() {
        return DB::table('tbl_request')
            ->where('status', 'pending')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestProcess() {
        return DB::table('tbl_request')
            ->where('status', 'proses')
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestSuccess() {
        return DB::table('tbl_request')
            ->where('status', 'sukses')
            ->orderBy('id', 'DESC')
            ->get();
    }


    #get 1 row candidate
    public function getRowCandidate($id) {
        return DB::table('tbl_candidate')->where('id', $id)->first();
    }

    public function grafik_request_tahun($limit = 10) {
        return DB::select('SELECT YEAR(created_at) tahun, COUNT(YEAR(created_at)) jumlah FROM tbl_request GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) DESC LIMIT '.$limit);
    }

    public function grafik_request_bulan() {
        return DB::select('SELECT MONTH(created_at) bulan, COUNT(MONTH(created_at)) jumlah FROM tbl_request WHERE YEAR(created_at) = YEAR(NOW()) GROUP BY MONTH(created_at) ORDER BY MONTH(created_at) ASC');
    }

    public function grafik_request_hari() {
        return DB::select('SELECT DATE(created_at) tanggal, COUNT(DATE(created_at)) jumlah FROM tbl_request WHERE MONTH(created_at) = MONTH(NOW()) GROUP BY DATE(created_at) ORDER BY DATE(created_at) ASC');
    }
    
}
