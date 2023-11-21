@extends('layouts.app', [
    'namePage' => 'Edit Jadwal',
    'class' => '',
    'activePage' => 'jadwal',
    'activeNav' => 'klinik',
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
                                <h3 class="mb-0">{{ __('Jadwal Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('jadwal.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ route('jadwal.update', $jadwal) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_tanggal">{{ __('Tanggal') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                                        <input type="date" name="tanggal" id="input_tanggal"
                                        class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" value="{{ old('tanggal', $jadwal->tanggal) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'tanggal'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_bagian">{{ __('Bagian') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('bagian') ? ' has-danger' : '' }}">
                                        <input type="text" name="bagian" id="input_bagian"
                                        class="form-control{{ $errors->has('bagian') ? ' is-invalid' : '' }}" value="{{ old('bagian', $jadwal->bagian) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'bagian'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_shift">{{ __('Shift') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                        <input type="text" name="shift" id="input_shift"
                                        class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}" value="{{ old('shift', $jadwal->shift) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'shift'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_nama">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama" id="input_nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                        value="{{ old('nama', $jadwal->nama) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'nama'])
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
