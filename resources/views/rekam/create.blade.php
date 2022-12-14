@extends('layouts.app', [
'namePage' => 'Create Rekam Medis',
'class' => '',
'activePage' => 'rekammedis',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Rekam Medis Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('rekam.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('rekam.store') }}" autocomplete="off">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group{{ $errors->has('no_rm') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="no_rm">{{ __('No RM') }}</label>
                                <input type="text" name="no_rm" id="input-no_rm"
                                    class="form-control{{ $errors->has('no_rm') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('No RM') }}" value="{{ old('no_rm') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'no_rm'])
                            </div>
                            <div class="form-group{{ $errors->has('no_bpjs') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="no_bpjs">{{ __('No BPJS') }}</label>
                                <input type="text" name="no_bpjs" id="input-no_bpjs"
                                    class="form-control{{ $errors->has('no_bpjs') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('No BPJS') }}" value="{{ old('no_bpjs') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'no_bpjs'])
                            </div>
                            <div class="form-group{{ $errors->has('prolanis') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="prolanis">{{ __('Prolanis') }}</label>
                                <input type="text" name="prolanis" id="input-prolanis"
                                    class="form-control{{ $errors->has('prolanis') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Prolanis') }}" value="{{ old('prolanis') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'prolanis'])
                            </div>
                            <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="nama">{{ __('Nama') }}</label>
                                <input type="text" name="nama" id="input-nama"
                                class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Nama') }}" value="{{ old('nama') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'nama'])
                            </div>
                            <div class="form-group{{ $errors->has('kelamin') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="kelamin">{{ __('Jenis Kelamin') }}</label><br>
                                <select title="{{ __('Kelamin') }}" data-style="btn btn-info btn-round" name="kelamin" id="input-kelamin" data-size="7" class="selectpicker{{ $errors->has('kelamin') ? ' is-invalid' : '' }}" placeholder="{{ __('Kelamin') }}" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'kelamin'])
                            </div>
                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input class="form-control datepicker" name="tgl_lahir" id="tgl_lahir"
                                                placeholder="Select Tanggal Lahir" type="text" data-date-format="YYYY-MM-DD"
                                                value="{{ old('tgl_lahir', now()->format('d/m/Y')) }}">
                                {{-- <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input type="text" name="tgl_lahir" id="input-tgl_lahir"
                                    class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Tanggal Lahir') }}" value="{{ old('tgl_lahir') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'tgl_lahir']) --}}
                            </div>
                            <div class="form-group{{ $errors->has('dusun') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="dusun">{{ __('Dusun') }}</label>
                                <input type="text" name="dusun" id="input-dusun"
                                    class="form-control{{ $errors->has('dusun') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Dusun') }}" value="{{ old('dusun') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'dusun'])
                            </div>
                            <div class="form-group{{ $errors->has('rt') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="rt">{{ __('RT') }}</label>
                                <input type="text" name="rt" id="input-rt"
                                    class="form-control{{ $errors->has('rt') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('RT') }}" value="{{ old('rt') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'rt'])
                            </div>
                            <div class="form-group{{ $errors->has('rw') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="rw">{{ __('RW') }}</label>
                                <input type="text" name="rw" id="input-rw"
                                    class="form-control{{ $errors->has('rw') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('RW') }}" value="{{ old('rw') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'rw'])
                            </div>
                            <div class="form-group{{ $errors->has('desa') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="desa">{{ __('Desa') }}</label>
                                <input type="text" name="desa" id="input-desa"
                                    class="form-control{{ $errors->has('desa') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Desa') }}" value="{{ old('desa') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'desa'])
                            </div>
                            <div class="form-group{{ $errors->has('kecamatan') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="kecamatan">{{ __('Kecamatan') }}</label>
                                <input type="text" name="kecamatan" id="input-kecamatan"
                                    class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Kecamatan') }}" value="{{ old('kecamatan') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'kecamatan'])
                            </div>
                            <div class="form-group{{ $errors->has('kota_kab') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="kota_kab">{{ __('Kota/Kab') }}</label>
                                <input type="text" name="kota_kab" id="input-kota_kab"
                                    class="form-control{{ $errors->has('kota_kab') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Kota/Kab') }}" value="{{ old('kota_kab') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'kota_kab'])
                            </div>
                            <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="no_telp">{{ __('No Telepon') }}</label>
                                <input type="text" name="no_telp" id="input-no_telp"
                                    class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('No Telepon') }}" value="{{ old('no_telp') }}"  autofocus>
                                @include('alerts.feedback', ['field' => 'no_telp'])
                            </div>
                            <div class="form-group{{ $errors->has('pemilik_no_telp') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="pemilik_no_telp">{{ __('Pemilik Nomor Telepon') }}</label>
                                <input type="text" name="pemilik_no_telp" id="input-pemilik_no_telp"
                                    class="form-control{{ $errors->has('pemilik_no_telp') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Pemilik Nomor Telepon') }}" value="{{ old('pemilik_no_telp') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'pemilik_no_telp'])
                            </div>
                            <div class="form-group{{ $errors->has('ppk_umum') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="ppk_umum">{{ __('PPK Umum') }}</label>
                                <input type="text" name="ppk_umum" id="input-ppk_umum"
                                    class="form-control{{ $errors->has('ppk_umum') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('PPK Umum') }}" value="{{ old('ppk_umum') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'ppk_umum'])
                            </div>
                            <div class="form-group{{ $errors->has('jenis_peserta_bpjs') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="jenis_peserta_bpjs">{{ __('Jenis Peserta BPJS') }}</label>
                                <input type="text" name="jenis_peserta_bpjs" id="input-jenis_peserta_bpjs"
                                    class="form-control{{ $errors->has('jenis_peserta_bpjs') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Jenis Peserta BPJS') }}" value="{{ old('jenis_peserta_bpjs') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'jenis_peserta_bpjs'])
                            </div>
                            <div class="form-group{{ $errors->has('tgl_mutasi_bpjs') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="tgl_mutasi_bpjs">{{ __('Tanggal Mutasi BPJS') }}</label>
                                <input class="form-control datepicker" name="tgl_mutasi_bpjs" id="tgl_mutasi_bpjs"
                                                placeholder="Select Tanggal Lahir" type="text" data-date-format="DD-MM-YYYY"
                                                value="{{ old('tgl_mutasi_bpjs') }}">
                                {{-- <label class="form-control-label" for="tgl_mutasi_bpjs">{{ __('Tanggal Mutasi BPJS') }}</label>
                                <input type="text" name="tgl_mutasi_bpjs" id="input-tgl_mutasi_bpjs"
                                    class="form-control{{ $errors->has('tgl_mutasi_bpjs') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Tanggal Mutasi BPJS') }}" value="{{ old('tgl_mutasi_bpjs') }}" required autofocus> --}}
                                @include('alerts.feedback', ['field' => 'tgl_mutasi_bpjs'])
                            </div>
                            <div class="form-group{{ $errors->has('no_kk') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="no_kk">{{ __('No KK') }}</label>
                                <input type="text" name="no_kk" id="input-no_kk"
                                    class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('No RM') }}" value="{{ old('no_kk') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'no_kk'])
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<script>
$(document).ready(function () {
    demo.initDateTimePicker();
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
        } )
        .catch( error => {
    } );
});
</script>
@endpush

