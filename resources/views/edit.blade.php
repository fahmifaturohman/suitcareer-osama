@extends('layout.template')
@section('content')

<div class="container-fluid px-4">
    <div class="card-header text-center mt-4 mb-3">Hallo Gaes</div>

    <form action="/candidate/update/{{$candidate->id_klien}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-2">
            <div class="form-group">
                <label for=" ">Nama Perusahaan</label>
                <input name="nama_perusahaan" type="text" class="form-control" value="{{$candidate->nama_perusahaan}}" readonly>
                <div class="text-danger">
                    @error('nama_perusahaan')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 mt-2">
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" class="form-control " value="{{$candidate->email}}">
                <div class=" text-danger ">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 mt-2">
            <div class="form-group">
                <label for="">Kontak</label>
                <input name="kontak" type="text" class="form-control " value="{{$candidate->kontak}}">
                <div class=" text-danger ">
                    @error('kontak')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 mt-2">
            <div class="form-group">
                <label for="">Alamat</label>
                <input name="alamat" type="text" class="form-control " value="{{$candidate->alamat}}">
                <div class=" text-danger ">
                    @error('alamat')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 mt-4">
            <div class="form-group">
                <label for=" ">Deskripsi perusahaan</label>
                <input name="keterangan" class="form-control" value="{{$candidate->keterangan}}"></input>
                <div class=" text-danger">
                    @error('keterangan')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-4 d-flex justify-content-md-end form-group">
            <button class=" btn btn-primary me-md-2">Simpan</button>
        </div>
    </form>
</div>


@endsection