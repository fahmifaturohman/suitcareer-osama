<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Suitcareer</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/autofill/2.5.1/css/autoFill.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/autofill/2.5.1/js/dataTables.autoFill.min.js"></script>
    <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>


    <link href="{{asset('template/')}}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    

    <style>
        #layoutSidenav_content {
            background: #f3f3f3 !important;
            padding-bottom: 4rem !important;
        }
        .card-custom {
            background:#fff !important;
            border:0px !important;
            padding:1rem;
            box-shadow: 0px 2px 6px 0px rgb(0 0 0 / 75%);
            -webkit-box-shadow: 0px 2px 6px 0px rgb(0 0 0 / 75%);
        }

        .card-content {
            background: #fff !important;
            box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
            -webkit-box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
            -moz-box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
        }

        ol.breadcrumb {
            padding: 1rem !important;
            background: #fff !important;
            box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
            -webkit-box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
            -moz-box-shadow: 7px 16px 7px -13px rgba(0,0,0,0.75);
        }

        nav.sb-sidenav {
            background: #130f40 !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="z-index:0;background:#dfe6e9 !important;color:#000 !important;">
        <div class="col-2"></div>
        <div class="col-6 text-dark pl-3">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark col-1" id="sidebarToggle" href="#">
                <i class="fa fa-bars"></i>
            </button>
            <span class="col-6">
            Selamat Datang {{ Auth::user()->name }} (<b>
            @if (auth()->user()->level_user==1)
            Admin
            @elseif (auth()->user()->level_user==2)
            Klien
            @endif
            </b>
            )
            </span>
        </div>
        <div class="col-2 text-dark">
        
        </div>
    
        <!-- Sidebar Toggle-->
        

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
           
        </form>

        <!--Navbar-->
        </form>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
            <ul class="navbar-nav pr-5">
            <li class="nav-item dropdown">
                <a class="nav-link text-dark" type="submit" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Logout  &nbsp; &nbsp;
                </a>
            </li>
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        @if (auth()->user()->level_user==1)

                        <!--ADMIN--------------->
                        <div class="sb-sidenav-menu-heading">Option</div>
                        <a class="nav-link collapsed {{ request()->is('dashboard_admin') ? 'active' : '' }} " href="/dashboard_admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Dashboard Admin
                        </a>
                        <a class="nav-link collapsed {{ request()->is('data_request') ? 'active' : '' }} " href="/data_request">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Manage Request
                        </a>
                        <div class="sb-sidenav-menu-heading">Select Menu</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Master Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="{{ request()->is('master_klien') || request()->is('master_request') || request()->is('master_candidate') ? 'nav-link active' : 'collapse' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ request()->is('master_klien') ? 'active' : ''  }}" href="/master_klien">Data Klien</a>
                                <a class="nav-link {{ request()->is('master_request') ? 'active' : ''  }}" href="/master_request">Data Request</a>
                                <a class="nav-link {{ request()->is('master_candidate') ? 'active' : ''  }}" href="/master_candidate">Data Candidate</a>
                            </nav>
                        </div>
                        <!-- BATAS ADMIN ---------->

                        @else (auth()->user()->level_user==2)

                        <a href="/profil" class=" nav-link {{ request()->is('profil') ? 'active' : '' }} ">
                            <div class="sb-nav-link-icon  "><i class="fas fa-tachometer-alt"></i></div>
                            Profil
                        </a>

                        <div class="sb-sidenav-menu-heading">Option</div>
                        <a class="nav-link collapsed {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed {{ request()->is('request') || request()->is('request/add') ? 'active' : '' }} " href="/request">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Request
                        </a>

                        <a class="nav-link collapsed {{ request()->is('klien_candidate') ? 'active' : '' }} " href="/klien_candidate">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Candidate
                        </a>

                        @endif

                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" type="submit" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>




                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            @yield('content')
            <main>
                <!--<div class="container-fluid px-4">
                    <h1 class="mt-4">Charts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Charts</li>
                    </ol>
                   <div class="card mb-4">
                        <div class="card-body">
                            Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official
                            <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>
                            .
                        </div>
                    </div> -->
            </main>
        </div>
    </div>

    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('template/')}}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('template/')}}/js/datatables-simple-demo.js"></script>
    <script src="{{asset('template/')}}/assets/demo/chart-area-demo.js"></script>
    <script src="{{asset('template/')}}/assets/demo/chart-bar-demo.js"></script>
    <script src="{{asset('template/')}}/assets/demo/chart-pie-demo.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.5.1/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>