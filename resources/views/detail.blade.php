@extends('layout.template')
@section('content')

<table class="table table-border">
    <thead>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>email</th>
            <th>kontak</th>
            <th>alamat</th>
            <th>keterangan</th>

        </tr>
    </thead>
    <tbody>

        <td>{{$candidate->id_klien}}</td>
        <td>{{$candidate->nama_perusahaan}} </td>
        <td>{{$candidate->email}} </td>
        <td>{{$candidate->kontak}} </td>
        <td>{{$candidate->alamat}} </td>
        <td>{{$candidate->keterangan}} </td>

    </tbody>

</table>

@endsection