@extends('layouts.app', [
    'namePage' => 'Detail Rekam Medis',
    'class' => '',
    'activePage' => 'rekammedis',
    'activeNav' => 'datapasien',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content" style="margin-top: -170px;">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Detail Rekam Medis') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('rekam.index') }}" class="btn btn-primary btn-round">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal mt-4">
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No RM') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->no_rm }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->no_bpjs }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Prolanis') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->prolanis }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->nama }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Kelamin') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->kelamin }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Tanggal Lahir') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->tgl_lahir }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Dusun') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->dusun }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('RT') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->rt }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('RW') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->rw }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Desa') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->desa }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Kecamatan') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->kecamatan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Kota/Kab') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->kota_kab }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No Telepon') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->no_telp }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Pemilik No Telepon') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->pemilik_no_telp }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('PPK Umum') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->ppk_umum }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Jenis Peserta BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->jenis_peserta_bpjs }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('Tanggal Mutasi BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->tgl_mutasi_bpjs }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No KK') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->no_kk }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label">{{ __('No BPJS') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                        value="{{ $rekam->no_bpjs }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Riwayat Kunjungan --}}
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Riwayat Kunjungan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('shift') }}</th>
                                <th>{{ __('Jaminan') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>{{ $item->shift }}</td>
                                <td>{{ $item->jaminan }}</td>
                                <td>{{ $item->no_rm }}</td>
                                <td>{{ $item->nama }}</td>
                                @can('manage-items', App\User::class)
                                    <td class="text-right">
                                        <a type="button" href="{{route("kunjungan.show",$item->id)}}" rel="tooltip" class="btn btn-info btn-icon btn-sm">
                                            <i class="now-ui-icons design_bullet-list-67"></i>
                                        </a>
                                    </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
