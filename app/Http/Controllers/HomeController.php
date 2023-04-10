<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardModel;
use App\Models\ProfilModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->DashboardModel = new DashboardModel();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexadmin()
    {
        $user_id = auth::user()->id;
        $cek = ProfilModel::where('id_users', $user_id)->count();
        return view('admin.dashboard_admin', compact('cek', 'user_id'));
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
            'nama' => $this->DashboardModel->allData()

        ];
        return view('dashboard', compact('data', 'pesan'));
    }
}
