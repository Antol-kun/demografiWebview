{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
  @include('demografi.pegawai.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Pegawai Berdasarkan Jenjang Pendidikan</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div id="pendidikanChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
  // Pendidikan Chart
  var pendidikanOptions = {
        series: [{
            name: 'Jumlah',
            data: [12, 18, 22, 28, 25]
        }],
        chart: {
            stacked: true,
            type: 'bar',
            height: 350
        },
        colors: ['#DC8C67', '#DC6967', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC', '#6794DC', '#67B7DC'],
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: false,
                columnWidth: '40%',
                distributed: true,
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '12px',
                colors: ["#FFFFFF"]
            }
        },
        legend: {
            show: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['SLTA', 'D3', 'S1', 'S2', 'S3'],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                return val + " Pegawai"
                }
            }
        }
    };
    new ApexCharts(document.querySelector("#pendidikanChart"), pendidikanOptions).render();
    // End Pendidikan Chart
</script>
@endpush
@push('js')
@endpush