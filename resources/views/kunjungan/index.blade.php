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
                    <h4 class="card-title">{{ bulan_now() }} {{ tahun_now() }}</h4>
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
                    <a class="btn btn-sm btn-primary btn-round pull-right text-white mb-2" href="{{ route('alldata.kunjungan') }}">{{ __('All') }}</a>
                </div>
            </div>
        </div>
        <!-- end content-->
    </div>
    <!--  end card  -->
</div>
@endsection

@push('js')
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
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
</script> --}}
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

        var table = $('#datatable').DataTable();z

        // // Edit record
        // table.on('click', '.edit', function () {
        //     $tr = $(this).closest('tr');
        //     if ($($tr).hasClass('child')) {
        //         $tr = $tr.prev('.parent');
        //     }

        //     var data = table.row($tr).data();
        //     alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        // });

        // // Delete a record
        // table.on('click', '.remove', function (e) {
        //     $tr = $(this).closest('tr');
        //     if ($($tr).hasClass('child')) {
        //         $tr = $tr.prev('.parent');
        //     }
        //     table.row($tr).remove().draw();
        //     e.preventDefault();
        // });

        // //Like record
        // table.on('click', '.like', function () {
        //     alert('You clicked on Like button');
        // });
    });

</script>
@endpush
