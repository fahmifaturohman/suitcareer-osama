<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardModel;
use App\Models\ProfilModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->DashboardModel = new DashboardModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth::user()->id;

        $cek = ProfilModel::where('id_users', $user_id)->count();

        if ($cek < 1) {
            $pesan = 'Mohon Lengkapi Profil terlebih dahulu';
        } else {
            $pesan = ' ';
        }

      
        $data = [
            'nama' => $this->DashboardModel->allData(),
            'data' => $this->DashboardModel->grafik_request_tahun($user_id),
            'databulan' => $this->DashboardModel->grafik_request_bulan($user_id),
            'datahari' => $this->DashboardModel->grafik_request_hari($user_id)
        ];
        return view('dashboard', compact('data', 'pesan'));
    }

    public function master_request() {
        $user_id = auth::user()->id;
        $data = [
            'request' => $this->DashboardModel->masterRequest($user_id)
        ];

        return view('master_request',  $data);
    }

    public function master_request_pending() {
        $user_id = auth::user()->id;
        $data = [
            'request' => $this->DashboardModel->masterRequestPending($user_id)
        ];
        return view('master_request_pending',  $data);
    }

    public function master_request_process() {
        $user_id = auth::user()->id;
        $data = [
            'request' => $this->DashboardModel->masterRequestProcess($user_id)
        ];

        return view('master_request_process',  $data);
    }

    public function master_request_success() {
        $user_id = auth::user()->id;
        $data = [
            'request' => $this->DashboardModel->masterRequestSuccess($user_id)
        ];

        return view('master_request_success',  $data);
    }


    public function master_candidate() {
        $user_id = auth::user()->id;
        $data = [
            'candidate' => $this->DashboardModel::masterCandidate($user_id)
        ];
        return view('master_candidate',  $data); 
        //echo json_encode($data);
    }

    public function klien_candidate_status(Request $request) {
        $request->validate([
            'id' => 'required',
            'status_candidate' => 'required',
        ]);

        $data = [
            'status_candidate' => $request->status_candidate,
        ];        
        $id_candidate = $request->id;
        $result = $this->DashboardModel::updateCandidate($id_candidate, $data);
       
        if($result > 0) {
            $res['status'] = 200;
            $res['success'] = true;
            $res['msg'] = "berhasil update status";
        }
        else {
            $res['status'] = 400;
            $res['success'] = false;
            $res['msg'] = "gagal update status";
        }        
        echo json_encode($res);
    }
}
