@extends('layouts.app', [
    'namePage' => 'Edit Rekam Medis',
    'class' => '',
    'activePage' => 'rekammedis',
    'activeNav' => 'page',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content" style="margin-top: -170px;">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header mb-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Rekam Medis Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('rekam.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ route('rekam.update', $rekam) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_no_rm">{{ __('No RM') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('no_rm') ? ' has-danger' : '' }}">
                                        <input type="text" name="no_rm" id="input_no_rm"
                                        class="form-control{{ $errors->has('no_rm') ? ' is-invalid' : '' }}" value="{{ old('no_rm', $rekam->no_rm) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'no_rm'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_no_bpjs">{{ __('No BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('no_bpjs') ? ' has-danger' : '' }}">
                                        <input type="text" name="no_bpjs" id="input_no_bpjs" class="form-control{{ $errors->has('no_bpjs') ? ' is-invalid' : '' }}"
                                        value="{{ old('no_bpjs', $rekam->no_bpjs) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'no_bpjs'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_prolanis">{{ __('Prolanis') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('prolanis') ? ' has-danger' : '' }}">
                                        <input type="text" name="prolanis" id="input_prolanis"
                                        class="form-control{{ $errors->has('prolanis') ? ' is-invalid' : '' }}" value="{{ old('prolanis', $rekam->prolanis) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'prolanis'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_nama">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama" id="input_nama"
                                        class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{ old('nama', $rekam->nama) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'nama'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_kelamin">{{ __('Kelamin') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('kelamin') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Kelamin') }}" data-style="btn btn-info btn-round" name="kelamin" id="input_kelamin" data-size="7" class="selectpicker{{ $errors->has('kelamin') ? ' is-invalid' : '' }}" required>
                                            <option value="laki-laki"  {{ old('kelamin', $rekam->kelamin) === 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('kelamin', $rekam->kelamin) === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'kelamin'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_tgl_lahir">{{ __('Tangal Lahir') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input class="form-control datepicker" name="tgl_lahir" id="input_tgl_lahir" placeholder="Select Tanggal Lahir" type="text" data-date-format="YYYY-MM-DD" value="{{ now()->format('d/m/Y') }}">
                                    @include('alerts.feedback', ['field' => 'tgl_lahir'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_dusun">{{ __('Dusun') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('dusun') ? ' has-danger' : '' }}">
                                        <input type="text" name="dusun" id="input_dusun"
                                        class="form-control{{ $errors->has('dusun') ? ' is-invalid' : '' }}" value="{{ old('dusun', $rekam->dusun) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'dusun'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_rt">{{ __('RT') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('rt') ? ' has-danger' : '' }}">
                                        <input type="text" name="rt" id="input_rt"
                                        class="form-control{{ $errors->has('rt') ? ' is-invalid' : '' }}" value="{{ old('rt', $rekam->rt) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'rt'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_rw">{{ __('RW') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('rw') ? ' has-danger' : '' }}">
                                        <input type="text" name="rw" id="input_rw"
                                        class="form-control{{ $errors->has('rw') ? ' is-invalid' : '' }}" value="{{ old('rw', $rekam->rw) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'rw'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_desa">{{ __('Desa') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('desa') ? ' has-danger' : '' }}">
                                        <input type="text" name="desa" id="input_desa"
                                        class="form-control{{ $errors->has('desa') ? ' is-invalid' : '' }}" value="{{ old('desa', $rekam->desa) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'desa'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_kecamatan">{{ __('Kecamatan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('kecamatan') ? ' has-danger' : '' }}">
                                        <input type="text" name="kecamatan" id="input_kecamatan"
                                        class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" value="{{ old('kecamatan', $rekam->kecamatan) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'kecamatan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_kota_kab">{{ __('Kota/Kab') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('kota_kab') ? ' has-danger' : '' }}">
                                        <input type="text" name="kota_kab" id="input_kota_kab"
                                        class="form-control{{ $errors->has('kota_kab') ? ' is-invalid' : '' }}" value="{{ old('kota_kab', $rekam->kota_kab) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'kota_kab'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_no_telp">{{ __('No Telpon') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }}">
                                        <input type="text" name="no_telp" id="input_no_telp"
                                        class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" value="{{ old('no_telp', $rekam->no_telp) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'no_telp'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_pemilik_no_telp">{{ __('Pemilik No Telpon') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('pemilik_no_telp') ? ' has-danger' : '' }}">
                                        <input type="text" name="pemilik_no_telp" id="input_pemilik_no_telp"
                                        class="form-control{{ $errors->has('pemilik_no_telp') ? ' is-invalid' : '' }}" value="{{ old('pemilik_no_telp', $rekam->rt) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'pemilik_no_telp'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_ppk_umum">{{ __('PPK Umum') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('ppk_umum') ? ' has-danger' : '' }}">
                                        <input type="text" name="ppk_umum" id="input_ppk_umum"
                                        class="form-control{{ $errors->has('ppk_umum') ? ' is-invalid' : '' }}" value="{{ old('ppk_umum', $rekam->ppk_umum) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'ppk_umum'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_jenis_peserta_bpjs">{{ __('Jenis Peserta BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('jenis_peserta_bpjs') ? ' has-danger' : '' }}">
                                        <input type="text" name="jenis_peserta_bpjs" id="input_jenis_peserta_bpjs"
                                        class="form-control{{ $errors->has('jenis_peserta_bpjs') ? ' is-invalid' : '' }}" value="{{ old('jenis_peserta_bpjs', $rekam->jenis_peserta_bpjs) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'jenis_peserta_bpjs'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_tgl_mutasi_bpjs">{{ __('Tanggal Mutasi BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('tgl_mutasi_bpjs') ? ' has-danger' : '' }}">
                                        <input class="form-control datepicker" name="tgl_mutasi_bpjs" id="input_tgl_mutasi_bpjs" placeholder="Pilih Tanggal Lahir" type="text" data-date-format="YYYY-MM-DD" value="{{ old('tgl_mutasi_bpjs', $rekam->tgl_mutasi_bpjs) }}">
                                        @include('alerts.feedback', ['field' => 'tgl_mutasi_bpjs'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_no_kk">{{ __('No KK') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('no_kk') ? ' has-danger' : '' }}">
                                        <input type="text" name="no_kk" id="input_no_kk"
                                        class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}" value="{{ old('no_kk', $rekam->no_kk) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'no_kk'])
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
