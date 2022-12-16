@extends('layouts.app', [
    'namePage' => 'Edit Kunjungan',
    'class' => '',
    'activePage' => 'kunjungan',
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
                                <h3 class="mb-0">{{ __('Kunjungan Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" action="{{ route('kunjungan.update', $kunjungan) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-3">{{ __('Kunjungan information') }}</h6>
                            <div class="pl-lg-4 mb-4">
                                {{-- <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    {{-- <input type="text" name="nama_dokter" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('nama_dokter', $dokter->nama_dokter) }}"  autofocus> --}}
                                    @include('alerts.feedback', ['field' => 'name'])
                                {{-- </div> --}}
                                <div class="form-group{{ $errors->has('rekam_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-NoRM">{{ __('No RM') }}</label><br>
                                    <select title="{{ __('No RM') }}" data-style="btn btn-info btn-round" name="rekam_id" id="input-NoRM" data-size="7" class="selectpicker{{ $errors->has('rekam_id') ? ' is-invalid' : '' }}" placeholder="" required>
                                        @foreach ($rekams as $rms)
                                            <option value="{{ $rms->id }}" {{ $rms->id == old('id') ? 'selected' : '' }}>{{ $rms->no_rm }} - {{ $rms->nama }}</option>
                                        @endforeach
                                        {{-- <option value="">-</option>
                                        <option value="">-</option> --}}
                                    </select>
                                    @include('alerts.feedback', ['field' => 'rekam_id'])
                                </div>
                                <div class="form-group{{ $errors->has('dokter_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-Dokter">{{ __('Dokter') }}</label><br>
                                    <select title="{{ __('Dokter') }}" data-style="btn btn-info btn-round" name="dokter_id" id="input-Dokter" data-size="7" class="selectpicker{{ $errors->has('dokter_id') ? ' is-invalid' : '' }}" placeholder="" required>
                                        @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id }}" {{ $dokter->id == old('id') ? 'selected' : '' }}>{{ $dokter->nama_dokter }}</option>
                                        @endforeach
                                        {{-- <option value="">-</option>
                                        <option value="">-</option> --}}
                                    </select>
                                    @include('alerts.feedback', ['field' => 'dokter_id'])
                                </div>
                                <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-Shift">{{ __('Shift') }}</label>
                                    <input type="text" name="shift" id="input-Shift"
                                        class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('shift') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'shift'])
                                </div>
                                <div class="form-group{{ $errors->has('jaminan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-Jaminan">{{ __('Jaminan') }}</label>
                                    <input type="text" name="jaminan" id="input-Jaminan"
                                    class="form-control{{ $errors->has('jaminan') ? ' is-invalid' : '' }}"
                                    placeholder="" value="{{ old('jaminan') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'jaminan'])
                                </div>
                                <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-Poli">{{ __('Poli') }}</label>
                                    <input type="text" name="poli" id="input-Poli"
                                        class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('poli') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'poli'])
                                </div>
                                
                            </div>

                            {{-- Bagian Pemeriksaan --}}
                            <h6 class="heading-small text-muted mb-3">{{ __('Pemeriksaan') }}</h6>
                            <div class="pl-lg-4 mb-4">
                                <div class="form-group{{ $errors->has('sis') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-sis">{{ __('Sis') }}</label>
                                    <input type="text" name="sis" id="input-sis"
                                        class="form-control{{ $errors->has('sis') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('sis') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'sis'])
                                </div>
                                <div class="form-group{{ $errors->has('dias') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-dias">{{ __('Dias') }}</label>
                                    <input type="text" name="dias" id="input-dias"
                                        class="form-control{{ $errors->has('dias') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('dias') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'dias'])
                                </div>
                                <div class="form-group{{ $errors->has('bb') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bb">{{ __('bb') }}</label>
                                    <input type="text" name="bb" id="input-bb"
                                        class="form-control{{ $errors->has('bb') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('bb') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'bb'])
                                </div>
                                <div class="form-group{{ $errors->has('keluhan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-keluhan">{{ __('keluhan') }}</label>
                                    <input type="text" name="keluhan" id="input-keluhan"
                                        class="form-control{{ $errors->has('keluhan') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('keluhan') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'keluhan'])
                                </div>
                                <div class="form-group{{ $errors->has('diagnosis utama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-diagnosis-utama">{{ __('Diagnosis utama') }}</label>
                                    <input type="text" name="diagnosis_utama" id="input-diagnosis-utama"
                                        class="form-control{{ $errors->has('diagnosis utama') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('diagnosis_utama') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'diagnosis utama'])
                                </div>
                                <div class="form-group{{ $errors->has('diagnosis-tambahan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-diagnosis-tambahan">{{ __('Diagnosis Tambahan') }}</label>
                                    <input type="text" name="diagnosis_tambahan" id="input-diagnosis-tambahan"
                                        class="form-control{{ $errors->has('diagnosis_tambahan') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('diagnosis_tambahan') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'diagnosis_tambahan'])
                                </div>
                                <div class="form-group{{ $errors->has('icd') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-icd">{{ __('icd') }}</label>
                                    <input type="text" name="icd" id="input-icd"
                                        class="form-control{{ $errors->has('icd') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('icd') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'icd'])
                                </div>
                                <div class="form-group{{ $errors->has('gds') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-gds">{{ __('gds') }}</label>
                                    <input type="text" name="gds" id="input-gds"
                                        class="form-control{{ $errors->has('gds') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('gds') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'gds'])
                                </div>
                                <div class="form-group{{ $errors->has('au') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-au">{{ __('au') }}</label>
                                    <input type="text" name="au" id="input-au"
                                        class="form-control{{ $errors->has('au') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('au') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'au'])
                                </div>
                                <div class="form-group{{ $errors->has('choi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-choi">{{ __('choi') }}</label>
                                    <input type="text" name="choi" id="input-choi"
                                        class="form-control{{ $errors->has('choi') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('choi') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'choi'])
                                </div>
                            </div>

                            {{-- Bagian Tindakan --}}
                            <h6 class="heading-small text-muted mb-3">{{ __('Tindakan') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nama_tindakan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama_tindakan">{{ __('Nama Tindakan') }}</label>
                                    <input type="text" name="nama_tindakan" id="input-nama_tindakan"
                                        class="form-control{{ $errors->has('nama_tindakan') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('nama_tindakan') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'nama_tindakan'])
                                </div>
                                <div class="form-group{{ $errors->has('operator') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-operator">{{ __('Operator') }}</label>
                                    <input type="text" name="operator" id="input-operator"
                                        class="form-control{{ $errors->has('operator') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('operator') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'operator'])
                                </div>
                                <div class="form-group{{ $errors->has('asisten') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-asisten">{{ __('Asisten') }}</label>
                                    <input type="text" name="asisten" id="input-asisten"
                                        class="form-control{{ $errors->has('asisten') ? ' is-invalid' : '' }}"
                                        placeholder="" value="{{ old('asisten') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'asisten'])
                                </div>
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
