@extends('layouts.main')

@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-0">Tambah Data VGA</h4>
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

    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <form method="post" action="/vga" class="mb-5" enctype="multipart/form-data" class="form-horizontal"
                role="form">
                @csrf
                <div class="col-lg-10 mx-2">
                    <div class=" form-group" style="display:flex;">
                        <label for="nama_vga" class="col-sm-3 col-form-label @error('nama_vga') is-invalid @enderror"
                            style="color:black; font-weight:bold;">Nama
                            VGA</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="nama_vga" name="nama_vga" required autofocus
                                value="{{ old('nama_vga') }}">
                        </div>
                        @error('nama_vga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="harga" class="col-sm-3 col-form-label @error('harga') is-invalid @enderror"
                            style="color:black; font-weight:bold;">Harga
                            (Rp)</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="harga" name="harga" required
                                value="{{ old('harga') }}" placeholder="Contoh : Rp1.500.000, masukkan 1500000">
                        </div>
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="memori" class="col-sm-3 col-form-label @error('memori') is-invalid @enderror"
                            style="color:black; font-weight:bold;">Memori
                            (GB)</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="memori" name="memori" required
                                value="{{ old('memori') }}" placeholder="Contoh : 4 GB, masukkan 4">
                        </div>
                        @error('memori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="core_clock"
                            class="col-sm-3 col-form-label @error('core_clock') is-invalid @enderror"
                            style="color:black; font-weight:bold;">Core
                            Clock
                            (MHz)</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="core_clock" name="core_clock" required
                                value="{{ old('core_clock') }}" placeholder="Contoh : 800 MHz, masukkan 800">
                        </div>
                        @error('core_clock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="memory_clock"
                            class="col-sm-3 col-form-label @error('memory_clock') is-invalid @enderror"
                            style="color:black; font-weight:bold;">Memory
                            Clock (MHz)</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="memory_clock" name="memory_clock" required
                                value="{{ old('memory_clock') }}" placeholder="Contoh : 500 MHz, masukkan 500">
                        </div>
                        @error('memory_clock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group" style="display:flex;">
                        <label for="daya" class="col-sm-3 col-form-label @error('daya') is-invalid @enderror"
                            style="color:black; font-weight:bold;">TDP/Daya
                            (W)</label>
                        <div class="col-sm-5 mb-3">
                            <input type="text" class="form-control" id="daya" name="daya" required
                                value="{{ old('daya') }}" placeholder="Contoh : 70 W, masukkan 70">
                        </div>
                        @error('daya')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="col-sm-3 col-form-label"
                            style="color:black; font-weight:bold;">Gambar</label>
                        <img class="gambar-preview img-fluid mb-2 col-sm-2">
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar" onchange="previewGambar()">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-action text-left">
                        <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
                        <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()"
                            class="btn btn-default">
                    </div>

                </div>
            </form>
        </div>
    </div>
</main>

@endsection