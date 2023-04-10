<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRequestModel;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->DataRequestModel = new DataRequestModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'data' => $this->DataRequestModel->grafik_request_tahun(),
            'databulan' => $this->DataRequestModel->grafik_request_bulan(),
            'datahari' => $this->DataRequestModel->grafik_request_hari()
        ];
        //echo json_encode($data);
        return view('admin.dashboard_admin', $data);
    }
}
