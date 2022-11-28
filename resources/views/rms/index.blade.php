@extends('layouts.app', [
    'namePage' => 'Rekam Medis',
    'class' => '',
    'activePage' => 'rekammedis',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12" id="roles-table">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Rekam Medis') }}</h4>
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
                                  <th>{{ __('No RM') }}</th>
                                  <th>{{ __('No BPJS') }}</th>
                                  <th>{{ __('Prolanis') }}</th>
                                  <th>{{ __('Nama') }}</th>
                                  <th>{{ __('Jenis Kelamin') }}</th>
                                    <th class="disabled-sorting text-right">{{ __('Actions') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($rekammedis as $role)
                                    <tr>
                                      <td> 1</td>
                                      <td> 1</td>
                                      <td> </td>
                                      <td>{{$role->name}}</td>
                                      <td>Laki-laki</td>
                                      @can('manage-items', App\User::class)
                                            <td class="text-right">
                                                @if (auth()->user()->can('update', $role) || auth()->user()->can('delete', $role))
                                                    @can('update', $role)
                                                        <a type="button" href="{{route("role.edit",$role)}}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $role)
                                                        <form action="{{ route('role.destroy', $role) }}" method="post" style="display:inline-block;" class ="delete-form">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm delete-button" data-original-title="" title="" onclick="demo.showSwal('warning-message-and-confirmation')">
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
    $(document).ready(function() {
      $(".delete-button").click(function(){
        var clickedButton = $( this );
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
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
@endpush
