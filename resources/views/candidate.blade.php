@extends('layout.template')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Candidate</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Candidate</li>
    </ol>
    <!--
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        -->

    <div class="d-flex justify-content-md-end">
        <form class="d-flex " role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>

    <!--  @foreach($candidate as $item)
    <div class="card mt-3">
        <h5 class="card-header">{{$item->nama_perusahaan}}</h5>
        <div class="card-body">
            <h5 class="card-title">Dibutuhkan Programer</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="datatabel.html"><button class="btn btn-primary me-md-2" type="button"> View Data </button></a>
            </div>
        </div>
    </div>
    @endforeach -->

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4><i class="icon fa fa-check"></i>Sukses</h4>
        {{session('pesan')}}
    </div>
    @endif

    <table class="table table-border">
        <thead>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>email</th>
                <th>kontak</th>
                <th>alamat</th>
                <th>keterangan</th>
                <th>deskripsi kebutuhan</th>
                <th>email</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($candidate as $item)

            <td></td>
            <td>{{$item->nama}} </td>
            <td>{{$item->email}} </td>
            <td>{{$item->kontak}} </td>
            <td>{{$item->alamat}} </td>
            <td>{{$item->keterangan}} </td>

            <!--CARA MENGAMBIL DATA 1 KOLOM -->
            <td> <a href="/candidate/detail/{{$item->id_klien}} " class="btn btn-primary">detail</a> </td>
            <td> <a href="/candidate/edit/{{$item->id_klien}} " class="btn btn-warning">edit</a> </td>
            <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id_klien }}">
                    Delete
                </button></td>

        </tbody>
        @endforeach
    </table>

    <!-- MODALLLLLLLLL -->
    @foreach($candidate as $item)

    <div class="modal fade" id="delete{{$item->id_klien}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$item->nama_perusahaan}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data ini...???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No..!</button>
                    <a href="/candidate/delete/{{$item->id_klien}}" type="button" class="btn btn-success">Yes..!</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    @endsection('content')