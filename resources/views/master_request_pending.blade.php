@extends('layout.template')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4 ">Request Pending </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Request Pending</li>
    </ol>
    <div class="card-custom mt-4 pb-4">
        <div class="table-responsive mt-2">
            <table id="dt-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Kebutuhan</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Pendukung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1;?>
                    @forelse ($request as $key)
                    <tr>
                        <td scope="row"><?=$no++?></td>
                        <td scope="row"><?=$key->nama_perusahaan?></td>
                        <td scope="row"><?=$key->kebutuhan?></td>
                        <td scope="row"><?=$key->deskripsi_kebutuhan?></td>
                        <td><a href="{{ asset('file_pendukung/'.$key->file_pendukung) }}" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
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
            paging: true,
            ordering: true,
            info: true,
        });
    });
</script>


 @endsection('content')