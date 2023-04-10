<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateModel;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->TemplateModel = new TemplateModel();
        $this->middleware('auth');
    }



    //CARA MENGAMBIL DATA SATU KOLOM
    public function index($id_klien)
    {
        if (!$this->TemplateModel->detailData($id_klien)) {
            abort(404);
        }

        $data = [
            'candidate' => $this->TemplateModel->detailData($id_klien)
        ];
        return view('profil', $data);
    }
}
