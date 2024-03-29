@extends('layouts.app', [
'namePage' => 'Rekam Medis',
'class' => '',
'activePage' => 'rekammedis',
'activeNav' => 'datapasien',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -170px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header d-flex justify-content-md-end">
                    <a class="btn btn-primary btn-round text-white" href="{{ route('rekam.create') }}">{{ __('Baru') }}</a>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('No RM') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('Jenis Kelamin') }}</th>
                                <th>{{ __('Tanggal Lahir') }}</th>
                                <th>{{ __('Desa') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rekams as $rms)
                            <tr>
                                <td> {{ $rms->no_rm }}</td>
                                <td>{{$rms->nama}}</td>
                                <td>{{ $rms->kelamin }}</td>
                                <td>{{ $rms->tgl_lahir }}</td>
                                <td> {{$rms->desa}}</td>
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
                                    @can('delete', $rms)
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
                                    @endcan
                                    @endif
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    });

</script>
@endpush
