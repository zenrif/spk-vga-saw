@extends('layouts.main')

@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-0">Data VGA</h4>
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="panel panel-default mx-2">

                @if(session()->has('success'))
                <div class="alert alert-success col-lg-7" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <div class="datatable table-responsive col-lg-12">
                    @can('admin')
                    <div class="col-lg-3">
                        <a href="/vga/create" class="btn btn-primary mt-3">Tambah Data VGA</a>
                    </div>
                    @endcan
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Memori</th>
                                <th scope="col">Core Clock</th>
                                <th scope="col">Memory Clock</th>
                                <th scope="col">TDP/Daya</th>
                                <th scope="col">Gambar</th>
                                @can('admin')
                                <th scope="col">Aksi</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_vga as $vga)
                            <tr>
                                <td style="text-align:center;">{{ $loop->iteration }}</td>
                                <td style="text-align:center;">{{ $vga->nama_vga }}</td>
                                {{-- <td>{{ $vga->harga }}</td> --}}
                                <td style="text-align:center;">Rp{{ number_format($vga->harga, 0, ' ', '.') }}</td>
                                <td style="text-align:center;">{{ $vga->memori }} GB</td>
                                <td style="text-align:center;">{{ $vga->core_clock }} Mhz</td>
                                <td style="text-align:center;">{{ $vga->memory_clock }} MHz</td>
                                <td style="text-align:center;">{{ $vga->daya }} W</td>
                                <td><img src="/img/{{ $vga->gambar }} " alt="" class="gambar"></td>
                                @can('admin')
                                <td style="text-align:center;">
                                    <a href="/vga/{{ $vga->id }}/edit" class="badge bg-success"
                                        style="text-decoration: none;">Edit</a>
                                    <form action="/vga/{{ $vga->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection