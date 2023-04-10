@extends('layout.template')
@section('content')

<div class="container-fluid px-4 ">
    <h1 class="mt-4 ">Daftar Request </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item "><a href="/dashboard_admin">Dashboard</a></li>
        <li class="breadcrumb-item active "> Daftar Request</li>
    </ol>

    <div class="d-flex flex-row-reverse">
        <form class="d-flex" role="search" action="{{ route('search') }}" method="GET" enctype="multipart/form-data">
            <div class="p-2"><input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"></div>
            <div class="p-2"><button class="btn btn-primary" type="submit">Search</button></div>
        </form>
    </div>

    @forelse ($datarequest as $item)

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
        <div class="card-body mb-1">
            <h5 class="card-title">{{$item->kebutuhan}}</h5>
            <div class="row">
                <div class="col-8">
                    <p class="card-text">{{$item->deskripsi_kebutuhan}}                        
                    </p>
                    <span class="badge bg-success p-2">{{ date('Y M D H:i:s', strtotime($item->created_at)) }}</span>
                </div>
                <div class="col-4">
                    <div class=" d-flex justify-content-end">
                        <a href="/data_request/detail_datarequest/{{$item->id}}" class="btn btn-primary"> view detail </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="alert alert-danger">Data Request
        Belum tersedia</div>
    @endforelse


    
    <div class="mt-5">
    {{ $datarequest->links() }} <p></p>
    Halaman : {{ $datarequest->currentPage() }} <br>
    Data Per Halaman: {{ $datarequest->perPage() }} <br>
    </div>
   
    

    @endsection('content')