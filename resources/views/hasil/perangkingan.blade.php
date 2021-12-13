@extends('layouts.main')

@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4 mb-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-0">Hasil Seleksi</h4>
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

    <div class="panel panel-default mx-4">
        <div class="panel-heading">
            <h1 class="h2">Data Bobot Kriteria</h1>
        </div>
        <div class="datatable table-responsive col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Harga</td>
                        <td>{{ $bobot['b_harga'] }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Memori</td>
                        <td>{{ $bobot['b_memori'] }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Core Clock</td>
                        <td>{{ $bobot['b_core_clock'] }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Memory_clock</td>
                        <td>{{ $bobot['b_memory_clock'] }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>TDP/Daya</td>
                        <td>{{ $bobot['b_daya'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-default mx-4">
        <div class="panel-heading">
            <h1 class="h2">Normalisasi</h1>
        </div>

        <div class="datatable table-responsive col-lg-10">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Memori</th>
                        <th scope="col">Core Clock</th>
                        <th scope="col">Memory Clock</th>
                        <th scope="col">TDP/Daya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_vga as $vga)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td style="text-align:center;">{{ $vga->nama_vga }}</td>
                        <td style="text-align:center;">{{ round($min['harga']/$vga->harga, 2) }}</td>
                        <td style="text-align:center;">{{ round($vga->memori/$maks['memori'], 2) }}</td>
                        <td style="text-align:center;">{{ round($vga->core_clock/$maks['core_clock'], 2) }}</td>
                        <td style="text-align:center;">{{ round($vga->memory_clock/$maks['memory_clock'], 2) }}</td>
                        <td style="text-align:center;">{{ round($min['daya']/$vga->daya, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default mx-4">
        <div class="panel-heading">
            <h1 class="h2">Perangkingan</h1>
        </div>
        <div class="datatable table-responsive col-lg-10">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">No</th>
                        <th scope="col" style="text-align:center;">Nama</th>
                        <th scope="col" style="text-align:center;">Gambar</th>
                        <th scope="col" style="text-align:center;">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_vga as $vga)
                    <tr>
                        <td style="text-align:center;">{{ $loop->iteration }}</td>
                        <td style="text-align:center;">{{ $vga->nama_vga }}</td>
                        <td style="text-align:center;"><img src="/img/{{ $vga->gambar }} " alt="" class="gambar"></td>
                        <td style="text-align:center;">{{
                            round((($min['harga']/$vga->harga)*$bobot['b_harga'])+(($vga->memori/$maks['memori'])*$bobot['b_memori'])+(($vga->core_clock/$maks['core_clock'])*$bobot['b_core_clock'])+(($vga->memory_clock/$maks['memory_clock'])*$bobot['b_memory_clock'])+(($min['daya']/$vga->daya)*$bobot['b_daya']),
                            2)}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection