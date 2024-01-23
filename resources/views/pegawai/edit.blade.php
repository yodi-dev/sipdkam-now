@extends('layouts.app', [
    'namePage' => 'Edit Pegawai',
    'class' => '',
    'activePage' => 'datapegawai',
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
                                <h3 class="mb-0">{{ __('Pegawai Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" action="{{ route('pegawai.update', $pegawai) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <label class="col-md-2 col-form-label required" for="input_nama_pegawai">{{ __('Nama Pegawai') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('nama_pegawai') ? ' has-danger' : '' }}">
                                        <input type="text" name="nama_pegawai" id="input_nama_pegawai"
                                        class="form-control{{ $errors->has('nama_pegawai') ? ' is-invalid' : '' }}" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}" autofocus required>
                                        @include('alerts.feedback', ['field' => 'nama_pegawai'])
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
