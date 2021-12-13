@extends('layouts.main')

@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4 mb-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-0">Pembobotan Kriteria</h4>
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
            </div>
    </nav>

    <div class="table-responsive col-lg-10 mx-4">
        <form class="form-horizontal" action="/hasil/perangkingan" method="post" role="form">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading mb-4">
                    <h6 class="panel-title"><i class="fa fa-pencil"></i> Analisa VGA</h6>
                </div>
                <div class="panel-body">
                    <div class="form-group" style="display:flex;">
                        <label for="b_harga" class="col-sm-3 col-form-label" style="color:black; font-weight:bold;">C1.
                            Harga</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="b_harga" name="b_harga" value="" required
                                autofocus>
                        </div>
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="b_memori" class="col-sm-3 col-form-label" style="color:black; font-weight:bold;">C2.
                            Memori</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="b_memori" name="b_memori" value="" required>
                        </div>
                    </div>

                    <div class="form-group" style="display:flex;">
                        <label for="b_core_clock" class="col-sm-3 col-form-label"
                            style="color:black; font-weight:bold;">C3. Core Clock</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="b_core_clock" name="b_core_clock" value=""
                                required>
                        </div>
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="b_memory_clock" class="col-sm-3 col-form-label"
                            style="color:black; font-weight:bold;">C4. Memory Clock</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="b_memory_clock" name="b_memory_clock" value=""
                                required>
                        </div>
                    </div>

                    <div class="form-group" style="display:flex;">
                        <label for="b_daya" class="col-sm-3 col-form-label" style="color:black; font-weight:bold;">C5.
                            TDP/Daya</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="b_daya" name="b_daya" value="" required>
                        </div>
                    </div>


                    <div class="form-action text-right">
                        <input type="submit" name="simpan" value="Proses" class="btn btn-primary">
                        <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()"
                            class="btn btn-default">
                    </div>

                </div>
            </div>
        </form>
    </div>

</main>
@endsection