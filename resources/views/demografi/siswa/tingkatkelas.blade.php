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

        {{-- Per Tingkat Kelas --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Jumlah Siswa Per Tingkat Kelas</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div id="tingkatKlsChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->

        <div class="row">
            <div class="col-md-6">
                {{-- Berdasarkan Jenis Kelamin --}}
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa Per Tingkat Kelas Berdasarkan Jenis Kelamin</h3>
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
            <div class="col-md-6">
                {{-- Berdasarkan Agama --}}
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa Per Tingkat Kelas Berdasarkan Agama</h3>
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

        {{-- Berdasarkan Status Siswa --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Siswa Per Tingkat Kelas Berdasarkan Status Siswa</h3>
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
    <!--end::Container-->
</div>
@endsection
@push('lib-js')
<script>
    // PerTingkatKelas Chart
    var tingkatKlsOptions = {
        series: {!!json_encode($jmlkelas)!!},
        chart: {
          height: 250,
          type: 'pie',
        },
        labels: {!!json_encode($tkls)!!},
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
            }
          }
        }],
        tooltip: {
          y: {
            formatter: function (val) {
                return val + " Orang"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#tingkatKlsChart"), tingkatKlsOptions).render();
    // End PerTingkatKelas Chart

    // JenisKelamin Chart
    var jkOptions = {
        series: [{
            name: 'Laki - Laki',
            data: [{{$kelasX_LK}}, {{$kelasXI_LK}}, {{$kelasXII_LK}}]
            }, {
            name: 'Perempuan',
            data: [{{$kelasX_P}}, {{$kelasXI_P}}, {{$kelasXII_P}}]
        }],
        chart: {
          type: 'bar',
          height: 350,
        },
        plotOptions: {
          bar: {
            borderRadius: 5,
            horizontal: false,
            columnWidth: '45%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val
            }
        },
        grid: {
            show: false
        },
        legend: {
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
            formatter: function(seriesName) {
                return [seriesName]
            }
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
              return val + " orang"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#jkChart"), jkOptions).render();
    // End JenisKelamin Chart

    // Agama Chart
    var agamaOptions = {
        series: [{
            name: 'Islam',
            data: {!!json_encode($Islam)!!}
            }, {
            name: 'Hindu',
            data: {!!json_encode($Hindu)!!}
        }, {
            name: 'Katolik',
            data: {!!json_encode($Katolik)!!}
        }, {
            name: 'Protestan',
            data: {!!json_encode($Protestan)!!}
        }, {
            name: 'Buddha',
            data: {!!json_encode($Buddha)!!}
        }, {
            name: 'Konghuchu',
            data: {!!json_encode($Konghuchu)!!}
        }],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
        },
        plotOptions: {
          bar: {
            barHeight: '45%',
            borderRadius: 3,
            horizontal: true,
            endingShape: 'rounded'
          },
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val
            },
            style: {
                fontSize: '12px',
                fontWeight: 'bold',
            }
        },
        grid: {
            show: false
        },
        legend: {
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
            formatter: function(seriesName) {
                return [seriesName]
            }
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
              return val + " orang"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#agamaChart"), agamaOptions).render();
    // End Agama Chart

    // Status Chart
    var statusOptions = {
        series: [{
                name: 'Aktif',
                data: {!!json_encode($Aktif)!!}
            }, {
                name: 'Lulus',
                data: {!!json_encode($Lulus)!!}
            },{
                name: 'Drop Out',
                data: {!!json_encode($DO)!!}
            }, {
                name: 'Mutasi',
                data: {!!json_encode($Mutasi)!!}
        }],
        chart: {
          type: 'bar',
          height: 350,
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
            enabled: true,
            formatter: function (val) {
                return val
            }
        },
        grid: {
            show: false
        },
        legend: {
            itemMargin: {
                horizontal: 10,
                vertical: 0
            },
            formatter: function(seriesName) {
                return [seriesName]
            }
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
              return val + " orang"
            }
          }
        }
    };
    new ApexCharts(document.querySelector("#statusChart"), statusOptions).render();
    // End Status Chart
</script>
@endpush
@push('js')
@endpush