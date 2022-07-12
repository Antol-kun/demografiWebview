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
        {{-- chart semua siswa --}}
        <div class="row">
            <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa Keseluruhan</h3>
                        </div>
                    </div>
                    <div class="card-body" style="height: 260px">
                        <div class="d-flex justify-content-center align-items-center" style="height: 100%; gap: 10%">
                            <div class="d-flex flex-wrap d-grid gap-5 mb-10">
                                <!--begin::Item-->
                                <div class="border-end-dashed border-end border-gray-300 pe-xxl-7 me-xxl-5">
                                    <!--begin::Statistics-->
                                    <div class="d-flex mb-2">
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{$Seluruh}}</span>
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Keseluruhan</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="m-0">
                                    <!--begin::Statistics-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{$jmlAkhir}}</span>
                                        <!--end::Value-->
                                    </div>
                                    <!--end::Statistics-->
                                    <!--begin::Description-->
                                    <span class="fs-6 fw-semibold text-gray-400">Tahun {{$tahunAkhir}}</span>
                                    <!--end::Description-->
                                </div>
                                <!--end::Item-->
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div id="jumlahSiswaChart"></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-8">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa Per Status</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="statusChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

        {{-- chart perkelompok kelas && pertingkat kelas --}}
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa Per Jenis Kelamin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="jenisKelaminChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa Per Kelompok Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="siswaKlsChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                {{-- perjenis kelamin --}}
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa Per Tingkat Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="tingkatKlsChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa Berdasarkan Agama</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="agamaChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
@endsection 

@push('lib-js')
<script>
    // Chart Jumlah siswa
    var siswaOptions = {
            series: [{
                name: 'Jumlah Siswa',
                data: [19, 22, 36]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            // colors: ['#0095E8'],
            colors: ['#DC8C67', '#DC6967', '#DC67AB', '#DC67CE', '#C767DC', '#A367DC', '#8067DC', '#6771DC', '#6794DC', '#67B7DC'],
            grid: {
                show: false,
            },
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
                show: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['13/14', '14/15', '15/16'],
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

    new ApexCharts(document.querySelector("#jumlahSiswaChart"), siswaOptions).render();
    // end chart jumlah siswa

    // chart per kelompok kelas
    var siswaKlsOptions = {
        series: {!!json_encode($series)!!},
        chart: {
          height: 250,
          type: 'pie',
        },
        labels: {!!json_encode($labels)!!},
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#siswaKlsChart"), siswaKlsOptions).render();
    // end chart per kelompok kelas

    // PerTingkatKelas Chart
    var tingkatKlsOptions = {
        series: {!!json_encode($jmlkelas)!!},
        chart: {
          height: 350,
          type: 'pie',
        },
        legend: {
            itemMargin: {
                vertical: 10,
                horizontal: 15
            },
            position: 'bottom'
        },
        labels: {!!json_encode($tkls)!!},
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom'
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#tingkatKlsChart"), tingkatKlsOptions).render();
    // End PerTingkatKelas Chart

    // JenisKelamin Chart
    var jkOptions = {
        series: [{{$laki}}, {{$perempuan}}],
        labels: ['Laki - Laki', 'Perempuan'],
        chart: {
            height: 250,
            type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom'
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#jenisKelaminChart"), jkOptions).render();
    // End JenisKelamin Chart

    // Agama Chart
    var agamaOptions = {
        series: [{{$Islam}}, {{$Protestan}}, {{$Katolik}}, {{$Hindu}}, {{$Buddha}}, {{$Konghuchu}}],
        chart: {
          height: 350,
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
        colors: ['#3498db', '#2ecc71', '#e74c3c', '#2c3e50', '#fff200', '#17c0eb'],
        labels: ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Konghuchu'],
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
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
          },
          itemMargin: {
            vertical: 3
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
                show: false
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#agamaChart"), agamaOptions).render();
    // End Agama Chart

    // Status Siswa Chart
    var statOptions = {
        series: [{
            name: 'Jumlah Siswa',
            data: [{{$Aktif}}, {{$Lulus}}, {{$DO}}, {{$Mutasi}}]
        }],
        chart: {
          type: 'bar',
          height: 200
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
          enabled: false
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
    new ApexCharts(document.querySelector("#statusChart"), statOptions).render();
    // End Status Siswa Chart
</script>
@endpush
@push('js')
@endpush