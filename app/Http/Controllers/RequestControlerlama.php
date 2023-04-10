<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use App\Models\RequestModel;
use Illuminate\Support\Facades\Auth;

class RequestControler extends Controller
{
    public function __construct()
    {
        $this->RequestModel = new RequestModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'request' => $this->RequestModel->allData(),
        ];

        return view('request',  $data);
    }

    public function add()
    {
        return view('addrequest');
    }

    public function insert()
    {
        //CONTOH VALIDASI
        Request()->validate(
            [
                //Contoh di bawah ini
                // 'title' => 'required|unique:posts|max:255',
                'nama_perusahaan' => 'required',
                'kebutuhan' => 'required',
                'file_pendukung' => 'mimes:jpg,jpeg,png,doc,pdf,docx',
                'deskripsi_kebutuhan' => 'required',

            ],
            [
                'nama_perusahaan.required' => 'kolom ini wajib diisi',
                'kebutuhan.required' => 'kolom ini wajib diisi',
                'deskripsi_kebutuhan.required' => 'kolom ini wajib diisi'
            ]
        );
        //CONTOH INSERT DATA
        $file = Request()->file_pendukung;
        $fileName = Request()->nama_perusahaan . '.' . $file->extension();
        $file->move(public_path('file_pendukung'), $fileName);

        $data = [
            'nama_perusahaan' => Request()->nama_perusahaan,
            'kebutuhan' => Request()->kebutuhan,
            'file_pendukung' => $fileName,
            'deskripsi_kebutuhan' => Request()->deskripsi_kebutuhan,
        ];

        $this->RequestModel->addData($data);
        return redirect()->route('request')->with('pesan', 'Data berhasil ditambah');
    }
}
