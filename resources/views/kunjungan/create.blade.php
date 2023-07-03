@extends('layouts.app', [
'namePage' => 'Tambah Kunjungan',
'class' => '',
'activePage' => 'kunjungan',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -120px;">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Kunjungan Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('kunjungan.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('kunjungan.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-2 col-form-label">Shift</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                    <select title="{{ __('Pilih Shift') }}" data-style="btn btn-info btn-round"
                                    name="shift" data-size="7"
                                    class="selectpicker{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                    required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    {{-- <input type="text" name="shift" id="input-Shift"
                                    class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                    value="{{ old('shift') }}" autofocus> --}}
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
                                        <option value="bpjs">BPJS</option>
                                        <option value="regular">Regular</option>
                                    </select>
                                    {{-- <input type="text" name="jaminan" id="input-Jaminan"
                                    class="form-control{{ $errors->has('jaminan') ? ' is-invalid' : '' }}"
                                    value="{{ old('jaminan') }}" required autofocus> --}}
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
                                        <option value="gigi">Gigi</option>
                                        <option value="home_care">Home Care</option>
                                        <option value="kb">KB</option>
                                        <option value="observasi">Observasi</option>
                                        <option value="umum">Umum</option>
                                    </select>
                                    {{-- <input type="text" name="poli" id="input-Poli"
                                    class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}"
                                    value="{{ old('poli') }}" required autofocus> --}}
                                    @include('alerts.feedback', ['field' => 'poli'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input-NoRM">{{ __('No RM') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('rekam_id') ? ' has-danger' : '' }}">
                                    <select id="selectrm" title="{{ __('Pilih RM') }}" data-style="btn btn-info btn-round" name="rekam_id"
                                    id="input-NoRM" data-size="7"
                                    class="selectpicker{{ $errors->has('rekam_id') ? ' is-invalid' : '' }}"
                                    required>
                                        @foreach ($rekams as $rms)
                                        <option value="{{ $rms->id }}" {{ $rms->id == old('id') ? 'selected' : '' }}>
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
                                        <option value="{{ $dokter->id }}" {{ $dokter->id == old('id') ? 'selected' : '' }}>
                                            {{ $dokter->nama_dokter }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'dokter_id'])
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
            .create(document.querySelector('#editor'))
            .then(editor => {})
            .catch(error => {});
    });

    $('#selectrm').select2({
        width: '14rem',
        placeholder: "Pilih RM",
        allowClear: true
    });

</script>
@endpush
