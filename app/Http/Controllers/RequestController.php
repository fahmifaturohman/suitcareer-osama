<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestModel;
use App\Models\ProfilModel;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->RequestModel = new RequestModel();
        $this->ProfilModel  = new ProfilModel();
    }

    public function index()
    {
        $dt = RequestModel::where('id_users', Auth::user()->id)->orderBy('id','desc')->get();
        $cek = RequestModel::where('id_users', Auth::user()->id)->count();

        return view('request', compact('dt', 'cek'));
    }

    public function add()
    {
        $dt = ProfilModel::where('id_users', Auth::user()->id)->first();
        if(is_object($dt)) {
            return view('addrequest', compact('dt'));
        }
        else {
            return view('addrequestalert', compact('dt'));
        }
        
    }

    public function insert(Request $request, $id)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'kebutuhan' => 'required',
            'file_pendukung' => 'required',
            'deskripsi_kebutuhan' => 'required',
        ]);
        //CONTOH simpan berupa file DATA
        $file = Request()->file_pendukung;
        $fileName = Request()->nama_perusahaan . '.' . $file->extension();
        $file->move(public_path('file_pendukung'), $fileName);

        $data['id_users'] = $id;
        $data['nama_perusahaan'] = $request->nama_perusahaan;
        $data['kebutuhan'] = $request->kebutuhan;
        $data['file_pendukung'] = $fileName;
        $data['deskripsi_kebutuhan'] = $request->deskripsi_kebutuhan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] =  date('Y-m-d H:i:s');

        RequestModel::insert($data);

        return redirect()->route('request')->with('pesan', 'Data Request berhasil ditambah');
    }
}
