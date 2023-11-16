@extends('layouts.app', [
'namePage' => 'Laporan Kunjungan',
'class' => '',
'activePage' => 'laporanKunjungan',
'activeNav' => 'laporan',
])

@section('content')
<div class="panel-header pt-5">
    {{-- <canvas id="bigDashboardChart"></canvas> --}}
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-md-2">
            <div class="card ">
                <div class="card-body">
                Tanggal {{ tanggal_now() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="content" style="margin-top: -150px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-round pull-right text-white" href="{{ route('cetak.kunjungan') }}" target="_blank">{{ __('Cetak') }}</a>
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
                        <table class="table table-hover mb-5">
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col"><strong># Reguler</strong></th>
                                    <th scope="col">Harian</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Growth</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regular as $item)
                                    <tr>
                                        <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                                        <td>{{ $item['jumlah'] }}</td>
                                        <td>{{ $item['perbulan'] }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr class="table-primary">
                                    <th scope="row">Total</th>
                                    <td >{{ $jumlah_perhari->jumlah }}</td>
                                    <td>{{ $jumlah_perbulan->jumlah }}</td>
                                    <td>4%</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-hover">
                            <thead>
                                <tr class="table-primary">
                                <th scope="col"><strong># BPJS</strong></th>
                                <th scope="col">Harian</th>
                                <th scope="col">Periode</th>
                                <th scope="col">Growth</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bpjs as $item)
                                    <tr>
                                        <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                                        <td>{{ $item['jumlah'] }}</td>
                                        <td>{{ $item['perbulan'] }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr class="table-primary">
                                    <th scope="row">Total</th>
                                    <td >{{ $jumlah_perhari_bpjs->jumlah }}</td>
                                    <td>{{ $jumlah_perbulan_bpjs->jumlah }}</td>
                                    <td>4%</td>
                                </tr>
                            </tbody>
                        </table>

                    {{-- <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        
                        </tbody>
                    </table> --}}
                </div>
                <div class="card-footer">
                    {{-- <a class="btn btn-sm btn-primary btn-round pull-right text-white mb-2" href="#">{{ __('All') }}</a> --}}
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
