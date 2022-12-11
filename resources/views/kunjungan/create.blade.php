@extends('layouts.app', [
'namePage' => 'Create Kunjungan',
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
                            <a href="{{ route('kunjungan.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('kunjungan.store') }}" autocomplete="off">
                        @csrf
                        <div class="col-lg-12">
                            <h6 class="heading-small text-muted mb-4">{{ __('Detail Kunjungan') }}</h6>
                            <div class="form-group{{ $errors->has('No RM') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="No RM">{{ __('No RM') }}</label><br>
                                <select title="{{ __('No RM') }}" data-style="btn btn-info btn-round" name="No RM" id="input-No RM" data-size="7" class="selectpicker{{ $errors->has('No RM') ? ' is-invalid' : '' }}" placeholder="{{ __('No RM') }}" required>
                                    <option value="">-</option>
                                    <option value="">-</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'No RM'])
                            </div>
                            <div class="form-group{{ $errors->has('Dokter') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="Dokter">{{ __('Dokter') }}</label><br>
                                <select title="{{ __('Dokter') }}" data-style="btn btn-info btn-round" name="Dokter" id="input-Dokter" data-size="7" class="selectpicker{{ $errors->has('Dokter') ? ' is-invalid' : '' }}" placeholder="{{ __('Dokter') }}" required>
                                    <option value="">-</option>
                                    <option value="">-</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'Dokter'])
                            </div>
                            <div class="form-group{{ $errors->has('Shift') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="Shift">{{ __('Shift') }}</label>
                                <input type="text" name="Shift" id="input-Shift"
                                    class="form-control{{ $errors->has('Shift') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Shift') }}" value="{{ old('Shift') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'Shift'])
                            </div>
                            <div class="form-group{{ $errors->has('Jaminan') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="Jaminan">{{ __('Jaminan') }}</label>
                                <input type="text" name="Jaminan" id="input-Jaminan"
                                class="form-control{{ $errors->has('Jaminan') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Jaminan') }}" value="{{ old('Jaminan') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'Jaminan'])
                            </div>
                            {{-- <div class="form-group{{ $errors->has('kelamin') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="kelamin">{{ __('Jenis Kelamin') }}</label><br>
                                <select title="{{ __('Kelamin') }}" data-style="btn btn-info btn-round" name="kelamin" id="input-kelamin" data-size="7" class="selectpicker{{ $errors->has('kelamin') ? ' is-invalid' : '' }}" placeholder="{{ __('Kelamin') }}" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'kelamin'])
                            </div> --}}
                            {{-- <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input class="form-control datepicker" name="tgl_lahir" id="tgl_lahir"
                                                placeholder="Select Tanggal Lahir" type="text" data-date-format="YYYY-MM-DD"
                                                value="{{ old('tgl_lahir', now()->format('d/m/Y')) }}">
                                {{-- <label class="form-control-label" for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                <input type="text" name="tgl_lahir" id="input-tgl_lahir"
                                    class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Tanggal Lahir') }}" value="{{ old('tgl_lahir') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'tgl_lahir']) --}}
                            {{-- </div>  --}}
                            <div class="form-group{{ $errors->has('Poli') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="Poli">{{ __('Poli') }}</label>
                                <input type="text" name="Poli" id="input-Poli"
                                    class="form-control{{ $errors->has('Poli') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Poli') }}" value="{{ old('Poli') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'Poli'])
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

