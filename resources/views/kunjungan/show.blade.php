@extends('layouts.app', [
    'namePage' => 'Detail Kunjungan',
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
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="item-form" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Kunjungan information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('rekam_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-NoRM">{{ __('No RM') }}</label><br>
                                <select title="{{ __('No RM') }}" data-style="btn btn-info btn-round" name="rekam_id" id="input-NoRM" data-size="7" class="selectpicker{{ $errors->has('rekam_id') ? ' is-invalid' : '' }}" placeholder="{{ __('No RM') }}" required>
                                    {{-- @foreach ($rekams as $rms)
                                        <option value="{{ $rms->id }}" {{ $rms->id == old('id') ? 'selected' : '' }}>{{ $rms->no_rm }} - {{ $rms->nama }}</option>
                                    @endforeach --}}
                                    {{-- <option value="">-</option>
                                    <option value="">-</option> --}}
                                </select>
                                @include('alerts.feedback', ['field' => 'rekam_id'])
                            </div>
                            <div class="form-group{{ $errors->has('dokter_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-Dokter">{{ __('Dokter') }}</label><br>
                                <select title="{{ __('Dokter') }}" data-style="btn btn-info btn-round" name="dokter_id" id="input-Dokter" data-size="7" class="selectpicker{{ $errors->has('dokter_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Dokter') }}" required>
                                    {{-- @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}" {{ $dokter->id == old('id') ? 'selected' : '' }}>{{ $dokter->nama_dokter }}</option>
                                    @endforeach --}}
                                    {{-- <option value="">-</option>
                                    <option value="">-</option> --}}
                                </select>
                                @include('alerts.feedback', ['field' => 'dokter_id'])
                            </div>
                            <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-Shift">{{ __('Shift') }}</label>
                                <input type="text" name="shift" id="input-Shift"
                                    class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Shift') }}" value="{{ old('shift') }}" autofocus>
                                @include('alerts.feedback', ['field' => 'shift'])
                            </div>
                            <div class="form-group{{ $errors->has('jaminan') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-Jaminan">{{ __('Jaminan') }}</label>
                                <input type="text" name="jaminan" id="input-Jaminan"
                                class="form-control{{ $errors->has('jaminan') ? ' is-invalid' : '' }}"
                                placeholder="{{ __('Jaminan') }}" value="{{ old('jaminan') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'jaminan'])
                            </div>
                            <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-Poli">{{ __('Poli') }}</label>
                                <input type="text" name="poli" id="input-Poli"
                                    class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Poli') }}" value="{{ old('poli') }}" required autofocus>
                                @include('alerts.feedback', ['field' => 'poli'])
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
