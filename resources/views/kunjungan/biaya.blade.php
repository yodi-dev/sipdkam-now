@extends('layouts.app', [
    'namePage' => 'Biaya Kunjungan',
    'class' => '',
    'activePage' => 'kunjungan',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content" style="margin-top: -120px">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Biaya') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a target="_blank" href="{{ url('kunjungan/Printbiaya',$id) }}" class="btn btn-secondary btn-round">{{ __('Print') }}</a>
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                        @if ($kunjungan['0']->biaya_id != null)
                        <form class="form-horizontal">
                            @foreach ($biaya as $item)
                                
                            @endforeach
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('adm') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->adm }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('obat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->obat }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('tuslah') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->tuslah }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('jasa_dokter') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->jasa_dokter }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('injeksi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->injeksi }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('jasa_tindakan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->jasa_tindakan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('bahp') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->bahp }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('lab') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->lab }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('pasang_infus') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->pasang_infus }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('cairan_infus') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->cairan_infus }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('akomodasi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->akomodasi }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('jasa_perawat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->jasa_perawat }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('diit') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->diit }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('lain_lain') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->lain_lain }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('pembulat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $item->pembulat }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="pl-lg-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save & Print') }}</button>
                                </div>
                            </div> --}}
                        </form>
                        @else
                        <p>Belum ada data biaya.</p>
                        <form method="post" class="form-horizontal" action="{{ route('biaya.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_adm">{{ __('adm') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('adm') ? ' has-danger' : '' }}">
                                        <input type="number" name="adm" id="input_adm"
                                        class="form-control{{ $errors->has('adm') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'adm'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_obat">{{ __('obat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('obat') ? ' has-danger' : '' }}">
                                        <input type="number" name="obat" id="input_obat"
                                        class="form-control{{ $errors->has('obat') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'obat'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_tuslah">{{ __('tuslah') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('tuslah') ? ' has-danger' : '' }}">
                                        <input type="number" name="tuslah" id="input_tuslah"
                                        class="form-control{{ $errors->has('tuslah') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'tuslah'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_jasa_dokter">{{ __('jasa_dokter') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('jasa_dokter') ? ' has-danger' : '' }}">
                                        <input type="number" name="jasa_dokter" id="input_jasa_dokter"
                                        class="form-control{{ $errors->has('jasa_dokter') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'jasa_dokter'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_injeksi">{{ __('injeksi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('injeksi') ? ' has-danger' : '' }}">
                                        <input type="number" name="injeksi" id="input_injeksi"
                                        class="form-control{{ $errors->has('injeksi') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'injeksi'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_jasa_tindakan">{{ __('jasa_tindakan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('jasa_tindakan') ? ' has-danger' : '' }}">
                                        <input type="number" name="jasa_tindakan" id="input_jasa_tindakan"
                                        class="form-control{{ $errors->has('jasa_tindakan') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'jasa_tindakan'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_bahp">{{ __('bahp') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('bahp') ? ' has-danger' : '' }}">
                                        <input type="number" name="bahp" id="input_bahp"
                                        class="form-control{{ $errors->has('bahp') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'bahp'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_lab">{{ __('lab') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('lab') ? ' has-danger' : '' }}">
                                        <input type="number" name="lab" id="input_lab"
                                        class="form-control{{ $errors->has('lab') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'lab'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_pasang_infus">{{ __('pasang_infus') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('pasang_infus') ? ' has-danger' : '' }}">
                                        <input type="number" name="pasang_infus" id="input_pasang_infus"
                                        class="form-control{{ $errors->has('pasang_infus') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'pasang_infus'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_cairan_infus">{{ __('cairan_infus') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('cairan_infus') ? ' has-danger' : '' }}">
                                        <input type="number" name="cairan_infus" id="input_cairan_infus"
                                        class="form-control{{ $errors->has('cairan_infus') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'cairan_infus'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_akomodasi">{{ __('akomodasi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('akomodasi') ? ' has-danger' : '' }}">
                                        <input type="number" name="akomodasi" id="input_akomodasi"
                                        class="form-control{{ $errors->has('akomodasi') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'akomodasi'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_jasa_perawat">{{ __('jasa_perawat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('jasa_perawat') ? ' has-danger' : '' }}">
                                        <input type="number" name="jasa_perawat" id="input_jasa_perawat"
                                        class="form-control{{ $errors->has('jasa_perawat') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'jasa_perawat'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_diit">{{ __('diit') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('diit') ? ' has-danger' : '' }}">
                                        <input type="number" name="diit" id="input_diit"
                                        class="form-control{{ $errors->has('diit') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'diit'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_lain_lain">{{ __('lain_lain') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('lain_lain') ? ' has-danger' : '' }}">
                                        <input type="number" name="lain_lain" id="input_lain_lain"
                                        class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'lain_lain'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label" for="input_pembulat">{{ __('pembulat') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group{{ $errors->has('pembulat') ? ' has-danger' : '' }}">
                                        <input type="number" name="pembulat" id="input_pembulat"
                                        class="form-control{{ $errors->has('pembulat') ? ' is-invalid' : '' }}" autofocus>
                                        @include('alerts.feedback', ['field' => 'pembulat'])
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save & Print') }}</button>
                                </div>
                            </div>
                        </form>
                        @endif
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
