{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@section('css')
@endsection

@section('sub_header_action')
  @include('demografi.siswa.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="row">
          <div class="col-md-4">
            <!--begin::Card-->
            <div class="card card-custom gutter-b my-5">
              <div class="card-header">
                  <div class="card-title">
                      <h3 class="card-label">Jumlah Siswa berdasarkan Agama</h3>
                  </div>
              </div>
              <div class="card-body" style="position: relative;">
                  <div class="row">
                      <div class="col-md-12">
                          <div id="agamaChart"></div>
                      </div>
                  </div>
              </div>
            </div>
            <!--end::Card-->
          </div>
          <div class="col-md-8">
            <!--begin::Card-->
            <div class="card card-custom gutter-b my-5">
              <div class="card-header">
                  <div class="card-title">
                      <h3 class="card-label">Jumlah Siswa berdasarkan Agama Per Tahun Ajaran</h3>
                  </div>
              </div>
              <div class="card-body" style="position: relative;">
                  <div class="row">
                      <div class="col-md-12">
                          <div id="agamaTaChart"></div>
                      </div>
                  </div>
              </div>
            </div>
            <!--end::Card-->
          </div>
        </div>

        {{-- per kelompok kelas & tingkat kelas --}}
        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Jumlah Siswa berdasarkan Agama per Tingkat Kelas</h3>
              </div>
          </div>
          <div class="card-body">
              <div id="tkChart"></div>
          </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Jumlah Siswa berdasarkan Agama per Kelompok Kelas</h3>
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
        labels: {!!json_encode($agama)!!},
        legend: {
          show: true,
          floating: true,
          fontSize: '10px',
          position: 'left',
          // offsetX: 10,
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
          breakpoint: 240,
          options: {
            legend: {
                offsetX: 15,
                show: false
            }
          }
        }]
    };
    new ApexCharts(document.querySelector("#agamaChart"), agamaOptions).render();
    // End Agama Chart

    // TA Agama Chart
    var tahun = []
    for(i=2019;i<=2022;i++){
      tahun.push(i)
    }
    var agamaTaOptions = {
        series: [{
                name: 'Hindu',
                data: [38, 38, 38, 38]
            }, {
                name: 'Islam',
                data: [98, 98, 98, 98]
            }, {
                name: 'Kristen',
                data: [84, 84, 84, 84]
            }, {
                name: 'Katolik',
                data: [26, 26, 26, 26]
            }, {
                name: 'Budha',
                data: [26, 26, 26, 26]
            }, {
                name: 'Konghucu',
                data: [8, 8, 8, 8]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#8950FC', '#50CD89', '#31BEFB', '#777E90', '#F7A305', '#F64E60'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: 'rounded',
            borderRadius: 5,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: false,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['19/20', '20/21', '21/22', '22/23'],
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
    new ApexCharts(document.querySelector("#agamaTaChart"), agamaTaOptions).render();
    // End Chart TA Agama

    // Tingkat Kelas Chart
    var tkOptions = {
        series: [{
            name: 'Islam',
            data: {!!json_encode($TKIslam)!!}
        }, {
            name: 'Protestan',
            data: {!!json_encode($TKProtestan)!!}
        }, {
            name: 'Katolik',
            data: {!!json_encode($TKKatolik)!!}
        }, {
            name: 'Hindu',
            data: {!!json_encode($TKHindu)!!}
        }, {
            name: 'Buddha',
            data: {!!json_encode($TKBuddha)!!}
        }, {
            name: 'Konghuchu',
            data: {!!json_encode($TKKonghuchu)!!}
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#8950FC', '#50CD89', '#31BEFB', '#777E90', '#F7A305', '#F64E60'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: 'rounded',
            borderRadius: 5,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: false,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: {!!json_encode($tingkatkls)!!},
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
    // End Tingkat Kelas Chart

    var kkOptions = {
        series: [{
            name: 'Islam',
            data: {!!json_encode($kk_Islam)!!}
        }, {
            name: 'Protestan',
            data: {!!json_encode($kk_Protestan)!!}
        }, {
            name: 'Katolik',
            data: {!!json_encode($kk_Katolik)!!}
        }, {
            name: 'Hindu',
            data: {!!json_encode($kk_Hindu)!!}
        }, {
            name: 'Buddha',
            data: {!!json_encode($kk_Buddha)!!}
        }, {
            name: 'Konghuchu',
            data: {!!json_encode($kk_Konghuchu)!!}
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#8950FC', '#50CD89', '#31BEFB', '#777E90', '#F7A305', '#F64E60'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '50%',
            endingShape: 'rounded',
            borderRadius: 5,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: false,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: {!!json_encode($cat_kls)!!},
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
</script>
@endpush
@push('js')
@endpush