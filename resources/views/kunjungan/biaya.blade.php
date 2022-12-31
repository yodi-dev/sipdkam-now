@extends('layouts.app', [
    'namePage' => 'Biaya Kunjungan',
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
                                <h3 class="mb-0">{{ __('Biaya') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('adm') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-adm">{{ __('adm') }}</label>
                                    <input type="text" name="adm" id="input-adm"
                                        class="form-control{{ $errors->has('adm') ? ' is-invalid' : '' }}"
                                        value="{{ old('adm') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'adm'])
                                </div>
                                <div class="form-group{{ $errors->has('obat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-obat">{{ __('obat') }}</label>
                                    <input type="text" name="obat" id="input-obat"
                                    class="form-control{{ $errors->has('obat') ? ' is-invalid' : '' }}"
                                    value="{{ old('obat') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'obat'])
                                </div>
                                <div class="form-group{{ $errors->has('tuslah') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-tuslah">{{ __('tuslah') }}</label>
                                    <input type="text" name="tuslah" id="input-tuslah"
                                        class="form-control{{ $errors->has('tuslah') ? ' is-invalid' : '' }}"
                                        value="{{ old('tuslah') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'tuslah'])
                                </div>
                                <div class="form-group{{ $errors->has('jasa_dokter') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jasa_dokter">{{ __('jasa_dokter') }}</label>
                                    <input type="text" name="jasa_dokter" id="input-jasa_dokter"
                                        class="form-control{{ $errors->has('jasa_dokter') ? ' is-invalid' : '' }}"
                                        value="{{ old('jasa_dokter') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'jasa_dokter'])
                                </div>
                                <div class="form-group{{ $errors->has('injeksi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-injeksi">{{ __('injeksi') }}</label>
                                    <input type="text" name="injeksi" id="input-injeksi"
                                        class="form-control{{ $errors->has('injeksi') ? ' is-invalid' : '' }}"
                                        value="{{ old('injeksi') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'injeksi'])
                                </div>
                                <div class="form-group{{ $errors->has('jasa_tindakan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jasa_tindakan">{{ __('jasa_tindakan') }}</label>
                                    <input type="text" name="jasa_tindakan" id="input-jasa_tindakan"
                                        class="form-control{{ $errors->has('jasa_tindakan') ? ' is-invalid' : '' }}"
                                        value="{{ old('jasa_tindakan') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'jasa_tindakan'])
                                </div>
                                <div class="form-group{{ $errors->has('bahp') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bahp">{{ __('bahp') }}</label>
                                    <input type="text" name="bahp" id="input-bahp"
                                        class="form-control{{ $errors->has('bahp') ? ' is-invalid' : '' }}"
                                        value="{{ old('bahp') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'bahp'])
                                </div>
                                <div class="form-group{{ $errors->has('lab') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lab">{{ __('lab') }}</label>
                                    <input type="text" name="lab" id="input-lab"
                                        class="form-control{{ $errors->has('lab') ? ' is-invalid' : '' }}"
                                        value="{{ old('lab') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'lab'])
                                </div>
                                <div class="form-group{{ $errors->has('pasang_infus') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pasang_infus">{{ __('pasang_infus') }}</label>
                                    <input type="text" name="pasang_infus" id="input-pasang_infus"
                                        class="form-control{{ $errors->has('pasang_infus') ? ' is-invalid' : '' }}"
                                        value="{{ old('pasang_infus') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'pasang_infus'])
                                </div>
                                <div class="form-group{{ $errors->has('cairan_infus') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cairan_infus">{{ __('cairan_infus') }}</label>
                                    <input type="text" name="cairan_infus" id="input-cairan_infus"
                                        class="form-control{{ $errors->has('cairan_infus') ? ' is-invalid' : '' }}"
                                        value="{{ old('cairan_infus') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'cairan_infus'])
                                </div>
                                <div class="form-group{{ $errors->has('akomodasi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-akomodasi">{{ __('akomodasi') }}</label>
                                    <input type="text" name="akomodasi" id="input-akomodasi"
                                        class="form-control{{ $errors->has('akomodasi') ? ' is-invalid' : '' }}"
                                        value="{{ old('akomodasi') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'akomodasi'])
                                </div>
                                <div class="form-group{{ $errors->has('jasa_perawat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-jasa_perawat">{{ __('jasa_perawat') }}</label>
                                    <input type="text" name="jasa_perawat" id="input-jasa_perawat"
                                        class="form-control{{ $errors->has('jasa_perawat') ? ' is-invalid' : '' }}"
                                        value="{{ old('jasa_perawat') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'jasa_perawat'])
                                </div>
                                <div class="form-group{{ $errors->has('diit') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-diit">{{ __('diit') }}</label>
                                    <input type="text" name="diit" id="input-diit"
                                        class="form-control{{ $errors->has('diit') ? ' is-invalid' : '' }}"
                                        value="{{ old('diit') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'diit'])
                                </div>
                                <div class="form-group{{ $errors->has('lain_lain') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lain_lain">{{ __('lain_lain') }}</label>
                                    <input type="text" name="lain_lain" id="input-lain_lain"
                                        class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                        value="{{ old('lain_lain') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'lain_lain'])
                                </div>
                                <div class="form-group{{ $errors->has('pembulat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pembulat">{{ __('pembulat') }}</label>
                                    <input type="text" name="pembulat" id="input-pembulat"
                                        class="form-control{{ $errors->has('pembulat') ? ' is-invalid' : '' }}"
                                        value="{{ old('pembulat') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'pembulat'])
                                </div>
                                <div class="form-group{{ $errors->has('total') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-total">{{ __('total') }}</label>
                                    <input type="text" name="total" id="input-total"
                                        class="form-control{{ $errors->has('total') ? ' is-invalid' : '' }}"
                                        value="{{ old('total') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'total'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save & Print') }}</button>
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
