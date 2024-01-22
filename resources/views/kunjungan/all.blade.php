@extends('layouts.app', [
'namePage' => 'Kunjungan',
'class' => '',
'activePage' => 'kunjungan',
'activeNav' => 'datapasien',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -170px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-round pull-right text-white" href="{{ route('kunjungan.index') }}">{{ __('back to list') }}</a>
                    <h4 class="card-title">Semua data kunjungan</h4>
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
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('shift') }}</th>
                                <th>{{ __('Jaminan') }}</th>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                <td>{{ $item->shift }}</td>
                                <td>{{ $item->jaminan }}</td>
                                <td>{{ $item->no_rm }}</td>
                                <td>{{ $item->nama }}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- <a class="btn btn-sm btn-primary btn-round pull-right text-white mb-2" href="{{ route('utang.show') }}">{{ __('All') }}</a> --}}
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
            "pageLength": "100",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        

        var table = $('#datatable').DataTable();
    });

</script>
@endpush
