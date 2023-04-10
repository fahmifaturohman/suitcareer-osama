@extends('layout.template')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 ">Add Candidate </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item "><a href="/data_request">Daftar Request</a></li>
        <li class="breadcrumb-item"><a href="#" onclick="window.history.go(-1)">Detail Request</a></li>
        <li class="breadcrumb-item active "> Add Candidate</li>
    </ol>

    <div class="card-custom pt-3">
        <div class="col-md-12 p-3">
            <div class="col-md-12 mb-4"><h5>Form Add Candidate</h5></div>
            <form action="{{url('data_request/detail_datarequest/insert')}}" method="POST" enctype="multipart/form-data">
                @csrf

               
                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for=" ">Nama Perusahaan</label>
                        <input type="hidden" name="id_users" value="{{$request->id_users}}">
                        <input type="text" class="form-control" value="{{$request->nama_perusahaan}}" readonly>             
                    </div>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for=" ">Request Job</label>
                        <input type="hidden" name="id_request" value="{{$request->id}}">
                        <input type="text" class="form-control" value="{{$request->kebutuhan}}" readonly>             
                    </div>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for=" ">Nama Candidate</label>
                        <input name="nama_candidate" type="text" class="form-control" value="{{old('nama_candidate')}}">
                        <div class="text-danger">
                            @error('nama_candidate')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input name="phone" type="text" class="form-control " value="{{old('phone')}}">
                        <div class=" text-danger ">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" type="text" class="form-control " value="{{old('email')}}">
                        <div class=" text-danger ">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-4">
                    <div class="form-group">
                        <label for=" ">Alamat</label>
                        <textarea name="alamat" class="form-control " rows="3" value="{{old('alamat')}}"></textarea>
                        <div class=" text-danger">
                            @error('alamat')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for="">Upload Cv</label>
                        <input name="cv" type="file" class="form-control " value="{{old('cv')}}">
                        <div class=" text-danger ">
                            @error('cv')
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
    </div>
</div>

@endsection('content')