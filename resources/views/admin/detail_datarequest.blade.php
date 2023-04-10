@extends('layout.template')
@section('content')
<div class="container-fluid px-4 ">
    <h1 class="mt-4 ">Detail Request </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item "><a href="/data_request">Daftar Request</a></li>
        <li class="breadcrumb-item active "> Detail Request</li>
    </ol>

    <div class="card-custom">
        <div class="card-header bg-default">
            <h5> {{$request->nama_perusahaan}}</h5>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0" style="font-size:12px">
                <div class="row">
                    <div class="col-9">
                    Kebutuhan : {{$request->kebutuhan}} <br>
                    Persyaratan : {{$request->deskripsi_kebutuhan}}
                    </div>
                    <div class="col-3 pt-4">
                        <div class=" d-flex justify-content-end justify-content-evenly">
                        <br><a href="{{ asset('file_pendukung/'.$request->file_pendukung)}}"><button class="btn btn-success btn-sm mt-2 mb-2"><i class="fa fa-download"></i> file pendukung</button></a>
                        </div>
                    </div>
                </div>
                <p>
                    <br>
                    <br>
                </p>
                <footer class="blockquote-footer"> Publish <cite title="Source Title">{{$request->created_at}}</cite></footer>
            </blockquote>
        </div>
    </div>
    <div class="card-custom mt-4 pb-4">
        <div class="d-flex">
            <a href="/data_request/detail_datarequest/{{$request->id}}/add_candidate" class="btn btn-primary mt-3"> Add candidate</a>
        </div>
        <div class="table-responsive mt-2">
            <table id="dt-table" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">alamat</th>
                        <th scope="col">cv</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($candidate as $key)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$key->nama_candidate}}</td>
                        <td>{{ $key->email }}</td>
                        <td>{{$key->phone}}</td>
                        <td>{{$key->alamat}}</td>
                        <td><a href="{{ asset($key->cv) }}" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                        <td><a href="{{ '/master_request_delete/'.$key->id.'/'.$request->id }}" class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#dt-table').DataTable({
            paging: false,
            ordering: false,
            info: false,
        });
    });
</script>

@endsection('content')