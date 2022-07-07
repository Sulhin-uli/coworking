
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('template_admin') }}/css/styles.css" rel="stylesheet" />
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">COWORKING</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->name??''}}" aria-label="Search for..." aria-describedby="btnNavbarSearch" readonly/>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/logout_user">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            @role('admin')
                            <a class="nav-link" href="/home">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/pemesanan">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                                </div>
                                    Tipe Pemesanan
                            </a>
                            <a class="nav-link" href="/berita_admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                                </div>
                                    Berita
                            </a>
                            <a class="nav-link" href="/user">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                            </div>
                                Manajemen Akun
                            </a>
                            {{-- <a class="nav-link" href="/form">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                                </div>
                                    Transaksi 
                            </a> --}}
                            <a class="nav-link" href="/transaksi">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                                </div>
                                    Laporan
                            </a>
                            <a class="nav-link" href="/riwayat">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                                </div>
                                    Riwayat
                            </a>
                        </div>
                    </div>
                    @endrole
                    @role('pelanggan')
                    <a class="nav-link" href="/">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                        </div>
                            Home 
                    </a>
                    <a class="nav-link" href="/form">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                        </div>
                            Transaksi 
                    </a>
                    <a class="nav-link" href="/transaksi">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                        </div>
                            Laporan
                    </a>
                    <a class="nav-link" href="/riwayat">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                        </div>
                            Riwayat
                    </a>
                    @endrole
                    @guest
                    <a class="nav-link" href="/riwayat">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i>
                        </div>
                            Riwayat
                    </a>
                    @endguest
                </nav>
            </div>
            <div id="layoutSidenav_content">