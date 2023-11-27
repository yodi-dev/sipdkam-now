@extends('layouts.app', [
'namePage' => 'Jadwal',
'class' => '',
'activePage' => 'jadwal',
'activeNav' => 'klinik',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -170px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-round pull-right text-white" href="{{ route('jadwal.create') }}">{{ __('Tambah Jadwal') }}</a>
                    <button type="button" class="btn btn-primary btn-round pull-right " data-toggle="modal" data-target="#importExcel">
                        Import
                    </button>
                    
                    <h4 class="card-title">{{ bulan_now() }} {{ tahun_now() }}</h4>
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
                                <th>{{ __('Bagian') }}</th>
                                <th>{{ __('Shift') }}</th>
                                <th>{{ __('Nama') }}</th>
                                <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $item)
                            <tr>
                                <td> {{ cuma_tanggal($item->tanggal) }}</td>
                                <td>{{ $item->bagian }}</td>
                                <td>{{ $item->shift }}</td>
                                <td>{{$item->nama}}</td>
                                <td class="text-right">
                                    <a type="button" href="{{ route('jadwal.edit',$item) }}" rel="tooltip"
                                        class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                        <i class="now-ui-icons ui-2_settings-90"></i>
                                    </a>
                                    @can('delete', $item)
                                    <form action="{{ route('jadwal.destroy', $item) }}" method="post"
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
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-primary btn-round pull-right text-white mb-2" href="#">{{ __('All') }}</a>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('import.jadwal') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- <form method="post" action="{{ route('import.jadwal') }}" enctype="multipart/form-data">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
		</div>
		<div class="modal-body">
			{{ csrf_field() }}
			<label>Pilih file excel</label>
			<div class="form-group">
				<input type="file" name="file" required="required">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Import</button>
		</div>
	</div>
</form> --}}
@endsection

@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
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
