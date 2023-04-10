<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidateModel;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->CandidateModel = new CandidateModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'candidate' => $this->CandidateModel->allData(),
        ];

        return view('candidate', $data);
    }

    //CARA MENGAMBIL DATA SATU KOLOM
    public function detail($id_klien)
    {
        if (!$this->CandidateModel->detailData($id_klien)) {
            abort(404);
        }

        $data = [
            'candidate' => $this->CandidateModel->detailData($id_klien)
        ];
        return view('detail', $data);
    }

    public function edit($id_klien)
    {
        if (!$this->CandidateModel->detailData($id_klien)) {
            abort(404);
        }

        $data = [
            'candidate' => $this->CandidateModel->detailData($id_klien)
        ];

        return view('edit', $data);
    }

    public function update($id_klien)
    {
        //CONTOH VALIDASI
        Request()->validate(
            [
                //Contoh di bawah ini
                // 'title' => 'required|unique:posts|max:255',
                'nama_perusahaan' => 'required',
                'email' => 'required',
                'kontak' => 'required',
                'alamat' => 'required',
                'keterangan' => 'required',

            ],
            [
                'nama_perusahaan.required' => 'kolom ini wajib diisi',
                'email.required' => 'kolom ini wajib diisi',
                'kontak.required' => 'kolom ini wajib diisi',
                'alamat.required' => 'kolom ini wajib diisi',
                'keterangan.required' => 'kolom ini wajib diisi'
            ]
        );
        //CONTOH INSERT DATA
        //CONTOH SIMPAN DATA KE FOLDER YANG ADA DI PERANGKAT
        //   $file = Request()->file_pendukung;
        //  $fileName = Request()->nama_perusahaan . '.' . $file->extension();
        //  $file->move(public_path('file_pendukung'), $fileName);
        // SAMPE SINI

        $data = [
            'nama_perusahaan' => Request()->nama_perusahaan,
            'email' => Request()->email,
            'kontak' => Request()->kontak,
            'alamat' => Request()->alamat,
            'keterangan' => Request()->keterangan,

        ];

        $this->CandidateModel->editData($id_klien, $data);
        return redirect()->route('candidate')->with('pesan', 'Data berhasil diupdate');
    }

    public function delete($id_klien)
    {
        //SKRIP AGAR FOTO/DOKUMEN YANG TERSIMPAN DI FOLDER IKUT KEHAPUS
        // $candidate =$this->CandidateModel->deleteData($id_klien);
        //FOTO_PROFIL = NAMA FIELD    if ($candidate->foto_profil<>"") {
        //(FOTO_PROFIL) = NAMA FOLDER unlink(public_path('foto_profil').'/'. $candidate->foto_profil);
        //  }

        $this->CandidateModel->deleteData($id_klien);
        return redirect()->route('candidate')->with('pesan', 'Data berhasil di Hapus!');
    }
}
