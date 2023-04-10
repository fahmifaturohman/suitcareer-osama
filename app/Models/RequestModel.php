<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RequestModel extends Model
{
    protected $table = 'tbl_request';

    // public function allData()
    //{
    //   return DB::table('tbl_request')->get();

    // }

    // public function addData($data)
    // {
    //      return DB::table('tbl_request')->insert($data);
    // }
}
