@extends('layouts.app', [
    'namePage' => 'Edit Obat',
    'class' => '',
    'activePage' => 'dataObat',
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
                                <h3 class="mb-0">{{ __('Obat Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('obat.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ route('obat.update', $obat) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_nama_obat">{{ __('Nama Obat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama_obat') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama_obat" id="input_nama_obat"
                                        class="form-control{{ $errors->has('nama_obat') ? ' is-invalid' : '' }}" value="{{ old('nama_obat', $obat->nama_obat) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'nama_obat'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_harga_obat">{{ __('Harga Obat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('harga_obat') ? ' has-danger' : '' }}">
                                        <input type="number" name="harga_obat" id="input_harga_obat" class="form-control{{ $errors->has('harga_obat') ? ' is-invalid' : '' }}"
                                        value="{{ old('harga_obat', $obat->harga_obat) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'harga_obat'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_stok">{{ __('Stok') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('stok') ? ' has-danger' : '' }}">
                                        <input type="number" name="stok" id="input_stok"
                                        class="form-control{{ $errors->has('stok') ? ' is-invalid' : '' }}" value="{{ old('stok', $obat->stok) }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'stok'])
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
