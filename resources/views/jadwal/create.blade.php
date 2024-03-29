@extends('layouts.app', [
'namePage' => 'Create Jadwal',
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
                            <a href="{{ route('jadwal.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('jadwal.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-2 col-form-label required" for="input_tanggal">{{ __('Tanggal') }}</label>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
                                    <input type="date" name="tanggal" id="input_tanggal" class="form-control{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" autofocus required>
                                    @include('alerts.feedback', ['field' => 'tanggal'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label required" for="input_bagian">{{ __('Bagian') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('bagian') ? ' has-danger' : '' }}">
                                    {{-- <input type="text" name="bagian" id="input_bagian" class="form-control{{ $errors->has('bagian') ? ' is-invalid' : '' }}" autofocus required> --}}
                                    <select title="{{ __('Pilih bagian') }}" data-style="btn btn-info btn-round"
                                    name="bagian" data-size="7"
                                    class="selectpicker{{ $errors->has('bagian') ? ' is-invalid' : '' }} select2"
                                    required>
                                        {{-- <option {{ $shift == 1 ? 'selected' : '' }} value="1">1</option> --}}
                                        <option value="Dokter Umum">Dokter Umum</option>
                                        <option value="Petugas">Petugas</option>
                                        <option value="Kerumahtanggaan">Kerumahtanggaan</option>
                                        <option value="Keamanan">Keamanan</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'bagian'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label required" for="input_shift">{{ __('Shift') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                    {{-- <input type="text" name="shift" id="input_shift" class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}" autofocus required> --}}
                                    <select title="{{ __('Pilih Shift') }}" data-style="btn btn-info btn-round"
                                    name="shift" data-size="7"
                                    class="selectpicker{{ $errors->has('shift') ? ' is-invalid' : '' }} select2"
                                    required>
                                        <option {{ $shift == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $shift == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $shift == 3 ? 'selected' : '' }} value="3">3</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'shift'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label required" for="input_nama">{{ __('Nama') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    {{-- <input type="text" name="nama" id="input_nama" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" autofocus required> --}}
                                    <select title="{{ __('Pilih nama') }}" data-style="btn btn-info btn-round"
                                    name="nama" data-size="7"
                                    class="selectpicker{{ $errors->has('nama') ? ' is-invalid' : '' }} select2"
                                    required>
                                        <option value="Irza">Irza</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'nama'])
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
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

