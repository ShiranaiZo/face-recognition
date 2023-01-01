@extends('layout')

@section('title', 'Riwayat')

@section('content')
    <section class="section">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <i class="bi bi-check-circle"></i> {{session('success')}}
                <button type="button" class="btn-close btn-close-session" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">

            <div class="card-body">
                <table class="table" id="table_users">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Nama Barang</th>
                            <th>Tujuan</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($riwayats as $key => $riwayat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ @$riwayat->pegawai->namapegawai }}</td>
                                <td>
                                    <h6>{{ @$riwayat->barang->namabarang }}</h6>
                                    <p>{{ @$riwayat->barang->kodebarang }}<p>
                                </td>
                                <td>{{ $riwayat->tujuan }}</td>
                                <td>{{ $riwayat->tgl_awal }}</td>
                                <td>{{ $riwayat->tgl_akhir }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // Init Datatable
            $("#table_users").DataTable();
		});

        // Init Tooltip
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('#table_users .tooltip-class'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);

        // Modal Remove
        function modalRemove(url) {
            $('#form_delete_user').attr("action", url)
        }
    </script>
@endsection

