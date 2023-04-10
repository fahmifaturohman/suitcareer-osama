<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCandidateModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class DataCandidateController extends Controller
{
    public function __construct()
    {
        $this->DataCandidateModel = new DataCandidateModel();
    }

    public function index($id)
    {
        $dt = DataCandidateModel::where('id_users')->get();
        $cek = DataCandidateModel::where('id_users')->count();

        return view('admin.detail_datarequest', compact('dt', 'cek'));
    }

    public function addcandidate()
    {
        return view('admin.add_candidate');
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'nama_candidate' => 'required',
            'phone' => 'required',
            'id_users' => 'required',
            'id_request' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'cv' => 'required|mimes:pdf,doc,docx'

        ]);
        //CONTOH simpan berupa file DATA
        $random = Str::random(5);
        $file = $request->file('cv');
        if ($file) {
            $file->move('file_cv', $random.'-'.$file->getClientOriginalName());
            $data['cv'] = 'file_cv/'.$random.'-'.$file->getClientOriginalName();
        }

        $data['id_users'] = (int) $request->id_users;
        $data['id_request'] = (int) $request->id_request;
        $data['nama_candidate'] = $request->nama_candidate;
        $data['phone'] = $request->phone;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] =  date('Y-m-d H:i:s');

       
      
    
        DataCandidateModel::insert($data);
        DataCandidateModel::update_status_sukses($data['id_request'],  Auth::user()->id);
        return redirect()->to('data_request/detail_datarequest/'.$request->id_request);

        //return redirect()->back('admin.data_request/detail_datarequest/'.$request->id_request)->with('pesan', 'Data berhasil ditambah');
    }

    public function master_candidate() {
        $data = [
            'candidate' => $this->DataCandidateModel::masterCandidate()
        ];
        //echo json_encode($data);
        return view('admin.master_candidate',  $data);
    }
}
