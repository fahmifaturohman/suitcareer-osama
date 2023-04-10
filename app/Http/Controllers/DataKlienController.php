<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKlienModel;

class DataKlienController extends Controller
{
    public function __construct()
    {
        $this->DataKlienModel = new DataKlienModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'klien' => $this->DataKlienModel->allData(),
        ];
        
        return view('admin.data_klien', $data);
    }
}
