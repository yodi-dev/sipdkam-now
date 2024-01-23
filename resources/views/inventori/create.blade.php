@extends('layouts.app', [
'namePage' => 'Create Inventori',
'class' => '',
'activePage' => 'datainventori',
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
                            <h3 class="mb-0">{{ __('Inventori Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('inventori.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('inventori.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_nama_item">{{ __('Nama Item') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('nama_item') ? ' has-danger' : '' }}">
                                    <input type="text" name="nama_item" id="input_nama_item"
                                    class="form-control{{ $errors->has('nama_item') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'nama_item'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_generik">{{ __('Generik') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('generik') ? ' has-danger' : '' }}">
                                    <input type="text" name="generik" id="input_generik"
                                    class="form-control{{ $errors->has('generik') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'generik'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_satuan">{{ __('Satuan') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('satuan') ? ' has-danger' : '' }}">
                                    <input type="text" name="satuan" id="input_satuan"
                                    class="form-control{{ $errors->has('satuan') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'satuan'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_stok">{{ __('Stok') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('stok') ? ' has-danger' : '' }}">
                                    <input type="number" name="stok" id="input_stok"
                                    class="form-control{{ $errors->has('stok') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'stok'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_expired_date">{{ __('Expired Date') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('expired_date') ? ' has-danger' : '' }}">
                                    <input type="date" name="expired_date" id="input_expired_date"
                                    class="form-control{{ $errors->has('expired_date') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'expired_date'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_locater">{{ __('Locater') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('locater') ? ' has-danger' : '' }}">
                                    <input type="text" name="locater" id="input_locater"
                                    class="form-control{{ $errors->has('locater') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'locater'])
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

