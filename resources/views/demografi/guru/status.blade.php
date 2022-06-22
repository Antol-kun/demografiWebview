{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@section('css')
  <style>
    .infoguru {
      display: flex;
      justify-content: start;
      align-items: center;
      padding: 5px 0;
      border-radius: 10px;
    }
    .infoguru:nth-child(odd){
      background-color: #e0e2e6;
    }
    .img-guru {
      width: 20%;
      padding: 0 10px;
    }
    .img-guru img{
      border-radius: 10px;
      width: 100%;
    }
    .isi {
      padding-top: 15px;
    }
    .isi p {
      line-height: 5px;
    }

    .isi p:nth-child(1){
      font-weight: bold;
    }
  </style>
@endsection

@section('sub_header_action')
  @include('demografi.guru.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Guru Berdasarkan Status Guru</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="statusChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Status Guru Berdasarkan Masa Bakti</h3>
              </div>
          </div>
          <div class="card-body" style="position: relative;">
              <div class="row">
                  <div class="col-md-12">
                      <div id="masaBChart"></div>
                  </div>
              </div>
          </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Status Guru Berdasarkan Tahun Menuju Pensiun</h3>
              </div>
          </div>
          <div class="card-body" style="position: relative;">
              <div class="row">
                  <div class="col-md-12">
                      <div id="pensiunChart"></div>
                  </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-3" style="border: 1px solid #aaaeb9; border-radius: 10px; box-sizing: border-box; padding: 10px; margin: 10px;">
                  <h5>Tabel Guru Menuju Pensiun</h5>
                  <p>Kurun Waktu < 1 Tahun</p>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" style="border: 1px solid #aaaeb9; border-radius: 10px; box-sizing: border-box; padding: 10px; margin: 10px;">
                  <h5>Tabel Guru Menuju Pensiun</h5>
                  <p>Kurun Waktu < 1 Tahun</p>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" style="border: 1px solid #aaaeb9; border-radius: 10px; box-sizing: border-box; padding: 10px; margin: 10px;">
                  <h5>Tabel Guru Menuju Pensiun</h5>
                  <p>Kurun Waktu < 1 Tahun</p>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Titi Khairunisa S. Pd</p>
                      <p>NIP: 190219319</p>
                    </div>
                  </div>
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
    var tahun = []
    for(let i=2014;i<=2020;i++){
        tahun.push(i)
    }
    var options = {
          series: [{
          name: 'Guru Tetap Yayasan (GTY)',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'Guru Tidak Tetap (GTT)',
          data: [11, 32, 45, 32, 34, 52, 41]
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
          categories: tahun
        },
        // tooltip: {
        //   x: {
        //     format: 'dd/MM/yy HH:mm'
        //   },
        // },
    };

    var statusChart = new ApexCharts(document.querySelector("#statusChart"), options);
    statusChart.render();

    // Masa Bakti Chart
    var masaBChart = {
            series: [{
                name: 'Masa Bakti',
                data: [40, 30, 30, 20, 20]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            colors: ["#50cd89"],
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
                categories: ["< 1 Tahun", "1-5 Tahun", "6-10 Tahun", "10-15 Tahun", "> 15 Tahun"],
            },
            yaxis: {
                title: {
                    text: 'Masa Bakti'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " Tahun"
                    }
                }
            }
        };

    var mBChart = new ApexCharts(document.querySelector("#masaBChart"), masaBChart);
    mBChart.render();
    // End Masa Bakti chart

    // Pensiun Chart
    var pensiunChart = {
            series: [{
                name: 'Tahun Menuju Pensiun',
                data: [89, 82, 89]
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
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ["< 1 Tahun", "1-5 Tahun", "> 5 Tahun"],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " Tahun"
                    }
                }
            }
        };

    var pChart = new ApexCharts(document.querySelector("#pensiunChart"), pensiunChart);
    pChart.render();
    // End Pensiun chart
</script>
@endpush
@push('js')
@endpush