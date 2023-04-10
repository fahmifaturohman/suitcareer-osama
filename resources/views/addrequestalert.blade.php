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
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <h3><b>FORM TAMBAH REQUEST</b></h3>
            </div>
            <div class="alert alert-danger" role="alert">
                Silahkan lengkapi <a href="/profil" class="alert-link"> profile</a> terlebih dahulu, agar anda dapat melakukan request.
            </div>
        </form>
        </div>
</div>

@endsection('content')