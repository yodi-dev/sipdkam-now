@extends('layouts.app', [
    'class' => '',
    'namePage' => 'Dashboard',
    'activePage' => 'home',
    'activeNav' => '',
])

@section('content')
<div id="controller">
  <div class="panel-header pt-5">
    {{-- <canvas id="bigDashboardChart"></canvas> --}}
    <div class="container text-center">
      <div class="row justify-content-end">
        <div class="col-md-2">
          <div class="card ">
            <div class="card-body">
              {{ $tgl }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content" >
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
</div>
@endsection

@push('js')
<script type="text/javascript">
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
</script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.initVectorMap();

  });
</script>
@endpush
