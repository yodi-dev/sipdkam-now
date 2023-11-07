@extends('layouts.app', [
'namePage' => 'Menambahkan Alat Medis',
'class' => '',
'activePage' => 'alatmedis',
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
                            <h3 class="mb-0">{{ __('Alat Medis Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('alatmedik.index') }}"
                                class="btn btn-primary btn-round">{{ __('Back to list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('alatmedik.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label class="col-md-2 col-form-label" for="input_nama">{{ __('Nama') }}</label>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <input type="text" name="nama" id="input_nama"
                                    class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'nama'])
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

