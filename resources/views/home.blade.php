@extends('layouts.app', [
    'class' => '',
    'namePage' => 'Dashboard',
    'activePage' => 'home',
    'activeNav' => '',
])

@section('content')
<div class="panel-header pt-5">
  {{-- <canvas id="bigDashboardChart"></canvas> --}}
  <div class="container text-center">
    <div class="row justify-content-end">
      <div class="col-md-2">
        <div class="card">
          <div class="card-body">
            {{ tgl() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content" style="margin-top: -150px;">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Jadwal Jaga') }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em">Dokter Umum</h5>
                </div>
                <div class="card-body" style="height: 20em">
                  <table class="table">
                    @foreach ($dokters as $item)
                      <tr>
                        <th>Shift {{ $item->shift }}</th>
                        <td> {{ $item->nama }}</td>
                      </tr>
                    @endforeach

                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em">Petugas</h5>
                </div>
                <div class="card-body" style="height: 20em">
                  <table class="table">
                    @foreach ($petugass as $item)
                      <tr>
                        <th>Shift {{ $item->shift }}</th>
                        <td>
                          {{ $item->nama }}
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em; width: 95%;">Kerumahtanggaan</h5>
                </div>
                <div class="card-body" style="height: 20em">
                  <table class="table">
                    @foreach ($rumahtanggas as $item)
                      <tr>
                        <th>Shift {{ $item->shift }}</th>
                        <td>{{ $item->nama }}</td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em">Keamanan</h5>
                </div>
                <div class="card-body" style="height: 20em">
                  <table class="table">
                    @foreach ($keamanan as $item)
                      <tr>
                        <th>Shift {{ $item->shift }}</th>
                        <td>{{ $item->nama }}</td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ __('Laporan Harian') }}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em">Kunjugan Pasien</h5>
                </div>
                <div class="card-body" style="height: 15em">
                  <div class="chart-area">
                    <canvas id="barChartMultipleBarsNoGradient"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <p><span class="box"></span>Reguler  <span class="boxx"></span>BPJS</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header bg-secondary text-center text-white d-flex align-items-center justify-content-center" style="height: 5em">
                  <h5 class="card-title" style="margin-top: -0.5em">Kunjungan per Shift</h5>
                </div>
                <div class="card-body" style="height: 15em">
                  <div class="chart-area">
                    <canvas id="kunjunganPerShift"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <p>
                    <span class="box1"></span>Shift 1  
                    <span class="box2"></span>Shift 2
                    <span class="box3"></span>Shift 3
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="statistics">
                <div class="info">
                  <div class="icon icon-primary">
                    <i class="now-ui-icons education_paper"></i>
                  </div>
                  <h3 class="info-title">{{ $kunjung }}</h3>
                  <h6 class="stats-title">{{ __('Kunjungan') }}</h6>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="statistics">
                <div class="info">
                  <div class="icon icon-success">
                    <i class="now-ui-icons files_paper"></i>
                  </div>
                  <h3 class="info-title">{{ $rekams }}</h3>
                  <h6 class="stats-title">{{ __('Rekam Medis') }}</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
{{-- <script type="text/javascript">
  var controller = new Vue({
    el: '#controller',
    data: {
      data: {}
    },
    mounted: function() {
      
    },
    methods: {

    } 

  });
</script> --}}
{{-- <script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    // demo.initDashboardPageCharts();

    // demo.initVectorMap();

    demo.initChartPageCharts();

  });
</script> --}}
<script>
  var regulars = '{!! json_encode($regular) !!}';
  var bpjs = '{!! json_encode($bpjs) !!}';
  var shift1 = '{!! json_encode($shift1) !!}';
  var shift2 = '{!! json_encode($shift2) !!}';
  var shift3 = '{!! json_encode($shift3) !!}';

  var e = document.getElementById("barChartMultipleBarsNoGradient").getContext("2d");

  var a = {
      type: "bar",
      data: {
          labels: [
              "Poli Umum", "Poli Gigi", "KB", "Home Care", "Total"
          ],
          datasets: [{
                label: 'Reguler',
                backgroundColor: "#f96332",
                data: JSON.parse(regulars)
              },
              {
                label: 'BPJS',
                backgroundColor: "#2CA8FF",
                data: JSON.parse(bpjs)
              }
          ]
      },
      options: {
          maintainAspectRatio: false,
          legend: {
              display: false
          },
          tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10
          },
          responsive: true,
          scales: {
              yAxes: [{
                  gridLines: 0,
                  gridLines: {
                      zeroLineColor: "transparent",
                      drawBorder: false
                  }
              }],
              xAxes: [{
                  gridLines: 0,
                  ticks: {
                      display: false
                  },
                  gridLines: {
                      zeroLineColor: "transparent",
                      drawTicks: false,
                      drawBorder: false
                  }
              }]
          },
          layout: {
              padding: {
                  left: 0,
                  right: 0,
                  top: 15,
                  bottom: 15
              }
          }
      }
  };

  var viewsChart = new Chart(e, a);

  // kunjungan per shift
  var e = document.getElementById("kunjunganPerShift").getContext("2d");

  var a = {
      type: "bar",
      data: {
          labels: [
              "Poli Umum", "Poli Gigi", "KB", "Home Care", "Total"
          ],
          datasets: [{
                label: 'Shift 1',
                backgroundColor: "#48dbfb",
                data: JSON.parse(shift1)
              },
              {
                label: 'Shift 2',
                backgroundColor: "#1B9CFC",
                data: JSON.parse(shift2)
              },
              {
                label: 'Shift 3',
                backgroundColor: "#3B3B98",
                data: JSON.parse(shift3)
              }
          ]
      },
      options: {
          maintainAspectRatio: false,
          legend: {
              display: false
          },
          tooltips: {
              bodySpacing: 4,
              mode: "nearest",
              intersect: 0,
              position: "nearest",
              xPadding: 10,
              yPadding: 10,
              caretPadding: 10
          },
          responsive: true,
          scales: {
              yAxes: [{
                  gridLines: 0,
                  gridLines: {
                      zeroLineColor: "transparent",
                      drawBorder: false
                  }
              }],
              xAxes: [{
                  gridLines: 0,
                  ticks: {
                      display: false
                  },
                  gridLines: {
                      zeroLineColor: "transparent",
                      drawTicks: false,
                      drawBorder: false
                  }
              }]
          },
          layout: {
              padding: {
                  left: 0,
                  right: 0,
                  top: 15,
                  bottom: 15
              }
          }
      }
  };

  var viewsChart = new Chart(e, a);
</script>
@endpush
