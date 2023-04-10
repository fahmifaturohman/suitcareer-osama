@extends('layout.template')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 ">Request </h1>
    <ol class="breadcrumb mb-4 mb-3">
        <li class="breadcrumb-item "><b>Option</b></li>
        <li class="breadcrumb-item "><a href="/request">Request</a></li>
        <li class="breadcrumb-item active ">Request Add</li>
    </ol>

    <div class="card-custom">
        <div class="col-md-12 p-3">
        <form action="{{ url('request/insert',\Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h3><b>FORM TAMBAH REQUEST</b></h3>
            </div>

            <div class="mb-3 mt-5">
                <div class="form-group">
                    <label for=" ">Nama Perusahaan</label>
                    <input name="nama_perusahaan" type="text" class="form-control" value="{{$dt->nama_perusahaan}}" placeholder=" {{ $dt->nama_perusahaan }}">
                    <div class=" text-danger ">
                        @error('nama_perusahaan')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-2">
                <div class="form-group">
                    <label for="">Kebutuhan</label>
                    <input name="kebutuhan" type="text" class="form-control " value="{{old('kebutuhan')}}">
                    <div class=" text-danger ">
                        @error('kebutuhan')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <div class=" mb-3 mt-2">
                <div class="form-group">
                    <label for="">File Pendukung (Opsional)</label>
                    <input name="file_pendukung" type="file" class="form-control" value="{{old('file_pendukung')}}">
                    <div class=" text-danger">
                        @error('deskripsi_kebutuhan')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-4">
                <div class="form-group">
                    <label for=" ">Deskripsi singkat kebutuhan</label>
                    <textarea name="deskripsi_kebutuhan" class="form-control " rows="5" value="{{old('deskripsi_kebutuhan')}}"></textarea>
                    <div class=" text-danger">
                        @error('deskripsi_kebutuhan')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4 d-flex pt-3">
                <button class=" btn btn-primary me-md-2 btn-block col-3">Simpan</button>
            </div>
        </form>
        </div>
</div>

@endsection('content')