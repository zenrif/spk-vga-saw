@extends('layouts.main')

@section('container')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-4">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-2">Dashboard</h4>
                <h6 class="font mb-1">Selamat datang, {{ auth()->user()->username }}</h6>
                <h6 class="font mb-1">Status: {{ auth()->user()->is_admin ? 'Administrator' : 'User'}}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <form action="/logout" method="post" name="logout">
                            @csrf
                            {{-- <a href="/logout" class="nav-link text-body font-weight-bold px-0"> --}}
                                <i class="bi bi-box-arrow-right"></i>
                                <span type="submit" class="d-sm-inline d-none" onclick="logout.submit()">Logout</span>
                            </a>
                        </form>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>

    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Data VGA</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a class="mb-0" href="/vga" style="text-decoration: none;"><span
                                class="text-primary text-sm font-weight-bolder">Klik
                                Disini</span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Data Kriteria</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a class="mb-0" href="/kriteria" style="text-decoration: none;"><span
                                class="text-primary text-sm font-weight-bolder">Klik
                                Disini</span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <div class="text-end pt-1">
                            <h4 class="mb-0">Prediksi Permintaan</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <a class="mb-0" href="/hasil" style="text-decoration: none;"><span
                                class="text-primary text-sm font-weight-bolder">Klik
                                Disini</span></a>
                    </div>
                </div>
            </div>
        </div>
        <p class="font-weight-bolder mt-4">Tentang Website</p>
        <div class="form-group row mb-3">
            <div class="col-sm-2">
                <img class="navbar-brand-img h-100" src="/assets/img/logos/logo-pilihvga.svg">
            </div>
            <div class="col-sm-7">
                <p class="font">Pilih VGA adalah platform berbasis website sebagai sistem pendukung keputusan dalam
                    melakukan
                    pemilihan Video
                    Graphic Array (VGA) dengan menggunakan metode Simple Additive Weighting (SAW).</p>
            </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a class="font-weight-bold" target="_blank" style="text-decoration: none;">Kelompok 6 SIE
                                2020 SIB</a>
                            Universitas Negeri Surabaya.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
@endsection