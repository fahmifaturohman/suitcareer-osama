@extends('layout.template')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4 ">Data Candidate </h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active"> Data Candidate</li>
    </ol>
    <div class="card-custom mt-4 pb-4">
        <div class="table-responsive mt-2">
            <table id="dt-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kandidat</th>
                        <th scope="col">Cv</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Job</th>
                        <th scope="col">Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1;?>
                    @forelse ($candidate as $key)
                    <tr>
                        <td scope="row"><?=$no++?></td>
                        <td scope="row"><?=$key->nama_candidate?></td>
                        <td><a href="{{ asset('file_cv/'.$key->cv) }}" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                        <td scope="row"><?=$key->phone?></td>
                        <td scope="row"><?=$key->email?></td>
                        <td scope="row"><?=$key->alamat?></td>
                        <td scope="row"><?=$key->kebutuhan?></td>
                        <td scope="row"><?=$key->nama_perusahaan?></td>
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