<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TemplateModel extends Model
{
    //use HasFactory;

    public function detailData($id_klien)
    {
        return DB::table('tbl_klien')->where('id_klien', $id_klien)->first();
    }
}
