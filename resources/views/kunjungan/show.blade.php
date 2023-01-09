@extends('layouts.app', [
    'namePage' => 'Detail Kunjungan',
    'class' => '',
    'activePage' => 'kunjungan',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content"  style="margin-top: -120px;">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        @foreach ($data as $item)
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Detail Kunjungan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                @if (auth()->user()->can('update', $item) || auth()->user()->can('delete',
                                        $item))
                                    @can('update', $item)
                                    <a type="button" href="{{route("kunjungan.edit",$item->id)}}" rel="tooltip"
                                    class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                    @endcan
                                @endif
                                <a href="{{ route('kunjungan.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <legend>Kunjungan</legend>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Tanggal') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ format_tanggal($item->created_at) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Shift') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->shift }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Jaminan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->jaminan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Poli') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->poli }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Dokter') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->nama_dokter }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <legend>Pasien</legend>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No RM') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->no_rm }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->nama }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Jenis Kelamin') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->kelamin }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Usia') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $years }} tahun" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Dusun') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->dusun }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Desa') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->desa }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Kecamatan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->kecamatan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <legend>Pemeriksaan</legend>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('sis') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->sis }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('dias') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->dias }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('bb') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->bb }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('keluhan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->keluhan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('diagnosis utama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->diagnosis_utama }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('diagnosis tambahan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->diagnosis_tambahan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('icd') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->icd }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('gds') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->gds }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('au') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->au }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('choi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->choi }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-md-2 col-md-3">
                                    <legend>Tindakan</legend>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Tindakan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->tindakan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Operator') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->operator }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Asisten') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $item->asisten }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
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
