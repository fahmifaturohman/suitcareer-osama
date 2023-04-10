<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class DashboardModel extends Model
{
    //use HasFactory;

    public function allData()
    {
        return [
            [
                'nama' => 'osama',
                'mapel' => 'bahasa arab',
                'alamat' => 'enggal'
            ],
            [
                'nama' => 'jono',
                'mapel' => 'bahasa arab',
                'alamat' => 'enggal'
            ]
        ];
    }

    public function grafik_request_tahun($id) {
        return DB::select('SELECT YEAR(created_at) tahun, COUNT(YEAR(created_at)) jumlah FROM tbl_request WHERE id_users = '.$id.' GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) DESC LIMIT 10');
    }

    public function grafik_request_bulan($id) {
        return DB::select('SELECT MONTH(created_at) bulan, COUNT(MONTH(created_at)) jumlah FROM tbl_request WHERE YEAR(created_at) = YEAR(NOW()) AND id_users = '.$id.' GROUP BY MONTH(created_at) ORDER BY MONTH(created_at) ASC');
    }

    public function grafik_request_hari($id) {
        return DB::select('SELECT DATE(created_at) tanggal, COUNT(DATE(created_at)) jumlah FROM tbl_request WHERE MONTH(created_at) = MONTH(NOW()) AND id_users = '.$id.' GROUP BY DATE(created_at) ORDER BY DATE(created_at) ASC');
    }

    public function masterRequest($id) {
        return DB::table('tbl_request')
            ->where('id_users', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestPending($id) {
        return DB::table('tbl_request')
            ->where(['id_users' => $id,'status' => 'pending'])
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestProcess($id) {
        return DB::table('tbl_request')
            ->where(['id_users' => $id,'status' => 'proses'])
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function masterRequestSuccess($id) {
        return DB::table('tbl_request')
            ->where(['id_users' => $id,'status' => 'sukses'])
            ->orderBy('id', 'DESC')
            ->get();
    }


    public function masterCandidate($id) {
        return DB::table('view_cadidate')
            ->where('id_users', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function updateCandidate($id, $data)
    {
        return DB::table('tbl_candidate')->where('id', $id)->update($data);
    }
}
