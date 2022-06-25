{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.guru.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        {{-- jenis kelamin chart --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Guru Berdasarkan Jenis Kelamin</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div id="jkChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
        {{-- end jenis kelamin --}}

        {{-- chart pendidikan & status marital --}}
        <div class="row mt-3">
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru berdasarkan Jenis Kelamin per Jenjang Pendidikan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="pendidikanChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru berdasarkan Jenis Kelamin per Status Kepegawaian</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="pegawaiChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru berdasarkan Jenis Kelamin per Status Marital</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="statusChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart pendidikan & status marital --}}
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // chart JenisKelamin
    var jkOptions = {
        series: [44, 55],
        chart: {
            height: 350,
            type: 'pie',
        },
        colors: ['#0652DD', '#C4E538'],
        labels: ['Laki - laki', 'Perempuan'],
        legend: {
            position: 'bottom',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 300
            }
          }
        }],
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " guru"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#jkChart"), jkOptions).render();
    // end chart JenisKelamin

    // pendidikan chart
    var pendidikanOptions = {
        series: [{
            name: 'Laki - laki',
            data: [10, 22, 32, 8, 7]
        }, {
            name: 'Perempuan',
            data: [9, 10, 28, 17, 10]
        }],
        colors: ['#d63031', '#fed330'],
        chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " orang"
                }
            }
        },
        xaxis: {
          categories: ['SLTA', 'D3', 'S1', 'S2', 'S3'],
        }
    };
    new ApexCharts(document.querySelector("#pendidikanChart"), pendidikanOptions).render();
    // end pendidikan chart

    // chart status marital
    var pegawaiOptions = {
        series: [{
          name: 'Laki - laki',
          data: [44, 55]
        }, {
          name: 'Perempuan',
          data: [76, 85]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#FFC312', '#B53471'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
            borderRadius: 10
          },
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['GTY', 'GTT'],
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " orang"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#pegawaiChart"), pegawaiOptions).render();
    // end chart status marital

    // chart status marital
    var statusOptions = {
        series: [{
          name: 'Laki - laki',
          data: [44, 55]
        }, {
          name: 'Perempuan',
          data: [13, 23]
        }],
        colors: ['#0652DD', '#9980FA'],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            columnWidth: '35%',
            horizontal: false,
            borderRadius: 10
          },
        },
        xaxis: {
          categories: ['Belum Menikah', 'Sudah Menikah'],
        },
        legend: {
            show: false
        },
        fill: {
          opacity: 1
        }
    };
    new ApexCharts(document.querySelector("#statusChart"), statusOptions).render();
    // end chart status marital
</script>
@endpush
@push('js')
@endpush