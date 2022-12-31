@extends('layouts.app', [
'namePage' => 'Rekam Medis',
'class' => '',
'activePage' => 'rekammedis',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -150px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round pull-right text-white"
                        href="{{ route('rekam.create') }}">{{ __('Baru') }}</a>
                    <h4 class="card-title">{{ __('Rekam Medis') }}</h4>
                    <div class="col-12 mt-2">
                        {{-- @include('alerts.success')
                        @include('alerts.errors') --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('No BPJS') }}</th>
                                <th>{{ __('Prolanis') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('Jenis Kelamin') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('No BPJS') }}</th>
                                <th>{{ __('Prolanis') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('Jenis Kelamin') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($rekams as $rms)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $rms->no_rm }}</td>
                                <td>{{ $rms->no_bpjs }}</td>
                                <td> {{$rms->prolanis}}</td>
                                <td>{{$rms->nama}}</td>
                                <td>{{ $rms->kelamin }}</td>
                                @can('manage-items', App\User::class)
                                <td class="text-right">
                                    <a type="button" href="{{route("rekam.show",$rms)}}" rel="tooltip"
                                    class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                    <i class="now-ui-icons design_bullet-list-67"></i>
                                    </a>
                                    @if (auth()->user()->can('update', $rms) || auth()->user()->can('delete', $rms))
                                    @can('update', $rms)
                                    <a type="button" href="{{route("rekam.edit",$rms)}}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                    @endcan
                                    <form action="{{ route('rekam.destroy', $rms) }}" method="post"
                                        style="display:inline-block;" class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="button" rel="tooltip"
                                            class="btn btn-danger btn-icon btn-sm delete-button" data-original-title=""
                                            title="" onclick="demo.showSwal('warning-message-and-confirmation')">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Rekam Medis</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="item-form" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="col-lg-12">
                                            <div class="form-group{{ $errors->has('no_rm') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="no_rm">{{ __('No RM') }}</label>
                                                <input type="text" name="no_rm" id="input-no_rm"
                                                    class="form-control{{ $errors->has('no_rm') ? ' is-invalid' : '' }}"
                                                    value="{{ old('no_rm', $rms->no_rm) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'no_rm'])
                                            </div>
                                            <div class="form-group{{ $errors->has('no_bpjs') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="no_bpjs">{{ __('No BPJS') }}</label>
                                                <input type="text" name="no_bpjs" id="input-no_bpjs"
                                                    class="form-control{{ $errors->has('no_bpjs') ? ' is-invalid' : '' }}"
                                                    value="{{ old('no_bpjs', $rms->no_bpjs) }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'no_bpjs'])
                                            </div>
                                            <div class="form-group{{ $errors->has('prolanis') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="prolanis">{{ __('Prolanis') }}</label>
                                                <input type="text" name="prolanis" id="input-prolanis"
                                                    class="form-control{{ $errors->has('prolanis') ? ' is-invalid' : '' }}"
                                                    value="{{ old('prolanis', $rms->prolanis) }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'prolanis'])
                                            </div>
                                            <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="nama">{{ __('Nama') }}</label>
                                                <input type="text" name="nama" id="input-nama"
                                                    class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                                    value="{{ old('nama', $rms->nama) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'nama'])
                                            </div>
                                            <div class="form-group{{ $errors->has('kelamin') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="kelamin">{{ __('Jenis Kelamin') }}</label><br>
                                                <select title="{{ __('Kelamin') }}" data-style="btn btn-info btn-round"
                                                    name="kelamin" id="input-kelamin" data-size="7"
                                                    class="selectpicker{{ $errors->has('kelamin') ? ' is-invalid' : '' }}"
                                                    required disabled>
                                                    <option value="{{ $rms->kelamin }}"
                                                        {{ $rms->kelamin == old('kelamin', $rms->kelamin) ? 'selected' : '' }}>
                                                        {{ $rms->kelamin }}</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                                @include('alerts.feedback', ['field' => 'kelamin'])
                                            </div>
                                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="tgl_lahir">{{ __('Tanggal Lahir') }}</label>
                                                <input class="form-control datepicker" name="tgl_lahir" id="tgl_lahir"
                                                    type="text" data-date-format="YYYY-MM-DD"
                                                    value="{{ old('tgl_lahir', $rms->tgl_lahir) }}" disabled>
                                            </div>
                                            <div class="form-group{{ $errors->has('dusun') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="dusun">{{ __('Dusun') }}</label>
                                                <input type="text" name="dusun" id="input-dusun"
                                                    class="form-control{{ $errors->has('dusun') ? ' is-invalid' : '' }}"
                                                    value="{{ old('dusun', $rms->dusun) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'dusun'])
                                            </div>
                                            <div class="form-group{{ $errors->has('rt') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="rt">{{ __('RT') }}</label>
                                                <input type="text" name="rt" id="input-rt"
                                                    class="form-control{{ $errors->has('rt') ? ' is-invalid' : '' }}"
                                                    value="{{ old('rt', $rms->rt) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'rt'])
                                            </div>
                                            <div class="form-group{{ $errors->has('rw') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="rw">{{ __('RW') }}</label>
                                                <input type="text" name="rw" id="input-rw"
                                                    class="form-control{{ $errors->has('rw') ? ' is-invalid' : '' }}"
                                                    value="{{ old('rw', $rms->rw) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'rw'])
                                            </div>
                                            <div class="form-group{{ $errors->has('desa') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="desa">{{ __('Desa') }}</label>
                                                <input type="text" name="desa" id="input-desa"
                                                    class="form-control{{ $errors->has('desa') ? ' is-invalid' : '' }}"
                                                    value="{{ old('desa', $rms->desa) }}" required autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'desa'])
                                            </div>
                                            <div class="form-group{{ $errors->has('kecamatan') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="kecamatan">{{ __('Kecamatan') }}</label>
                                                <input type="text" name="kecamatan" id="input-kecamatan"
                                                    class="form-control{{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
                                                    value="{{ old('kecamatan', $rms->kecamatan) }}" required autofocus
                                                    disabled>
                                                @include('alerts.feedback', ['field' => 'kecamatan'])
                                            </div>
                                            <div class="form-group{{ $errors->has('kota_kab') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="kota_kab">{{ __('Kota/Kab') }}</label>
                                                <input type="text" name="kota_kab" id="input-kota_kab"
                                                    class="form-control{{ $errors->has('kota_kab') ? ' is-invalid' : '' }}"
                                                    value="{{ old('kota_kab', $rms->kota_kab) }}" required autofocus
                                                    disabled>
                                                @include('alerts.feedback', ['field' => 'kota_kab'])
                                            </div>
                                            <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="no_telp">{{ __('No Telepon') }}</label>
                                                <input type="text" name="no_telp" id="input-no_telp"
                                                    class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
                                                    value="{{ old('no_telp', $rms->no_telp) }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'no_telp'])
                                            </div>
                                            <div
                                                class="form-group{{ $errors->has('pemilik_no_telp') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="pemilik_no_telp">{{ __('Pemilik Nomor Telepon') }}</label>
                                                <input type="text" name="pemilik_no_telp" id="input-pemilik_no_telp"
                                                    class="form-control{{ $errors->has('pemilik_no_telp', $rms->pemilik_no_telp) ? ' is-invalid' : '' }}"
                                                    value="{{ old('pemilik_no_telp') }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'pemilik_no_telp'])
                                            </div>
                                            <div class="form-group{{ $errors->has('ppk_umum') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="ppk_umum">{{ __('PPK Umum') }}</label>
                                                <input type="text" name="ppk_umum" id="input-ppk_umum"
                                                    class="form-control{{ $errors->has('ppk_umum') ? ' is-invalid' : '' }}"
                                                    value="{{ old('ppk_umum', $rms->ppk_umum) }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'ppk_umum'])
                                            </div>
                                            <div
                                                class="form-group{{ $errors->has('jenis_peserta_bpjs') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="jenis_peserta_bpjs">{{ __('Jenis Peserta BPJS') }}</label>
                                                <input type="text" name="jenis_peserta_bpjs"
                                                    id="input-jenis_peserta_bpjs"
                                                    class="form-control{{ $errors->has('jenis_peserta_bpjs') ? ' is-invalid' : '' }}"
                                                    value="{{ old('jenis_peserta_bpjs', $rms->jenis_peserta_bpjs) }}"
                                                    autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'jenis_peserta_bpjs'])
                                            </div>
                                            <div
                                                class="form-group{{ $errors->has('tgl_mutasi_bpjs') ? ' has-danger' : '' }}">
                                                <label class="form-control-label"
                                                    for="tgl_mutasi_bpjs">{{ __('Tanggal Mutasi BPJS') }}</label>
                                                <input class="form-control datepicker" name="tgl_mutasi_bpjs"
                                                    id="tgl_mutasi_bpjs" type="text" data-date-format="DD-MM-YYYY"
                                                    value="{{ old('tgl_mutasi_bpjs', $rms->tgl_mutasi_bpjs) }}"
                                                    disabled>
                                                @include('alerts.feedback', ['field' => 'tgl_mutasi_bpjs'])
                                            </div>
                                            <div class="form-group{{ $errors->has('no_kk') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="no_kk">{{ __('No KK') }}</label>
                                                <input type="text" name="no_kk" id="input-no_kk"
                                                    class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}"
                                                    value="{{ old('no_kk', $rms->no_kk) }}" autofocus disabled>
                                                @include('alerts.feedback', ['field' => 'no_kk'])
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $(".delete-button").click(function () {
            var clickedButton = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!',
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    clickedButton.parents(".delete-form").submit();
                }
            })

        })
        $('#datatable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        var table = $('#datatable').DataTable();

        // Edit record
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });
    });

</script>
@endpush
