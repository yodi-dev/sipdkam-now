@extends('layouts.app',[
'namePage' => 'Kunjungan',
'class' => '',
'activePage' => 'kunjungan',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12" id="categories-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round pull-right text-white "
                        href="{{ route('rekam.create') }}">{{ __('RM Baru') }}</a>
                    <a class="btn btn-primary btn-round pull-right text-white "
                        href="{{ route('kunjungan.create') }}">{{ __('Kunjunga Baru') }}</a>
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
                                <th>{{ __('Waktu') }}</th>
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
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Creation date') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                @can('manage-items', App\User::class)
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                @endcan
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($kunjungans as $kunjungan)
                            <tr>
                                <td>{{$kunjungan->created_at->format('d/m/Y - H:i') }}</td>
                                <td>1</td>
                                <td>Regular</td>
                                <td>32313</td>
                                <td>COba</td>
                                @can('manage-items', App\User::class)
                                <td class="text-right">
                                    <a type="button" href="{{route("kunjungan.show",$kunjungan)}}" rel="tooltip"
                                        class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons design_bullet-list-67"></i>
                                    </a>
                                    @if (auth()->user()->can('update', $kunjungan) || auth()->user()->can('delete',
                                    $kunjungan))
                                    @can('update', $kunjungan)
                                    <a type="button" href="{{route("kunjungan.edit",$kunjungan)}}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                    @endcan
                                    @can('delete', $kunjungan)
                                    <form action="{{ route('kunjungan.destroy', $kunjungan) }}" method="post"
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
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
