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
                  <p>Kurun Waktu < 1 Tahun ({{$kurangSetahunPensiun . ' Pegawai'}})</p>
                  <div class="contain">
                    @if ($detailKurangSetahunPensiun != null)
                      @foreach ($detailKurangSetahunPensiun as $setahun)
                        <div class="infoguru">
                          <div class="img-guru">
                            <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                          </div>
                          <div class="isi">
                            <p>{{$setahun->Gelardepan.' '.$setahun->Nama.' '.$setahun->Gelarbelakang}}</p>
                            <p>NIP: {{$setahun->Nip}}</p>
                          </div>
                        </div>
                      @endforeach
                    @else  
                      <div class="infoguru">
                        <p class="text-center" style="width: 100%">Tidak ada data.</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu 1-5 Tahun ({{$satuSampaiLimaPensiun . ' Pegawai'}})</p>
                  <div class="contain">
                    @if ($detailSatuSampaiLimaPensiun != null)
                      @foreach ($detailSatuSampaiLimaPensiun as $setahun)
                        <div class="infoguru">
                          <div class="img-guru">
                            <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                          </div>
                          <div class="isi">
                            <p>{{$setahun->Gelardepan.' '.$setahun->Nama.' '.$setahun->Gelarbelakang}}</p>
                            <p>NIP: {{$setahun->Nip}}</p>
                          </div>
                        </div>
                      @endforeach
                    @else  
                      <div class="infoguru">
                        <p class="text-center" style="width: 100%">Tidak ada data.</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu 5-10 Tahun ({{$limaSampaiSepuluhPensiun . ' Pegawai'}})</p>
                  <div class="contain">
                    @if ($detailLimaSampaiSepuluhPensiun != null)
                      @foreach ($detailLimaSampaiSepuluhPensiun as $setahun)
                        <div class="infoguru">
                          <div class="img-guru">
                            <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                          </div>
                          <div class="isi">
                            <p>{{$setahun->Gelardepan.' '.$setahun->Nama.' '.$setahun->Gelarbelakang}}</p>
                            <p>NIP: {{$setahun->Nip}}</p>
                          </div>
                        </div>
                      @endforeach
                    @else  
                      <div class="infoguru">
                        <p class="text-center" style="width: 100%">Tidak ada data.</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-4 cards">
                  <h5>Tabel Pegawai Menuju Pensiun</h5>
                  <p>Kurun Waktu > 10 Tahun ({{$lebihSepuluhPensiun . ' Pegawai'}})</p>
                  <div class="contain">
                    @if ($detailLebihSepuluhPensiun != null)
                      @foreach ($detailLebihSepuluhPensiun as $setahun)
                        <div class="infoguru">
                          <div class="img-guru">
                            <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                          </div>
                          <div class="isi">
                            <p>{{$setahun->Gelardepan.' '.$setahun->Nama.' '.$setahun->Gelarbelakang}}</p>
                            <p>NIP: {{$setahun->Nip}}</p>
                          </div>
                        </div>
                      @endforeach
                    @else  
                      <div class="infoguru">
                        <p class="text-center" style="width: 100%">Tidak ada data.</p>
                      </div>
                    @endif
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
    // chart PTY && PTT
    var statusGuruOptions = {
        series: [{{$BelumDiset}}, {{$PTY}}, {{$PTT}}],
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
    // end chart PTY && PTT

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
</script>
@endpush
@push('js')
@endpush