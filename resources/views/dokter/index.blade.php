@extends('layouts.app', [
'namePage' => 'Dokter',
'class' => '',
'activePage' => 'dokter',
'activeNav' => 'page',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" id="controller" style="margin-top: -120px">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    @can('manage-items', App\User::class)
                    <a class="btn btn-primary btn-round text-white pull-right"
                        href="{{ route('dokter.create') }}">{{ __('Add Dokter')}}</a>
                    @endcan
                    <h4 class="card-title">{{ __('Dokter') }}</h4>
                    <div class="col-12 mt-2">
                </div>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($dokters as $dokter)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$dokter->nama_dokter}}</td>
                                <td>{{ format_tanggal($dokter->created_at) }}</td>
                                <td>{{ format_tanggal($dokter->updated_at) }}</td>
                                @can('manage-items', App\User::class)
                                <td class="text-right">
                                    @if ((auth()->user()->can('update', $dokter) || auth()->user()->can('delete', $dokter)))
                                    @can('update', $dokter)
                                    <a type="button" href="{{route("dokter.edit",$dokter)}}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                    @endcan
                                    <form action="{{ route('dokter.destroy', $dokter) }}" method="post"
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
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>

{{-- modal --}}
<div class="modal" id="modal-crud" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
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
