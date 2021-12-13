@extends('layouts.main')

@section('container')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl mt-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h4 class="font-weight-bolder mb-0">Data Kriteria</h4>
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

    <div class="table-responsive col-lg-8 mx-4">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">No</th>
                    <th scope="col">Nama Kriteria</th>
                    <th scope="col">Attribut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kriteria as $kri)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $kri->nama }}</td>
                    <td>{{ $kri->attribut }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection