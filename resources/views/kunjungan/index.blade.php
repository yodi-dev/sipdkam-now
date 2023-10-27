@extends('layouts.app',[
'namePage' => 'Kunjungan',
'class' => '',
'activePage' => 'kunjungan',
'activeNav' => 'datapasien',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" id="controller" style="margin-top: -170px;">
    <div class="row">
        <div class="col-md-12" id="categories-table">
            <div class="card">
                <div class="card-header">
                    @can('manage-items', App\User::class)
                        <a class="btn btn-primary btn-round pull-right text-white" href="{{ route('rekam.create') }}">{{ __('RM Baru') }}</a>
                        <a class="btn btn-primary btn-round pull-right text-white "
                        href="{{ route('kunjungan.create') }}">{{ __('Kunjungan Baru') }}</a>
                    @endcan
                    <h4 class="card-title">{{ __('Oktober 2023') }}</h4>
                    <div class="col-12 mt-2">
                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('shift') }}</th>
                                <th>{{ __('Jaminan') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                @can('manage-items', App\User::class)
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                @elsecan('manage-dokter', App\User::class)
                                    <th class="disabled-sorting">{{ __('Actions') }}</th>
                                @endcan
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
                                    <a type="button" href="{{ url("kunjungan/biaya", $item->id) }}" rel="tooltip"
                                    class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons business_money-coins"></i>
                                    </a>
                                    @if (auth()->user()->can('update', $item) || auth()->user()->can('delete',
                                        $item))
                                    
                                    @can('update', $item)
                                        <a type="button" href="{{route("kunjungan.edit",$item->id)}}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $item)
                                    <form action="{{ route('kunjungan.destroy', $item) }}" method="post"
                                    style="display:inline-block;" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="button" rel="tooltip"
                                    class="btn btn-danger btn-icon btn-sm delete-button" data-original-title=""
                                    title="" onclick="demo.showSwal('warning-message-and-confirmation')">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                    </form>
                                    @endcan
                                    @endif
                                </td>
                            @elsecan('manage-dokter', App\User::class)
                                <td>
                                    <a type="button" href="{{route("kunjungan.edit",$item->id)}}" rel="tooltip"
                                    class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                </td>
                            @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-primary btn-round pull-right text-white mb-2" href="#">{{ __('All') }}</a>
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

<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="item-form" enctype="multipart/form-data">
                    @foreach ($data as $item)
                        
                    
                    <h6 class="heading-small text-muted mb-3">{{ __('Kunjungan information') }}</h6>
                    <div class="pl-lg-4 mb-4">
                        @include('alerts.feedback', ['field' => 'name'])

                        {{-- @if ($_POST == true)
                            $shift = $_POST['shift'];
                            
                            <input type="text" class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}" value="{{ $shift }}>
                        @endif --}}
                        {{-- </div> --}}
                        <div class="form-group{{ $errors->has('rekam_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-NoRM">{{ __('No RM') }}</label><br>
                            <select title="{{ __('No RM') }}" data-style="btn btn-info btn-round"
                                name="rekam_id" id="input-NoRM" data-size="7"
                                class="selectpicker{{ $errors->has('rekam_id') ? ' is-invalid' : '' }}"
                                required>
                                @foreach ($rekams as $rms)
                                <option value="{{ $rms->id }}"
                                    {{ $rms->id == old('id') ? 'selected' : '' }}>{{ $rms->no_rm }}
                                    - {{ $rms->nama }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'rekam_id'])
                        </div>
                        <div class="form-group{{ $errors->has('dokter_id') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-Dokter">{{ __('Dokter') }}</label><br>
                            <select title="{{ __('Dokter') }}" data-style="btn btn-info btn-round"
                                name="dokter_id" id="input-Dokter" data-size="7"
                                class="selectpicker{{ $errors->has('dokter_id') ? ' is-invalid' : '' }}"
                                placeholder="" required>
                                @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}"
                                    {{ $dokter->id == old('id') ? 'selected' : '' }}>
                                    {{ $dokter->nama_dokter }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'dokter_id'])
                        </div>
                        <div class="form-group{{ $errors->has('shift') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-Shift">{{ __('Shift') }}</label>
                            <input type="text" class="form-control{{ $errors->has('shift') ? ' is-invalid' : '' }}"
                                value="{{ $item->shift }} {{ old($item->shift) }}" autofocus>
                            @include('alerts.feedback', ['field' => 'shift'])
                        </div>
                        <div class="form-group{{ $errors->has('jaminan') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-Jaminan">{{ __('Jaminan') }}</label>
                            <input type="text" name="jaminan" id="input-Jaminan"
                                class="form-control{{ $errors->has('jaminan') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('jaminan') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'jaminan'])
                        </div>
                        <div class="form-group{{ $errors->has('poli') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-Poli">{{ __('Poli') }}</label>
                            <input type="text" name="poli" id="input-Poli"
                                class="form-control{{ $errors->has('poli') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('poli') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'poli'])
                        </div>

                    </div>

                    {{-- Bagian Pemeriksaan --}}
                    <h6 class="heading-small text-muted mb-3">{{ __('Pemeriksaan') }}</h6>
                    <div class="pl-lg-4 mb-4">
                        <div class="form-group{{ $errors->has('sis') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-sis">{{ __('Sis') }}</label>
                            <input type="text" name="sis" id="input-sis"
                                class="form-control{{ $errors->has('sis') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('sis') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'sis'])
                        </div>
                        <div class="form-group{{ $errors->has('dias') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-dias">{{ __('Dias') }}</label>
                            <input type="text" name="dias" id="input-dias"
                                class="form-control{{ $errors->has('dias') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('dias') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'dias'])
                        </div>
                        <div class="form-group{{ $errors->has('bb') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-bb">{{ __('bb') }}</label>
                            <input type="text" name="bb" id="input-bb"
                                class="form-control{{ $errors->has('bb') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('bb') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'bb'])
                        </div>
                        <div class="form-group{{ $errors->has('keluhan') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-keluhan">{{ __('keluhan') }}</label>
                            <input type="text" name="keluhan" id="input-keluhan"
                                class="form-control{{ $errors->has('keluhan') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('keluhan') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'keluhan'])
                        </div>
                        <div
                            class="form-group{{ $errors->has('diagnosis utama') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-diagnosis-utama">{{ __('Diagnosis utama') }}</label>
                            <input type="text" name="diagnosis_utama" id="input-diagnosis-utama"
                                class="form-control{{ $errors->has('diagnosis utama') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('diagnosis_utama') }}" required
                                autofocus>
                            @include('alerts.feedback', ['field' => 'diagnosis utama'])
                        </div>
                        <div
                            class="form-group{{ $errors->has('diagnosis-tambahan') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-diagnosis-tambahan">{{ __('Diagnosis Tambahan') }}</label>
                            <input type="text" name="diagnosis_tambahan"
                                id="input-diagnosis-tambahan"
                                class="form-control{{ $errors->has('diagnosis_tambahan') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('diagnosis_tambahan') }}" required
                                autofocus>
                            @include('alerts.feedback', ['field' => 'diagnosis_tambahan'])
                        </div>
                        <div class="form-group{{ $errors->has('icd') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-icd">{{ __('icd') }}</label>
                            <input type="text" name="icd" id="input-icd"
                                class="form-control{{ $errors->has('icd') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('icd') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'icd'])
                        </div>
                        <div class="form-group{{ $errors->has('gds') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-gds">{{ __('gds') }}</label>
                            <input type="text" name="gds" id="input-gds"
                                class="form-control{{ $errors->has('gds') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('gds') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'gds'])
                        </div>
                        <div class="form-group{{ $errors->has('au') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-au">{{ __('au') }}</label>
                            <input type="text" name="au" id="input-au"
                                class="form-control{{ $errors->has('au') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('au') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'au'])
                        </div>
                        <div class="form-group{{ $errors->has('choi') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-choi">{{ __('choi') }}</label>
                            <input type="text" name="choi" id="input-choi"
                                class="form-control{{ $errors->has('choi') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('choi') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'choi'])
                        </div>
                    </div>

                    {{-- Bagian Tindakan --}}
                    <h6 class="heading-small text-muted mb-3">{{ __('Tindakan') }}</h6>
                    <div class="pl-lg-4">
                        <div
                            class="form-group{{ $errors->has('nama_tindakan') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-nama_tindakan">{{ __('Nama Tindakan') }}</label>
                            <input type="text" name="nama_tindakan" id="input-nama_tindakan"
                                class="form-control{{ $errors->has('nama_tindakan') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('nama_tindakan') }}" required
                                autofocus>
                            @include('alerts.feedback', ['field' => 'nama_tindakan'])
                        </div>
                        <div class="form-group{{ $errors->has('operator') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-operator">{{ __('Operator') }}</label>
                            <input type="text" name="operator" id="input-operator"
                                class="form-control{{ $errors->has('operator') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('operator') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'operator'])
                        </div>
                        <div class="form-group{{ $errors->has('asisten') ? ' has-danger' : '' }}">
                            <label class="form-control-label"
                                for="input-asisten">{{ __('Asisten') }}</label>
                            <input type="text" name="asisten" id="input-asisten"
                                class="form-control{{ $errors->has('asisten') ? ' is-invalid' : '' }}"
                                placeholder="" value="{{ old('asisten') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'asisten'])
                        </div>
                    </div>
            </div>
            @endforeach
            </form>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
<script>
    var actUrl = '{{ url('kunjungans') }}';
    var apiUrl = '{{ url('api/kunjungans') }}';
    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable: true},   
        {data: 'name', class: 'text-center', orderable: true},
        {data: 'email', class: 'text-center', orderable: true},
        {data: 'phone_number', class: 'text-center', orderable: true},
        {data: 'address', class: 'text-center', orderable: true},
        {data: 'date', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta) {
            return `
            <a href="#" onclick="controller.editData(event, ${meta.row})" class="btn btn-sm btn-warning">Edit</a>
            <a href="#" onclick="controller.deleteData(event, ${data.id})" class="btn btn-sm btn-danger">Delete</a>`;
        }, orderable: false, width: '110px', class: 'text-center'},
    ];
</script>
<script>
var controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        data: {},
        actUrl,
        apiUrl,
    },
    mounted: function() {
        this.datatable();
    },
    methods: {
        datatable(){
            const _this = this;
            _this.table = $('#dataTable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        showData(event, row) {
            this.data = this.datas[row];
            $('#showModal').modal('show');    
            console.log(row)
        }
    }
});
</script>
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
