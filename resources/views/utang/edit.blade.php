@extends('layouts.app', [
    'namePage' => 'Edit Utang',
    'class' => '',
    'activePage' => 'utang',
    'activeNav' => 'operasional',
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
                                <h3 class="mb-0">{{ __('Utang Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('utang.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ route('utang.update', $utang) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_tanggal">{{ __('Tanggal') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                                        <input type="date" name="tanggal" id="input_tanggal"
                                        class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" value="{{ old('tanggal', $utang->tanggal) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'tanggal'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_nama">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama" id="input_nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                        value="{{ old('nama', $utang->nama) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'nama'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_utang">{{ __('Nominal') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('utang') ? ' has-danger' : '' }}">
                                        <input type="number" name="utang" id="input_utang"
                                        class="form-control{{ $errors->has('utang') ? ' is-invalid' : '' }}" value="{{ old('utang', $utang->utang) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'utang'])
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
