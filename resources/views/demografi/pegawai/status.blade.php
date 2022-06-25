{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@section('css')
  <style>
    .cards {
      border: 1px solid #aaaeb9;
      border-radius: 10px;
      box-sizing: border-box;
      padding: 15px 10px;
      margin: 10px;
    }
    .contain {
      height: 235px;
      overflow-y: scroll;
    }
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
  @include('demografi.pegawai.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Jumlah Pegawai berdasarkan Status Kepegawaian</h3>
              </div>
          </div>
          <div class="card-body">
              <div id="statusGuruChart"></div>
          </div>
      </div>
      <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Status Pegawai Berdasarkan Durasi Kerja</h3>
              </div>
          </div>
          <div class="card-body" style="position: relative;">
              <div class="row">
                  <div class="col-md-12">
                      <div id="durasiKerjaChart"></div>
                  </div>
              </div>
          </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Status Pegawai Berdasarkan Tahun Menuju Pensiun</h3>
              </div>
          </div>
          <div class="card-body" style="position: relative;">
              <div class="row">
                  <div class="col-md-12">
                      <div id="pensiunChart"></div>
                  </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu < 1 Tahun</p>
                  <div class="contain">
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Siti Anissa S. Pd</p>
                        <p>NIP: 190219789</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Aminah S. Kom</p>
                        <p>NIP: 190210099</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Bambang Mujianto M. Pd</p>
                        <p>NIP: 19021009991</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Tiara Leksmana S. Pd, M. Pd</p>
                        <p>NIP: 1902121209</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Kesuma Tri Yanto S. Pd</p>
                        <p>NIP: 1982109012</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Siti Munawaroh S. Pd</p>
                        <p>NIP: 1902192212</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu 1-5 Tahun</p>
                  <div class="contain">
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Rika Anggraini S. Pd</p>
                        <p>NIP: 190289129</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Mila Puspa Sari S. Pd</p>
                        <p>NIP: 1902090998</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Karunia Pertiwi S. Pd</p>
                        <p>NIP: 198023319</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Bintang Apriliani S. Pd</p>
                        <p>NIP: 192213319</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Nabila Saputri S. Pd</p>
                        <p>NIP: 1909998319</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Khairunisa S. Pd</p>
                        <p>NIP: 190210919</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu 5-10 Tahun</p>
                  <div class="contain">
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Salsabila Pertiwi S. Pd</p>
                        <p>NIP: 190290019</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Siti Nurhalijah S. Pd</p>
                        <p>NIP: 19809819</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Pertiwi Dwi Putri S. Pd</p>
                        <p>NIP: 198201919</p>
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
                        <p>Siti Nurhalijah S. Pd</p>
                        <p>NIP: 19809819</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Pertiwi Dwi Putri S. Pd</p>
                        <p>NIP: 198201919</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu > 10 Tahun</p>
                  <div class="contain">
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Bambang Mujianto M. Pd</p>
                        <p>NIP: 19021009991</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Tiara Leksmana S. Pd, M. Pd</p>
                        <p>NIP: 1902121209</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Kesuma Tri Yanto S. Pd</p>
                        <p>NIP: 1982109012</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Siti Munawaroh S. Pd</p>
                        <p>NIP: 1902192212</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Salsabila Pertiwi S. Pd</p>
                        <p>NIP: 190290019</p>
                      </div>
                    </div>
                    <div class="infoguru">
                      <div class="img-guru">
                        <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                      </div>
                      <div class="isi">
                        <p>Siti Nurhalijah S. Pd</p>
                        <p>NIP: 19809819</p>
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
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // chart GTY && GTT
    var statusGuruOptions = {
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
                    return val + " Pegawai"
                }
            }
        },
    };
    new ApexCharts(document.querySelector("#statusGuruChart"), statusGuruOptions).render();
    // end chart GTY && GTT

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
                    return val + " Pegawai"
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
                    return val + " Pegawai"
                    }
                }
            }
        };

    new ApexCharts(document.querySelector("#durasiKerjaChart"), durasiKerjaOptions).render();
    // End Durasi Kerja chart
</script>
@endpush
@push('js')
@endpush