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
        {{-- chart jumlah semua pegawai, GTY, GTT --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai Total</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="jumlahpegawaiChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Status Kepegawaian</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="statuspegawaiChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart jumlah semua pegawai --}}

        {{-- Chart Jenis Kelamin --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Jenis Kelamin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="jkChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            {{-- end chart jenis kelamin --}}
            {{-- chart Status Marital --}}
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Status Marital</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="maritalChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart status marital --}}

        {{-- chart pensiun & durasi kerja --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Tahun Menuju Pensiun</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="pensiunChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Durasi Kerja</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="durasiKerjaChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart pensiun --}}

        {{-- chart pendidkan & sertifikasi --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Jenjang Pendidikan</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="pendidikanChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai berdasarkan Status Sertifikasi</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sertifikasiChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart pendidikan & sertifikasi --}}
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // Chart Jumlah pegawai
    var tahun = [];
    for(let i=2013;i<=new Date().getFullYear();i++){
        tahun.push(i);
    }
    var pegawaiChart = {
        series: [{
            name: 'Jumlah Pegawai',
            data: [19, 22, 36, 36, 38, 44, 56, 66, 72, 76]
        }],
        chart: {
            stacked: true,
            type: 'bar',
            height: 300
        },
        colors: ['#DC8C67', '#DC6967', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC', '#6794DC', '#67B7DC'],
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded',
                distributed: true,
                dataLabels: {
                    position: 'center', // top, center, bottom
                },
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
            show: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: tahun,
        },
        yaxis: {
            title: {
                text: 'Jumlah Pegawai Keseluruhan'
            }
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
    new ApexCharts(document.querySelector("#jumlahpegawaiChart"), pegawaiChart).render();
    // end chart jumlah Pegawai

    // chart GTY && GTT
    var statuspegawaiOptions = {
        series: [44, 55],
        chart: {
            height: 350,
            type: 'pie',
        },
        labels: ['Pegawai Tetap Yayasan (PTY)', 'Pegawai Tidak Tetap (PTT)'],
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
                    return val + " pegawai"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#statuspegawaiChart"), statuspegawaiOptions).render();
    // end chart GTY && GTT

    // chart JenisKelamin
    var jkOptions = {
        series: [44, 55],
        chart: {
            height: 300,
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
                    return val + " pegawai"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#jkChart"), jkOptions).render();
    // end chart JenisKelamin

    // chart Marital
    var maritalOptions = {
        series: [44, 55],
        chart: {
            height: 300,
            type: 'pie',
        },
        colors: ['#B53471', '#12CBC4'],
        labels: ['Belum Menikah', 'Sudah Menikah'],
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
                    return val + " pegawai"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#maritalChart"), maritalOptions).render();
    // end chart marital

    // Pensiun Chart
    var pensiunChart = {
            series: [{
                name: 'Jumlah',
                data: [12, 18, 22, 28]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            colors: ['#1289A7', '#A3CB38', '#5758BB', '#1B1464'],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '55%',
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
                categories: ["< 1 Tahun", "1-5 Tahun", "5-10 Tahun", "> 10 Tahun"],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " pegawai"
                    }
                }
            }
        };

    new ApexCharts(document.querySelector("#pensiunChart"), pensiunChart).render();
    // End Pensiun chart

    // Durasi Kerja Chart
    var durasiKerjaOptions = {
        series: [{
            name: 'Jumlah',
            data: [12, 18, 22, 28, 25]
        }],
        chart: {
            stacked: true,
            type: 'bar',
            height: 350
        },
        colors: ['#F64E60', '#F7A305'],
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: false,
                columnWidth: '55%',
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
            categories: ["< 1 Tahun", "1-5 Tahun", "5-10 Tahun", "10-15 Tahun", "> 15 Tahun"],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                return val + " pegawai"
                }
            }
        }
    };
    new ApexCharts(document.querySelector("#durasiKerjaChart"), durasiKerjaOptions).render();
    // End Durasi Kerja chart

    // Pendidikan Chart
    var pendidikanOptions = {
        series: [36, 12, 28, 19, 6],
        chart: {
          height: 390,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '30%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            }
          }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#833471', '#5758BB'],
        labels: ['SLTA', 'D3', 'S1', 'S2', 'S3'],
        legend: {
          show: true,
          floating: true,
          fontSize: '12px',
          position: 'left',
          offsetX: 80,
          offsetY: 10,
          labels: {
            useSeriesColors: true,
          },
          markers: {
            size: 0
          },
          formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + " pegawai"
          },
          itemMargin: {
            vertical: 3
          }
        },
        responsive: [{
          breakpoint: 360,
          options: {
            legend: {
                show: false
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#pendidikanChart"), pendidikanOptions).render();
    // End Pendidikan Chart

    // sertifikasi chart
    var sertifikasiOptions = {
            series: [{
                name: 'Jumlah',
                data: [12, 18, 22]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#F64E60', '#F7A305', '#32ff7e'],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '55%',
                    distributed: true,
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
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
                categories: ["Belum Sertifikasi", "Dalam Proses Sertifikasi", "Sudah Sertifikasi"],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " pegawai"
                    }
                }
            }
    };
    new ApexCharts(document.querySelector("#sertifikasiChart"), sertifikasiOptions).render();
    // end sertifikasi chart
</script>
@endpush
@push('js')
@endpush