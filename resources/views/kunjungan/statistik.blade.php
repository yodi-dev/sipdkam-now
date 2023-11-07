@extends('layouts.app', [
'namePage' => 'Statistik Kunjungan',
'class' => '',
'activePage' => 'statistikKunjungan',
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
                    <h4 class="card-title">{{ __('Oktober 2023') }}</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="chart-area">
                        <canvas id="statistikBulanan"></canvas>
                    </div>
                </div>
                <div class="card-footer">
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
    chartColor = "#FFFFFF";

    gradientChartOptionsConfigurationWithNumbersAndGrid = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        tooltips: {
        bodySpacing: 4,
        mode:"nearest",
        intersect: 0,
        position:"nearest",
        xPadding:10,
        yPadding:10,
        caretPadding:10
        },
        responsive: true,
        scales: {
            yAxes: [{
            gridLines:0,
            gridLines: {
                zeroLineColor: "transparent",
                drawBorder: false
            }
            }],
            xAxes: [{
            display:0,
            gridLines:0,
            ticks: {
                display: false
            },
            gridLines: {
                zeroLineColor: "transparent",
                drawTicks: false,
                display: false,
                drawBorder: false
            }
            }]
        },
        layout:{
        padding:{left:0,right:0,top:15,bottom:15}
        }
    };

    ctx = document.getElementById('statistikBulanan').getContext("2d");

    gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#18ce0f');
    gradientStroke.addColorStop(1, chartColor);

    gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, hexToRGB('#18ce0f',0.4));

    myChart = new Chart(ctx, {
        type: 'line',
        responsive: true,
        data: {
            labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"],
            datasets: [{
                label: "Total kunjungan",
                borderColor: "#18ce0f",
                pointBorderColor: "#FFF",
                pointBackgroundColor: "#18ce0f",
                pointBorderWidth: 2,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 1,
                pointRadius: 4,
                fill: true,
                backgroundColor: gradientFill,
                borderWidth: 2,
                data: [40, 30, 10, 70, 12, 25, 13, 90, 30,40,10,30,91,22,12,45,33,55,88,12,43,90,43,17, 29,31,63,11,90,10,]
            }]
        },
        options: gradientChartOptionsConfigurationWithNumbersAndGrid
    });

</script>
@endpush
