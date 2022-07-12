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
                            <h3 class="card-label">Jumlah Siswa per Jenis Kelamin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="jenisKelaminChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Siswa per Jenis Kelamin berdasarkan Tingkat Kelas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="tkChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>

        {{-- tahun masuk chart --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Siswa per Jenis Kelamin berdasarkan Tahun Masuk</h3>
                </div>
            </div>
            <div class="card-body">
                <div id="tmChart"></div>
            </div>
        </div>
        <!--end::Card-->

        {{-- kelompok kelas chart --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Siswa per Jenis Kelamin berdasarkan Kelompok Kelas</h3>
                </div>
            </div>
            <div class="card-body">
                <div id="kkChart"></div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // JenisKelamin Chart
    var jkOptions = {
        series: [{{$laki}}, {{$perempuan}}],
        labels: ['Laki - Laki', 'Perempuan'],
        chart: {
            height: 350,
            type: 'donut',
        },
        legend: {
            position: 'bottom',
            itemMargin: {
                vertical: 5
            }
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

    // tingkat kelas
    var tkOptions = {
        series: [{
          name: 'Laki - laki',
          data: {!!json_encode($TK_L)!!}
        }, {
          name: 'Perempuan',
          data: {!!json_encode($TK_P)!!}
        }],
          chart: {
          type: 'bar',
          height: 320
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
          categories: ['Kelas X', 'Kelas XI', 'Kelas XII']
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
    new ApexCharts(document.querySelector("#tkChart"), tkOptions).render();
    // end tingkat kelas

    // tahun masuk
    var tmOptions = {
        series: [{
            name: 'Laki - laki',
            data: {!!json_encode($jmLKTMJK)!!}
          }, {
            name: 'Perempuan',
            data: {!!json_encode($jmPTMJK)!!}
        }],
        chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          itemMargin: {
            horizontal: 15
          }
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          categories: {!!json_encode($tahunmasuk)!!}
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " siswa"
            }
          }
        },
    };
    new ApexCharts(document.querySelector("#tmChart"), tmOptions).render();
    // end tahun masuk

    // kelompok kelas
    var kkOptions = {
        series: [{
          name: 'Laki - laki',
          data: {!!json_encode($JmlSiswaLKelKls)!!}
        }, {
          name: 'Perempuan',
          data: {!!json_encode($JmlSiswaPKelKls)!!}
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#17c0eb', '#3ae374'],
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
          categories: {!!json_encode($kelKlsNew)!!}
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
    new ApexCharts(document.querySelector("#kkChart"), kkOptions).render();
    // end kelompok kelas
</script>
@endpush
@push('js')
@endpush