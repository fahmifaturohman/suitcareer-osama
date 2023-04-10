@extends('layout.template')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4 ">Data Klien </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active"> Data Klien</li>
    </ol>
    <div class="card-custom mt-4 pb-4">
        <div class="table-responsive mt-2">
            <table id="dt-table" class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Klien</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">alamat</th>
                        <th scope="col">Tentang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1;?>
                @forelse ($klien as $key)
                    <tr>
                        <td scope="row"><?=$no++?></td>
                        <td scope="row"><?=$key->name?></td>
                        <td scope="row"><?=$key->nama_perusahaan?></td>
                        <td scope="row"><?=$key->kontak?></td>
                        <td scope="row"><?=$key->alamat?></td>
                        <td><?=$key->deskripsi?></td>
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