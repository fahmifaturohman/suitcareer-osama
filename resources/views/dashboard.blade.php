@extends('layout.template')

@section('content')



<div class="container-fluid px-4">
    <h1 class="mt-4">Hello, Welcome!</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Pending</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/klien_request_pending">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Proses</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/klien_request_process">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Sukses</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/klien_request_success">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Keseluruhan Permintaan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/klien_request">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1>{{$pesan}}</h1>
                </center>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-12 mb-3">
            <div class="card-custom col-md-12">
                <div id="grafik-hari" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card-custom col-md-12">
                <div id="grafik-bulan" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
 
    <script>
        window.onload = function () {
          
            var bulan = new CanvasJS.Chart("grafik-bulan", {
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: false, // change to true		
                title:{
                    text: "GRAFIK REQUEST <?=Auth::user()->name?> TAHUN <?=date('Y')?>"
                },
                data: [
                {
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "column",
                    dataPoints: [
                        <?php 
                            $bulan = [
                                1 => "Januari",
                                2 => "Februari", 
                                3 => "Maret",
                                4 => "April",
                                5 => "Mei",
                                6 => "Juni",
                                7 => "Juli",
                                8 => "Agustus",
                                9 => "September",
                                10 => "Oktober",
                                11 => "November",
                                12 => "Desember"
                            ];

                            if(empty($databulan)) :
                                for ($i=1; $i <= count($bulan) ; $i++) { ?>
                                    { label: "<?=$bulan[$i];?>",  y: 0 }, <?php 
                                }
                            else :
                                for ($i=1; $i <= count($bulan) ; $i++) {
                                    # mencari jumlah request per tahun 
                                    $key = array_search($i, array_column($databulan, 'bulan')); //mencari array key di dalam array $data dengan parametr nili i(tahun)
                                    $jumlah = ($i == $databulan[$key]->bulan) ? $databulan[$key]->jumlah:0; // jika nilai i(tahun) sama dengan tahun di array $data maka akan di tampilkan jumlah request di tahun itu jika tidak nilai requestnya 0                  
                                    ?>{ label: "<?=$bulan[$i];?>",  y: <?=$jumlah?>  }, <?php
                                } 
                            endif; ?>                      
                    ]
                }
                ]
            })

            var hari = new CanvasJS.Chart("grafik-hari", {
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: false, // change to true		
                title:{
                    text: "GRAFIK REQUEST <?=Auth::user()->name?> BULAN INI"
                },
                data: [
                {
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "line",
                    dataPoints: [
                        <?php 
                            $dates = [];
                            for($i = 1; $i <=  date('t'); $i++) {
                               // add the date to the dates array
                               $dates[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
                            }

                            #jika data hari tidak ada
                            if(empty($datahari)): 
                                foreach ($dates as $tgl) { 
                                    ?>
                                    { label: "<?=$tgl;?>",  y: 0 }, <?php 
                                } 
                            #jika data hari ada
                            else :
                                foreach ($dates as $tgl) { 
                                    $key = array_search($tgl, array_column($datahari, 'tanggal')); //mencari array key di dalam array $data dengan parametr nili i(tahun)
                                    $jumlah = ($tgl == $datahari[$key]->tanggal) ? $datahari[$key]->jumlah:0; // jika nilai i(tahun) sama dengan tahun di array $data maka akan di tampilkan jumlah request di tahun itu jika tidak nilai requestnya 0 
                                    ?>
                                    { label: "<?=$tgl;?>",  y: <?=$jumlah?>  }, <?php 
                                }
                            endif;
                            
                            ?> 
                    ]
                }
                ]
            })

            
            bulan.render();
            hari.render();
        }
    </script>




    @endsection('content')