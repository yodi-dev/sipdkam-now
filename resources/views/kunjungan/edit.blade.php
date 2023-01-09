@extends('layouts.app', [
    'namePage' => 'Edit Kunjungan',
    'class' => '',
    'activePage' => 'kunjungan',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content" style="margin-top: -120px">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Kunjungan Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="{{ route('kunjungan.update', $kunjungan) }}" autocomplete="off">
                        @csrf
                        @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Shift') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Pilih Shift') }}" data-style="btn btn-info btn-round"
                                        name="shift" data-size="7"
                                        class="selectpicker{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                        required>
                                            <option value="1" {{ old('shift', $kunjungan->shift) === '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('shift', $kunjungan->shift) === '2' ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ old('shift', $kunjungan->shift) === '3' ? 'selected' : '' }}>3</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'shift'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Jaminan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('jaminan') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Pilih Jaminan') }}" data-style="btn btn-info btn-round"
                                        name="jaminan" data-size="7"
                                        class="selectpicker{{ $errors->has('jaminan') ? ' is-invalid' : '' }}"
                                        required>
                                            <option value="bpjs" {{ old('jaminan', $kunjungan->jaminan) === 'bpjs' ? 'selected' : '' }}>BPJS</option>
                                            <option value="regular" {{ old('jaminan', $kunjungan->jaminan) === 'regular' ? 'selected' : '' }}>Regular</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'jaminan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Poli') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Pilih Poli') }}" data-style="btn btn-info btn-round"
                                        name="poli" data-size="7"
                                        class="selectpicker{{ $errors->has('poli') ? ' is-invalid' : '' }}"
                                        required>
                                            <option value="gigi" {{ 'gigi' === old('poli', $kunjungan->poli) ? 'selected' : '' }}>Gigi</option>
                                            <option value="home_care" {{ 'home_care' === old('poli', $kunjungan->poli) ? 'selected' : '' }}>Home Care</option>
                                            <option value="kb" {{ 'kb' === old('poli', $kunjungan->poli) ? 'selected' : '' }}>KB</option>
                                            <option value="observasi" {{ 'observasi' === old('poli', $kunjungan->poli) ? 'selected' : '' }}>Observasi</option>
                                            <option value="umum" {{ 'umum' === old('poli', $kunjungan->poli) ? 'selected' : '' }}>Umum</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'poli'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input-NoRM">{{ __('No RM') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('rekam_id') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Pilih RM') }}" data-style="btn btn-info btn-round" name="rekam_id"
                                        id="input-NoRM" data-size="7"
                                        class="selectpicker{{ $errors->has('rekam_id') ? ' is-invalid' : '' }}"
                                        required>
                                            @foreach ($rekams as $rms)
                                            <option value="{{ $rms->id }}" {{ $rms->id === old('rekam_id', $kunjungan->rekam_id) ? 'selected' : '' }}>
                                                {{ $rms->no_rm }} - {{ $rms->nama }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'rekam_id'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">Dokter</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('dokter_id') ? ' has-danger' : '' }}">
                                        <select title="{{ __('Pilih Dokter') }}" data-style="btn btn-info btn-round"
                                        name="dokter_id" id="input-Dokter" data-size="7"
                                        class="selectpicker{{ $errors->has('dokter_id') ? ' is-invalid' : '' }}"
                                        required>
                                            @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id }}" {{ $dokter->id === old('dokter_id', $kunjungan->dokter_id) ? 'selected' : '' }}>
                                                {{ $dokter->nama_dokter }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'dokter_id'])
                                    </div>
                                </div>
                            </div>

                            {{-- Bagian Pemeriksaan --}}
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <h6 class="heading-small text-muted my-3">{{ __('Pemeriksaan') }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_sis">{{ __('sis') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('sis') ? ' has-danger' : '' }}">
                                        <input type="text" name="sis" id="input_sis"
                                        class="form-control{{ $errors->has('sis') ? ' is-invalid' : '' }}" value="{{ old('sis', $kunjungan->sis) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'sis'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_dias">{{ __('dias') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('dias') ? ' has-danger' : '' }}">
                                        <input type="text" name="dias" id="input_dias"
                                        class="form-control{{ $errors->has('dias') ? ' is-invalid' : '' }}" value="{{ old('dias', $kunjungan->dias) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'dias'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_bb">{{ __('bb') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('bb') ? ' has-danger' : '' }}">
                                        <input type="text" name="bb" id="input_bb"
                                        class="form-control{{ $errors->has('bb') ? ' is-invalid' : '' }}" value="{{ old('bb', $kunjungan->bb) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'bb'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_keluhan">{{ __('keluhan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('keluhan') ? ' has-danger' : '' }}">
                                        <input type="text" name="keluhan" id="input_keluhan"
                                        class="form-control{{ $errors->has('keluhan') ? ' is-invalid' : '' }}" value="{{ old('keluhan', $kunjungan->keluhan) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'keluhan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_diagnosis_utama">{{ __('Diagnosis Utama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('diagnosis_utama') ? ' has-danger' : '' }}">
                                        <input type="text" name="diagnosis_utama" id="input_diagnosis_utama"
                                        class="form-control{{ $errors->has('diagnosis_utama') ? ' is-invalid' : '' }}" value="{{ old('diagnosis_utama', $kunjungan->diagnosis_utama) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'diagnosis_utama'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_diagnosis_tambahan">{{ __('diagnosis_tambahan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('diagnosis_tambahan') ? ' has-danger' : '' }}">
                                        <input type="text" name="diagnosis_tambahan" id="input_diagnosis_tambahan"
                                        class="form-control{{ $errors->has('diagnosis_tambahan') ? ' is-invalid' : '' }}" value="{{ old('diagnosis_tambahan', $kunjungan->diagnosis_tambahan) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'diagnosis_tambahan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_icd">{{ __('icd') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('icd') ? ' has-danger' : '' }}">
                                        <input type="text" name="icd" id="input_icd"
                                        class="form-control{{ $errors->has('icd') ? ' is-invalid' : '' }}" value="{{ old('icd', $kunjungan->icd) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'icd'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_gds">{{ __('gds') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('gds') ? ' has-danger' : '' }}">
                                        <input type="text" name="gds" id="input_gds"
                                        class="form-control{{ $errors->has('gds') ? ' is-invalid' : '' }}" value="{{ old('gds', $kunjungan->gds) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'gds'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_au">{{ __('au') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('au') ? ' has-danger' : '' }}">
                                        <input type="text" name="au" id="input_au"
                                        class="form-control{{ $errors->has('au') ? ' is-invalid' : '' }}" value="{{ old('au', $kunjungan->au) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'au'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_choi">{{ __('choi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('choi') ? ' has-danger' : '' }}">
                                        <input type="text" name="choi" id="input_choi"
                                        class="form-control{{ $errors->has('choi') ? ' is-invalid' : '' }}" value="{{ old('choi', $kunjungan->choi) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'choi'])
                                    </div>
                                </div>
                            </div>

                            {{-- Bagian Tindakan --}}
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <h6 class="heading-small text-muted mb-3">{{ __('Tindakan') }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_nama_tindakan">{{ __('Nama Tindakan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama_tindakan') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama_tindakan" id="input_nama_tindakan"
                                        class="form-control{{ $errors->has('nama_tindakan') ? ' is-invalid' : '' }}" value="{{ old('nama_tindakan', $kunjungan->nama_tindakan) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'nama_tindakan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_operator">{{ __('operator') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('operator') ? ' has-danger' : '' }}">
                                        <input type="text" name="operator" id="input_operator"
                                        class="form-control{{ $errors->has('operator') ? ' is-invalid' : '' }}" value="{{ old('operator', $kunjungan->operator) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'operator'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_asisten">{{ __('asisten') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('asisten') ? ' has-danger' : '' }}">
                                        <input type="text" name="asisten" id="input_asisten"
                                        class="form-control{{ $errors->has('asisten') ? ' is-invalid' : '' }}" value="{{ old('asisten', $kunjungan->asisten) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'asisten'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
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
