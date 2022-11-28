@extends('layouts.app', [
    'class' => '',
     'namePage' => 'Dashboard',
     'activePage' => 'home',
     'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>
  <div class="content">
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
                    <h3 class="info-title">859</h3>
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
                    <h3 class="info-title">3,521</h3>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

      demo.initVectorMap();

    });
  </script>
@endpush
