@extends('layouts.app',[
'namePage' => 'Kunjungan',
'class' => '',
'activePage' => 'kunjungan',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" id="controller" style="margin-top: -100px;">
    <div class="row">
        <div class="col-md-12" id="categories-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round pull-right text-white "
                        href="{{ route('rekam.create') }}">{{ __('RM Baru') }}</a>
                    <a class="btn btn-primary btn-round pull-right text-white "
                        href="{{ route('kunjungan.create') }}">{{ __('Kunjungan Baru') }}</a>
                    <h4 class="card-title">{{ __('Kunjungan') }}</h4>
                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('id') }}</th>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('shift') }}</th>
                                <th>{{ __('Jaminan') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                @can('manage-items', App\User::class)
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>{{ __('id') }}</th>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('shift') }}</th>
                                <th>{{ __('Jaminan') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                @can('manage-items', App\User::class)
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                @endcan
                            </tr>
                        </tfoot>
                    </table>
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
            <div class="modal-body" >
                <h1>TEST SHOW MODAL</h1>
            </div>
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
        {data: 'created_at', class: 'text-center', orderable: true},
        {data: 'shift', class: 'text-center', orderable: true},
        {data: 'jaminan', class: 'text-center', orderable: true},
        {data: 'no_rm', class: 'text-center', orderable: true},
        {data: 'nama', class: 'text-center', orderable: true},
        {render: function (index, row, data, meta) {
            return `
            <a href="#" onclick="controller.showData(event, ${data.id})" class="btn btn-sm btn-warning">Edit</a>
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
            _this.table = $('#datatable').DataTable({
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data;
            });
            console.log(_this);
        },
        showData(event, row) {
            this.data = this.datas[row];
            console.log(row, this.data.created_at)
            $('#showModal').find(".modal-body").text(this.data.created_at);
            $('#showModal').modal('show');
        }
    }
});
</script>
{{-- <script>
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

</script> --}}
@endpush
