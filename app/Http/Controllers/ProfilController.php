<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilModel;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {
        $dt = ProfilModel::where('id_users', Auth::user()->id)->first();
        $cek = ProfilModel::where('id_users', Auth::user()->id)->count();
        //echo \json_encode(compact('dt'));
        return view('profil', compact('dt', 'cek'));
    }

    public function insert(Request $request, $id)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024'

        ]);
        //CONTOH simpan berupa file DATA
        $file = Request()->foto; //nama foto ambil dari name pada form input
        $fileName = Request()->nama_perusahaan . '.' . $file->extension();
        $file->move(public_path('foto_profil'), $fileName);

        $data['id_users'] = $id;
        $data['nama_perusahaan'] = $request->nama_perusahaan;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['kontak'] = $request->kontak;
        $data['foto'] = $fileName;
        $data['deskripsi'] = $request->deskripsi;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] =  date('Y-m-d H:i:s');

        ProfilModel::insert($data);

        return redirect()->back()->with('pesan', 'Data berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:1024'
        ]);

        //CONTOH simpan berupa file DATA
        $file = Request()->foto;
        $fileName = Request()->nama_perusahaan . '.' . $file->extension();
        $file->move(public_path('foto_profil'), $fileName);

        $data['nama_perusahaan'] = $request->nama_perusahaan;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['kontak'] = $request->kontak;
        $data['deskripsi'] = $request->deskripsi;
        $data['foto'] = $fileName;
        $data['updated_at'] =  date('Y-m-d H:i:s');

        ProfilModel::where('id_users', $id)->update($data);

        return redirect()->back()->with('pesan', 'Data berhasil diupdate');
    }
    //CARA MENGAMBIL DATA SATU KOLOM
    //public function index()
    //{
    //  if (!$this->ProfilModel->getData()) {
    //      abort(404);
    //  }

    //   $data = [

    //      'candidate' => $this->ProfilModel->getData()
    //   ];
    //   return view('profil', $data);
    // }
}
