@extends('layout.template')

@section('content')


<div class="container-fluid px-4 ">
    <h1 class="mt-4 ">Profile </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item "><a href="/profil">Dashboard</a></li>
        <li class="breadcrumb-item active ">Profile</li>
    </ol>



    <!-- <div class="card text-center">
        <div class="card-header">
            <h5> Profil Klien </h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div> -->

    <div class="card-custom">
        <div class="col-md-12 p-3">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h4><i class="icon fa fa-check"></i>Sukses</h4>
            {{session('pesan')}}
        </div>
        @endif

        @if($cek < 1 ) <!-- $cek terdapat pada ProfilController-->

            <form method="POST" action="{{ url('profil',\Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card text-center">
                    <div class="justify-conten-center mt-3">
                        <img src="{{url('foto_profil/default.png')}}" class="card-img-top rounded-circle " style="width:130px; height: 117px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ Auth::user()->name }}</h5>{{ Auth::user()->email }}
                        <p class="card-text">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->name }}">
                    <div class=" text-danger">
                        @error('nama_perusahaan')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <div class=" text-danger">
                        @error('alamat')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->email }}">
                    <div class=" text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kontak</label>
                    <input type="text" name="kontak" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    <div class=" text-danger">
                        @error('kontak')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="">upload Foto</label>
                    <input name="foto" type="file" class="form-control">
                    <div class=" text-danger">
                        @error('deskripsi_kebutuhan')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi singkat perusahaan</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class=" text-danger">
                        @error('deskripsi')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class=" mb-4 d-flex justify-content-md-end d-grid gap-2 ">
                    <button class=" btn btn-primary me-md-2" type="submit">Simpan</button>
                </div>
            </form>

            @else

            <form method="POST" action="{{ url('profil',\Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('put')}}
                <div class="card text-center">
                    <div class="justify-conten-center mt-3">
                        <img src="{{asset('foto_profil/'.$dt->foto)}}" class="card-img-top rounded-circle " style="width:130px; height: 117px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ Auth::user()->name }}</h5>{{ Auth::user()->email }}
                        <p class="card-text">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama perusahaan</label>
                    <input type="text" name="nama_perusahaan" class="form-control" id="exampleFormControlInput1" value="{{ $dt->nama_perusahaan }}">
                    <div class=" text-danger">
                        @error('nama_perusahaan')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$dt->alamat}}">
                    <div class=" text-danger">
                        @error('alamat')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->email }}">
                    <div class=" text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kontak</label>
                    <input type="text" name="kontak" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$dt->kontak}}">
                    <div class=" text-danger">
                        @error('kontak')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class=" mb-3">
                    <label for="">upload Foto</label>
                    <input name="foto" type="file" class="form-control">
                    <div class=" text-danger">
                        @error('deskripsi_kebutuhan')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi singkat perusahaan</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3">{{$dt->deskripsi}}</textarea>
                    <div class=" text-danger">
                        @error('deskripsi')
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <div class=" mb-4 d-flex justify-content-md-end d-grid gap-2 ">
                    <button class=" btn btn-primary me-md-2" type="submit">update</button>
                </div>
            </form>
            @endif
        </div>
    </div>

</div>


@endsection('content')