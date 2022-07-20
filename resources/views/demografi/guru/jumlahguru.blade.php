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
        {{-- chart jumlah semua guru, GTY, GTT --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru Total</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="jumlahGuruChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru berdasarkan Status Kepegawaian</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="statusGuruChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        {{-- end chart jumlah semua guru --}}

        {{-- Chart Jenis Kelamin --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Guru berdasarkan Jenis Kelamin</h3>
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
                            <h3 class="card-label">Jumlah Guru berdasarkan Status Marital</h3>
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
                            <h3 class="card-label">Jumlah Guru berdasarkan Tahun Menuju Pensiun</h3>
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
                            <h3 class="card-label">Jumlah Guru berdasarkan Durasi Kerja</h3>
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
                            <h3 class="card-label">Jumlah Guru berdasarkan Jenjang Pendidikan</h3>
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
                            <h3 class="card-label">Jumlah Guru berdasarkan Status Sertifikasi</h3>
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
    // Chart Jumlah guru
    var guruChart = {
        series: [{
            name: 'Jumlah Guru',
            data: {!!json_encode($JumlahGuruFinal)!!}
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
            categories: {!!json_encode($tahunGuruLabels)!!}.reverse(),
        },
        yaxis: {
            title: {
                text: 'Jumlah Guru Keseluruhan'
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
    new ApexCharts(document.querySelector("#jumlahGuruChart"), guruChart).render();
    // end chart jumlah guru

    // chart GTY && GTT
    var statusGuruOptions = {
        series: [{{$BelumDiset}}, {{$GTY}}, {{$GTT}}],
        chart: {
            height: 350,
            type: 'pie',
        },
        labels: {!!json_encode($statLabel)!!},
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
    new ApexCharts(document.querySelector("#statusGuruChart"), statusGuruOptions).render();
    // end chart GTY && GTT

    // chart JenisKelamin
    var jkOptions = {
        series: [{{$Laki}}, {{$Perempuan}}],
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
                    return val + " guru"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#jkChart"), jkOptions).render();
    // end chart JenisKelamin

    // chart Marital
    var maritalOptions = {
        series: [{{$BelumMenikah}}, {{$Menikah}}, {{$Cerai}}],
        chart: {
            height: 300,
            type: 'pie',
        },
        colors: ['#B53471', '#12CBC4', '#5C82FF'],
        labels: ['Belum Menikah', 'Sudah Menikah', 'Cerai'],
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
    new ApexCharts(document.querySelector("#maritalChart"), maritalOptions).render();
    // end chart marital

    // Pensiun Chart
    var pensiunChart = {
            series: [{
                name: 'Jumlah',
                data: [{{json_encode($kurangSetahunPensiun)}}, {{json_encode($satuSampaiLimaPensiun)}}, {{json_encode($limaSampaiSepuluhPensiun)}}, {{json_encode($lebihSepuluhPensiun)}}]
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
                    return val + " Guru"
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
            data: [{{json_encode($kurangSetahunMK)}}, {{json_encode($satuSampaiLimaMK)}}, {{json_encode($limaSampaiSepuluhMK)}}, {{json_encode($sepuluhSampaiLimaBelasMK)}}, {{json_encode($lebihLimaBelasMK)}}]
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
                return val + " Guru"
                }
            }
        }
    };
    new ApexCharts(document.querySelector("#durasiKerjaChart"), durasiKerjaOptions).render();
    // End Durasi Kerja chart

    // Pendidikan Chart
    var pendidikanOptions = {
        series: [{{json_encode($sma)}}, {{json_encode($smk)}}, {{json_encode($diploma)}}, {{json_encode($s1)}}, {{json_encode($s2)}}, {{json_encode($s3)}}],
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
              size: '35%',
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
        labels: {!!json_encode($penLabels)!!},
        legend: {
          show: true,
          floating: true,
          fontSize: '12px',
          position: 'left',
          offsetX: 80,
          offsetY: -20,
          labels: {
            useSeriesColors: true,
          },
          markers: {
            size: 0
          },
          formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + " Guru"
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
                data: [{{$BelumSetting}}, {{$BelumSerti}}, {{$ProsesSerti}}, {{$SudahSerti}}]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#F64E60', '#F7A305', '#32ff7e', '#8788ED'],
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
                categories: ["Belum Disetting", "Belum Sertifikasi", "Dalam Proses Sertifikasi", "Sudah Sertifikasi"],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " Guru"
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