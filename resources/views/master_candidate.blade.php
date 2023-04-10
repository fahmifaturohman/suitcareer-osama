@extends('layout.template')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4 ">Candidate</h1>
    <ol class="breadcrumb mb-4 mb-3  ">
        <li class="breadcrumb-item active"> Candidate</li>
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
                        <th scope="col">Status</th>
                </thead>
                <tbody>
                    <?php $no =1;?>
                    @forelse ($candidate as $key)
                    <tr>
                        <td scope="row"><?=$no++?></td>
                        <td scope="row"><?=$key->nama_candidate?></td>
                        <td><a href="{{ asset($key->cv) }}" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                        <td scope="row"><?=$key->phone?></td>
                        <td scope="row"><?=$key->email?></td>
                        <td scope="row"><?=$key->alamat?></td>
                        <td scope="row"><?=$key->kebutuhan?></td>
                        <td scope="row">
                            <button class="btn btn-primary btn-sm btn-status" data-id= "<?=$key->id?>" data-isi = "<?=$key->nama_candidate?>"><?=$key->status_candidate?></button>
                        </td>
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

        $('.btn-status').click(function(e) {
            let id = $(this).attr('data-id')
            let isi = $(this).attr('data-isi')
            console.log(id)
            Swal.fire({
                title: `Update Status Candidate (${isi})`,
                input: 'text',
                inputAttributes: {
                autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Update',
                showLoaderOnConfirm: true,
                preConfirm: (statuscandidate) => {
                    $.ajax({
                        dataType: "json",
                        type:"POST",
                        data:{
                            "_token": "{{ csrf_token() }}",
                            "id":id,
                            "status_candidate": statuscandidate
                        },
                        url: "klien_candidate_status",
                        beforeSend: function(){
                            //loading();
                        },
                        success: function(res) {
                            if(res['success'] == true) {
                                toastNotify(res['msg'])
                                //setTimeout(function () { history.go(0)}, 1000)                    
                            }
                            else toastNotify(res['msg'],0)
                        //loadingClose()
                        history.go(0);
                        console.log(res)
                        }
                        
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
          })
        })
    });
</script>


 @endsection('content')

 