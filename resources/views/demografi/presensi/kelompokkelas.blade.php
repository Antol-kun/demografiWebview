{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
<style>
    .filter-kls {
        width: 100%;
        overflow-x: scroll;
        flex-shrink: 0;
        margin-bottom: 10px;
    }

    .filter-kls a{
        padding: 5px 15px;
        margin-right: 10px;
        background-color: #94A3B8;
        flex-shrink: 0;
        flex-grow: 1;
    }

    .filter-active {
        background-color: #1B305B !important;
    }

    .filter-kls a, .filter-active, .filter-active:hover {
        color: #fff !important;
    }
</style>
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.presensi.topbar')
@endsection

@section('content')
<div class="d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="filter-kls d-flex align-items-center mb-4">
            <a href="#" class="btn btn-sm filter-active">X IPA 1</a>
            <a href="#" class="btn btn-sm">X IPA 2</a>
            <a href="#" class="btn btn-sm">XI IPS 1</a>
            <a href="#" class="btn btn-sm">XI IPS 2</a>
            <a href="#" class="btn btn-sm">XII IPA 1</a>
            <a href="#" class="btn btn-sm">XII IPA 2</a>
            <a href="#" class="btn btn-sm">XII IPS 1</a>
            <a href="#" class="btn btn-sm">XII IPS 2</a>
            <a href="#" class="btn btn-sm">X BHS 2</a>
            <a href="#" class="btn btn-sm">X IPA 2</a>
            <a href="#" class="btn btn-sm">XI IPS 1</a>
            <a href="#" class="btn btn-sm">XI IPS 2</a>
            <a href="#" class="btn btn-sm">XII IPA 1</a>
            <a href="#" class="btn btn-sm">XII IPA 2</a>
            <a href="#" class="btn btn-sm">XII IPS 1</a>
            <a href="#" class="btn btn-sm">XII IPS 2</a>
            <a href="#" class="btn btn-sm">X BHS 2</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between pt-3" style="width: 100%">
                            <div>
                                <h3 class="card-label">Statistik Presensi Siswa Hari Ini</h3>
                                <h5 style="font-size: .9em;font-weight: 400;color: #94A3B8; margin-top: 5px">Selasa, 14 Juni 2022</h5>
                            </div>
                            <div class="text-center">
                                <h5 class="card-label" style="font-size: 1em;font-weight: 400;color: #94A3B8;">Persentase Kehadiran Hari Ini</h5>
                                <p>89,9 %</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center py-2" style="width: 100%">
                            <button class="btn btn-sm" style="background-color: #1B305B; color: #fff;">X IPA 1</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="presensiChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-7">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between pt-3" style="width: 100%">
                            <div>
                                <h3 class="card-label">Statistik Presensi Siswa 1 Minggu Terakhir</h3>
                                <h5 style="font-size: .9em;font-weight: 400;color: #94A3B8; margin-top: 5px">Senin , 13 Juni 2022 - Jum'at, 17 Juni 2022</h5>
                            </div>
                            <div class="text-center">
                                <h5 class="card-label" style="font-size: 1em;font-weight: 400;color: #94A3B8;">Persentase Kehadiran Seminggu Terakhir</h5>
                                <p>89,9 %</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center py-2" style="width: 100%">
                            <button class="btn btn-sm" style="background-color: #1B305B; color: #fff;">X IPA 1</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="presensiMingguChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between" style="width: 100%">
                    <div>
                        <h3 class="card-label" style="margin-bottom: -5px; padding-top: 15px">Rekap Presensi Siswa | Tahun Ajaran 2021-2022</h3>
                        <button class="btn btn-sm my-3 px-5" style="background-color: #1B305B; color: #fff">X IPA 1</button>
                    </div>
                    <div class="text-center">
                        <h5 class="card-label" style="font-size: 1em;font-weight: 400;color: #94A3B8;">Rata - rata kehadiran siswa</h5>
                        <p>80,5 %</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="rekapChart"></div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // presensi Chart
    var presensiOptions = {
        series: [{
            name: 'Hadir',
            data: [35]
        }, {
            name: 'Izin',
            data: [5]
        }, {
            name: 'Sakit',
            data: [3]
        }, {
            name: 'Alpha',
            data: [2]
        }, {
            name: 'Dispensasi',
            data: [5]
        }],
        chart: {
          type: 'bar',
          height: 300
        },
        plotOptions: {
          bar: {
            borderRadius: 5,
            horizontal: false,
            columnWidth: '40%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Jumlah Presensi Hari Ini'],
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " Siswa"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#presensiChart"), presensiOptions).render();
    // end presensiChart

    // presensi Mingguan Chart
    var pMingguanOptions = {
          series: [{
          name: 'Hadir',
          data: [44, 55, 57, 56, 61]
        }, {
          name: 'Izin',
          data: [76, 85, 88, 98, 94]
        }, {
          name: 'Sakit',
          data: [35, 41, 36, 26, 45]
        }, {
          name: 'Alpha',
          data: [45, 48, 52, 53, 41]
        }, {
          name: 'Dispensasi',
          data: [35, 41, 36, 48, 52]
        }],
          chart: {
          type: 'bar',
          height: 300
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
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " Siswa"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#presensiMingguChart"), pMingguanOptions).render();
    // end presensi Mingguan Chart

    // Rekap Presensi /TA
    var rekapOptions = {
        series: [{
            name: "Hadir",
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        }, {
            name: "Izin",
            data: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
        }, {
            name: "Sakit",
            data: [8, 7, 6, 5, 4, 3, 2, 1, 3, 4, 5, 6]
        }, {
            name: "Alpha",
            data: [8, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9, 2]
        }, {
            name: "Dispensasi",
            data: [6, 7, 8, 9, 1, 2, 3, 2, 1, 4, 5, 6]
        }],
        chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jul 21', 'Agt 21', 'Sep 21', 'Okt 21', 'Nov 21', 'Des 21', 'Jan 22', 'Feb 22', 'Mar 22', 'Apr 22', 'Mei 22', 'Jun 22'],
        }
    };
    new ApexCharts(document.querySelector("#rekapChart"), rekapOptions).render();
    // end rekap presensi /TA
</script>
@endpush
@push('js')
@endpush