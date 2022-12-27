@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dasboard</h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stok Minimum Barang</h4>
            </div>

            <div class="card-body">
                Berikut Stok Barang yang Minim :
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Barang Keseluruhan</h4>
            </div>

            <div class="card-body">
                Berikut Barang yang ada di sini :

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Barang Keluar</h4>
            </div>

            <div class="card-body">
                Berikut Data Terbaru Barang-barang yang keluar :
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Barang yang Dipinjam</h4>
            </div>

            <div class="card-body">
                Berikut Jumlah Barang yang Dipinjam :
            </div>
        </div>
    </section>
@endsection
