@extends('layoutfrontend')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/extensions/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Face Recognition</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card align-items-center d-none" id="scan_qrcode">
            <div class="card-header">
                <h4 class="card-title">Silahkan login dengan scan QR Code anda terlebih dahulu</h4>
            </div>

            <div class="card-body">
                <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#modal_scan_qrcode"><i class="bi bi-qr-code-scan"></i></button>
            </div>
        </div>

        <div class="card align-items-center d-none" id="scan_wajah">
            <div class="card-header">

                <h4 class="card-title">Scan Qr Code Berhasil! Silahkan scan terlebih dahulu</h4>
            </div>

            <div class="card-body">
                <button id="scan" type="button" class="btn btn-primary btn-lg" onclick="scanWajah()" data-id=""><i class="bi bi-webcam-fill"></i></button>

                <a href="{{ \Request::url() }}"><button id="back" type="button" class="btn btn-danger btn-lg"><i class="bi bi-x-lg"></i></button></a>
            </div>
        </div>


        <div class="card align-items-center d-none" id="tujuan">
            <div class="card-header">
                <h4 class="card-title">Halo, <span class="text-nama-pegawai"></span>. Apa yang kamu inginkan?</h4>
            </div>

            <div class="card-body">
                @foreach (config("custom.tujuan") as $key_tujuan => $tujuan)
                    <button type="button" class="btn btn-outline-secondary" onclick="tujuan('{{$key_tujuan}}')" data-bs-toggle="modal" data-bs-target="#modal_tujuan">{{ ucfirst($tujuan) }}</button>
                @endforeach

                <button type="button" class="btn btn-danger ms-2" onclick="logout()">Logout</button>
            </div>
        </div>
    </section>

    {{-- Modal Scan QR Code--}}
        <div class="modal fade text-left" id="modal_scan_qrcode" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title white" id="myModalLabel120">Scan QR Code</h5>

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <video id="scan_qrcode_pegawai" width="100%"></video>
                    </div>
                </div>
            </div>
        </div>
    {{-- Modal Scan QR Code --}}

    {{-- Modal Tujuan--}}
        <div class="modal fade text-left" id="modal_tujuan" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-outline-secondary">
                        <h5 class="modal-title white judul-tujuan" id="myModalLabel120"></h5>

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 border-end">
                                <video id="scan_qrcode_barang" width="100%"></video>
                            </div>
                            <div class="col-6">
                                <table style="width: 100%" class="table">
                                    <tr>
                                        <th class="text-start">Item</th>
                                        <th class="text-end">Qty</th>
                                    </tr>

                                    <tr>
                                        <td>Sapu</td>
                                        <td class="text-end">1</td>
                                    </tr>
                                </table>
                                {{-- <video id="scan_qrcode_pegawai" width="100%"></video> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- Modal Tujuan --}}
@endsection

@section('js')
    <script src="{{asset('assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/sweetalert2.js')}}"></script>>
    <script src="{{asset('assets/extensions/html5-qrcode/html5-qrcode.min.js')}}"></script>
    <script src="{{asset('assets/extensions/instascan/instascan.min.js')}}"></script>

    <script>
        function logout() {
            sessionStorage.removeItem('id');

            setTimeout(function() {
                window.location.href = "{{url('')}}";
            }, 1000);
        }

         $(document).ready(function () {
            let id = JSON.parse(sessionStorage.getItem("id"));

            if (id) {
                $.ajax({
                    url: "{{ url('daftar-pegawai') }}/"+id,
                    type: 'GET',
                    success: function(res) {
                        $('.text-nama-pegawai').text(res.namapegawai)
                    }
                });

                $('#scan_qrcode').addClass('d-none')
                $('#scan_wajah').addClass('d-none')
                $('#tujuan').removeClass('d-none')
            }else{
                $('#scan_qrcode').removeClass('d-none')
                $('#scan_wajah').addClass('d-none')
                $('#tujuan').addClass('d-none')
            }
		});

        function scanWajah() {
            let id = $('#scan').data('id')

            $.ajax({
                    url: "{{ url('face-recognition-scan') }}/"+id,
                    type: 'GET',
                    success: function(res) {
                        if (res == true) {
                            Swal.fire({
                                icon: "success",
                                title: "Scan Berhasil."
                            })

                            sessionStorage.setItem("id", id);

                            setTimeout(function() {
                                window.location.href = "{{url('')}}";
                            }, 1000);
                        }else{
                            Swal.fire({
                                icon: "error",
                                title: "Wajah tidak di kenali"
                            })
                        }
                    }
                });
        }

        // Scan QR Code Pegawai
            let scanner_pegawai = new Instascan.Scanner({ video: document.getElementById('scan_qrcode_pegawai') });

            $('#modal_scan_qrcode').on('shown.bs.modal', function (e) {
                Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner_pegawai.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
                }).catch(function (e) {
                console.error(e);
                });
            })

            $('#modal_scan_qrcode').on('hidden.bs.modal', function (e) {
                scanner_pegawai.stop();
            })

            scanner_pegawai.addListener('scan', function (content) {
                $('#modal_scan_qrcode').modal('hide');

                $.ajax({
                    url: "{{ url('scan-qrcode') }}/"+content,
                    type: 'GET',
                    beforeSend: function(){
                        $('#modal_scan_qrcode .model-content').html(`<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...`).attr('disabled', true)
                    },
                    success: function(res) {
                        $('#scan').data('id', res.id)

                        if (jQuery.isEmptyObject(res)){
                            Swal.fire({
                                icon: "error",
                                title: "QR Code Anda Bukan Pegawai."
                            })
                        }else{
                            Swal.fire({
                                icon: "success",
                                title: "Scan QR Code Berhasil."
                            })
                        }

                        $('#scan_qrcode').addClass('d-none')
                        $('#scan_wajah').removeClass('d-none')
                        $('#tujuan').addClass('d-none')
                    }
                });
            });
        // Scan QR Code Pegawai

        // Scan QR Code Barang
            let scanner_barang = new Instascan.Scanner({ video: document.getElementById('scan_qrcode_barang') });

            $('#modal_tujuan').on('shown.bs.modal', function (e) {
                Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner_barang.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
                }).catch(function (e) {
                console.error(e);
                });
            })

            $('#modal_tujuan').on('hidden.bs.modal', function (e) {
                scanner_barang.stop();
            })

            scanner_barang.addListener('scan', function (content) {

                // $.ajax({
                //     url: "{{ url('scan-qrcode') }}/"+content,
                //     type: 'GET',
                //     beforeSend: function(){
                //         $('#modal_tujuan .model-content').html(`<span id="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                //             Loading...`).attr('disabled', true)
                //     },
                //     success: function(res) {
                //         $('#scan').data('id', res.id)

                //         if (jQuery.isEmptyObject(res)){
                //             Swal.fire({
                //                 icon: "error",
                //                 title: "QR Code Anda Bukan Pegawai."
                //             })
                //         }else{
                //             Swal.fire({
                //                 icon: "success",
                //                 title: "Scan QR Code Berhasil."
                //             })
                //         }

                //         $('#scan_qrcode').addClass('d-none')
                //         $('#scan_wajah').removeClass('d-none')
                //         $('#tujuan').addClass('d-none')
                //     }
                // });
            });
        // Scan QR Code Barang
    </script>

@endsection
