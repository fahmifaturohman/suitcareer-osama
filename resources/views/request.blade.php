@extends('layout.template')
@section('content')



<div class="container-fluid px-4 ">
    <h1 class="mt-4 ">Request </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item "><b>Option</b></li>
        <li class="breadcrumb-item "><a href="/request">Request</a></li>
        <li class="breadcrumb-item active ">List Request</li>
    </ol>
    

    <div class="d-flex mb-3">
        <a href="/request/add" class="btn btn-primary me-auto p-2">Add New</a>
<!-- 
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form> -->
    </div>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4><i class="icon fa fa-check"></i>Sukses</h4>
        {{session('pesan')}}
    </div>
    @endif

    @forelse ($dt as $item)
    <div class="card-custom mt-3">
        <div class="row card-header bg-defualt">
            <div class="col-11">
            <h5 class="t">{{$item->nama_perusahaan}}</h5>
            </div>
            <div class="col-1 float-right text-right pull-right align-content-lg-end">
            @if($item->status == 'pending') <span class="badge bg-danger"><i class="fa fa-clock"></i> pending</span>
            @elseif($item->status == 'proses') <span class="badge bg-warning text-black"><i class="fa fa-spinner"></i> diproses . .</span>
            @elseif($item->status == 'sukses') <span class="badge bg-success"><i class="fa fa-check"></i> selesai</span>
            @endif
            </div>
        </div>
       
        <div class="card-body">
            <h5 class="card-title">{{$item->kebutuhan}}</h5>
            <p class="card-text">{{$item->deskripsi_kebutuhan}}</p>
            <p class="card-text">{{$item->created_at}}</p>
        </div>
    </div>
    @empty
    <div class="alert alert-danger">Data Request
        Belum tersedia</div>
    @endforelse



    <!--
      <table class="table table-border">
        <thead>
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>kebutuhan</th>
                <th>file Pendukung</th>
                <th>deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dt as $item)
            <th></th>
            <td>{{$item->nama_perusahaan}} </td>
            <td>{{$item->kebutuhan}} </td>
            <td>{{$item->file_pendukung}} </td>
            <td>{{$item->deskripsi_kebutuhan}} </td>

        </tbody>
        @endforeach
    </table>
-->

    @endsection('content')