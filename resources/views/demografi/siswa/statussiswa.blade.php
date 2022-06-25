{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.siswa.topbar')
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        {{-- tingkat kelas chart --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa per Status</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="jsChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa per Status berdasarkan Tingkat Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="jsTkChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

        {{-- tahun masuk --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Siswa per Status berdasarkan Tahun Masuk</h3>
                </div>
            </div>
            <div class="card-body">
                <div id="tmChart"></div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // Status Siswa Chart
    var statOptions = {
        series: [{
            name: 'Jumlah Siswa',
            data: [248, 302, 16, 32]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#20BF6B', '#4B7BEC', '#EB3B5A', '#FED330'],
        plotOptions: {
          bar: {
            borderRadius: 4,
            distributed: true,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        grid: {
            show: false,
        },
        legend: {
            itemMargin: {
                horizontal: 20,
            },
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " orang"
                }
            }
        },
        xaxis: {
          categories: ['Aktif', 'Lulus', 'Drop Out', 'Mutasi'],
        }
    };
    new ApexCharts(document.querySelector("#jsChart"), statOptions).render();
    // End Status Siswa Chart

    // per tingkat kelas
    var TKOptions = {
        series: [{
          name: 'Aktif',
          data: [44, 55, 57]
        }, {
          name: 'Lulus',
          data: [76, 85, 94]
        }, {
          name: 'Drop out',
          data: [35, 41, 36]
        }, {
          name: 'Mutasi',
          data: [56, 61, 58]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 5,
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        grid: {
            show: false,
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Kelas X', 'Kelas XI', 'Kelas XII'],
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " siswa"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#jsTkChart"), TKOptions).render();
    // end per tingkat kelas

    // per tahun masuk
    var TMOptions = {
        series: [{
          name: 'Aktif',
          data: [24, 36, 48, 29]
        }, {
          name: 'Lulus',
          data: [36, 67, 89, 100]
        }, {
          name: 'Drop out',
          data: [10, 27, 33, 11]
        }, {
          name: 'Mutasi',
          data: [12, 23, 22, 5]
        }],
        chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          categories: [2019, 2020, 2021, 2022]
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " siswa"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#tmChart"), TMOptions).render();
    // end per tahun masuk
</script>
@endpush
@push('js')
@endpush