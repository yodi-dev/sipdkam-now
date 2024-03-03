@extends('layouts.app', [
'namePage' => 'Laporan Keuangan',
'class' => '',
'activePage' => 'laporanKeuangan',
'activeNav' => 'laporan',
])

@section('content')
<div class="panel-header">
</div>
<div class="content" style="margin-top: -170px;">
    <div class="row">
        <div class="col-md-12" id="roles-table">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-round pull-right text-white" target="_blank" href="{{ route('printkeuangan.kunjungan') }}">{{ __('Cetak') }}</a>
                    <h4 class="card-title">{{ __('Oktober 2023') }}</h4>
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
                                {{-- <th scope="col">Growth</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regular as $item)
                                <tr>
                                    <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                                    <td valign="top" align="right">Rp. {{ $item['jumlah'] }}</td>
                                    <td valign="top" align="right">Rp. {{ $item['perbulan'] }}</td>
                                    {{-- <td valign="top" align="right">%</td> --}}
                                </tr>
                            @endforeach
                            <tr class="table-primary">
                                <th scope="row">Total</th>
                                <td valign="top" align="right">Rp. {{ $jumlah_perhari->total_perhari }}</td>
                                <td valign="top" align="right">Rp. {{ $jumlah_perbulan->total_perbulan }}</td>
                                {{-- <td valign="top" align="right">%</td> --}}
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover mb-5">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col"><strong># BPJS</strong></th>
                                <th scope="col">Harian</th>
                                <th scope="col">Periode</th>
                                {{-- <th scope="col">Growth</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bpjs as $item)
                                <tr>
                                    <th scope="row">{{ ucfirst(trans($item['poli'])) }}</th>
                                    <td valign="top" align="right">Rp. {{ $item['jumlah'] }}</td>
                                    <td valign="top" align="right">Rp. {{ $item['perbulan'] }}</td>
                                    {{-- <td valign="top" align="right">%</td> --}}
                                </tr>
                            @endforeach
                            <tr class="table-primary">
                                <th scope="row">Total</th>
                                <td valign="top" align="right">Rp. {{ $jumlah_perhari_bpjs->total_perhari }}</td>
                                <td valign="top" align="right">Rp. {{ $jumlah_perbulan_bpjs->total_perbulan }}</td>
                                {{-- <td valign="top" align="right">%</td> --}}
                            </tr>
                        </tbody>
                    </table>
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
