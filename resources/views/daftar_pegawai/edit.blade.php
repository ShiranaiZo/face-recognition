@extends('layout')

@section('title', "Edit | Users")

@section('content')
    @if ($errors->any())
        <div class="card-body pt-0">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible show fade">
                    <i class="bi bi-file-excel"></i> {{ $error }}

                    <button type="button" class="btn-close btn-close-session" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Daftar Pegawai</h4>
        </div>

        <div class="card-content">
            <div class="card-body">
                <form method="POST" action="{{ url('daftar-pegawai/'.$daftar_pegawai->id) }}" id="form_update_user">
                    @method('PATCH')
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Pegawai<span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="namapegawai" class="form-control  @error('namapegawai') is-invalid @enderror" name="namapegawai" placeholder="Nama Pegawai" value="{{ old('namapegawai') ? old('namapegawai') : $daftar_pegawai->namapegawai }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Jabatan <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="jabatan" class="form-control  @error('jabatan') is-invalid @enderror" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') ? old('jabatan') : $daftar_pegawai->jabatan }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label>Qr Code <span class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" id="qrcode_p" class="form-control  @error('qrcode_p') is-invalid @enderror" name="qrcode_p" placeholder="QR Code" value="{{ old('qrcode_p') ? old('qrcode_p') : $daftar_pegawai->qrcode_p }}">
                            </div>
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary me-1 mb-1 submit_update_user" id="submit_update_user" onclick='preventDoubleClick("form_update_user", "submit_update_user")'>Submit</button>

                            <a href="{{ url('users') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // show and hide password
            $('#show').click(function(){
                if($(this).is(':checked')){
                    $('#password').prop('type', 'text')
                }else{
                    $('#password').prop('type', 'password')
                }
            })
		});
    </script>
@endsection
