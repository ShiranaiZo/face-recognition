@extends('layoutfrontend')

@section('title', 'Dashboard')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Face Recognition</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card align-items-center">
            <div class="card-header">
                <h4 class="card-title">Silahkan scan terlebih dahulu</h4>
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg" ><i class="bi bi-webcam-fill"></i></button>
            </div>
        </div>

        <div class="card align-items-center">
            <div class="card-header">
                <h4 class="card-title">Scan Berhasil! Silahkan lanjut QR Code Anda</h4>
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-info btn-lg" ><i class="bi bi-qr-code-scan"></i></button>
            </div>
        </div>

        <div class="card align-items-center">
            <div class="card-header">
                <h4 class="card-title">Silahkan pilih salah satu :</h4>
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-outline-secondary">Penggunaan</button>
                <button type="button" class="btn btn-outline-secondary">Peminjaman</button>
                <button type="button" class="btn btn-outline-secondary">Pengembalian</button>
            </div>
        </div>
    </section>
@endsection
