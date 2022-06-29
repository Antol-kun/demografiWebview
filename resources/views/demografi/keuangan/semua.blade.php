{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
    <style>
        .filter-kls a{
            margin-right: 10px;
            background-color: #94A3B8;
        }

        .filter-active {
            background-color: #1B305B !important;
        }

        .filter-kls a, .filter-active, .filter-active:hover {
            color: #fff !important;
        }
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
        .percent{
          margin: 10px 0;
          text-align: center;
          background-color: #0068C9;
          padding: 10px;
          border-radius: 5px;
        }
        .percent h5 {
          font-weight: 800;
          color: #fff500;
          line-height: 5px;
        }
        .percent p {
          color: #fff;
        }
    </style>
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.keuangan.topbar')
@endsection

@section('content')
<div class="d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="filter-kls mb-4">
            <a href="#" class="btn btn-sm filter-active">Keseluruhan</a>
            <a href="#" class="btn btn-sm">X</a>
            <a href="#" class="btn btn-sm">XI</a>
            <a href="#" class="btn btn-sm">XII</a>
        </div>

        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between" style="width: 100%">
                    <div>
                        <h3 class="card-label">Penerimaan SPP Bulanan Per Hari Ini</h3>
                    </div>
                    <div class="d-flex align-items-baseline">
                        <a href="#" class="btn btn-sm" style="background-color: #1B305B; color: #fff; margin-right: 10px">Keseluruhan</a>
                        <h5 class="card-label" style="font-size: 1em;font-weight: 400;color: #94A3B8;">Selasa, 14 Jun 2022</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center" style="width: 100%">
                  <div id="sppChart"></div>
              </div>
            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
          <div class="card-header">
              <div class="d-flex align-items-center justify-content-between" style="width: 100%">
                  <div>
                      <h3 class="card-label">Data Pembayaran SPP Per Bulan</h3>
                  </div>
                  <div class="d-flex align-items-start mt-5">
                      <a href="#" class="btn btn-sm" style="background-color: #1B305B; color: #fff; margin-right: 10px;">Keseluruhan</a>
                      <div class="text-center">
                          <h5 class="card-label" style="font-size: 1em;font-weight: 400;color: #94A3B8">Persentase Tagihan Lunas</h5>
                          <p>73,5 %</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-body">
            <div id="sppBulanChart"></div>

            <div class="row justify-content-center">
              <div class="col-md-5 cards">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5>Status Pembayaran SPP</h5>
                    <p>Oktober 2021</p>
                  </div>
                  <div>
                    <a href="#" class="btn btn-sm" style="background-color: #1B305B; color: #fff; margin-right: 10px;">Keseluruhan</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <th>Total Tagihan</th>
                          <td>:</td>
                          <td>30</td>
                        </tr>
                        <tr>
                          <th>Total Lunas</th>
                          <td>:</td>
                          <td>23</td>
                        </tr>
                        <tr>
                          <th>Total Belum Lunas</th>
                          <td>:</td>
                          <td>7</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <div class="percent">
                      <p>Persentase Lunas</p>
                      <h5>83,3%</h5>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-sm">
                      <colgroup>
                        <col span="1" style="width: 50%;">
                        <col span="1" style="width: 5%;">
                        <col span="1" style="width: 45%;">
                     </colgroup>
                      <tbody>
                        <tr>
                          <th>Total Nominal Tagihan</th>
                          <td>:</td>
                          <td>Rp. 15.000.000</td>
                        </tr>
                        <tr>
                          <th>Total Nominal Lunas</th>
                          <td>:</td>
                          <td>Rp. 12.500.000</td>
                        </tr>
                        <tr>
                          <th>Total Nominal Belum Lunas</th>
                          <td>:</td>
                          <td>Rp. 2.500.000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-5 cards">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h5>Daftar Siswa Belum Lunas</h5>
                    <p>Oktober 2021</p>
                  </div>
                  <div>
                    <a href="#" class="btn btn-sm" style="background-color: #1B305B; color: #fff; margin-right: 10px;">X IPA 1</a>
                  </div>
                </div>
                <div class="contain">
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Siti Anissa</p>
                      <p>NISN: 190219789</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Aminah</p>
                      <p>NISN: 190210099</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Bambang Mujianto</p>
                      <p>NISN: 19021009991</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Tiara Leksmana</p>
                      <p>NISN: 1902121209</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Kesuma Tri Yanto</p>
                      <p>NISN: 1982109012</p>
                    </div>
                  </div>
                  <div class="infoguru">
                    <div class="img-guru">
                      <img src="{{asset('pasfoto/guru/no-image.png')}}" alt="">
                    </div>
                    <div class="isi">
                      <p>Siti Munawaroh</p>
                      <p>NISN: 1902192212</p>
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
  var sppOptions = {
      series: [20000, 10000, 150000],
      chart: {
        width: 500,
        type: 'pie',
      },
      labels: ['Lunas', 'Belum Lunas', 'Belum Tertagih'],
      legend: {
        formatter: function(seriesName, opts){
          return [seriesName, " : Rp. ", opts.w.globals.series[opts.seriesIndex]]
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200
          },
          legend: {
            itemMargin: {
              horizontal: 10,
            },
            position: 'bottom'
          }
        }
      }]
  };
  new ApexCharts(document.querySelector("#sppChart"), sppOptions).render();

  var sppBulanOptions = {
    series: [{
      name: 'Jumlah Tagihan Lunas',
      data: Array.from({length: 12}, () => Math.floor(Math.random() * 20))
    }],
    chart: {
      type: 'bar',
      height: 350
    },
    plotOptions: {
      bar: {
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
      categories: ['Jul 21', 'Agt 21', 'Sep 21', 'Okt 21', 'Nov 21', 'Des 21', 'Jan 22', 'Feb 22', 'Mar 22', 'Apr 22', 'Mei 22', 'Jun 22'],
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
  new ApexCharts(document.querySelector("#sppBulanChart"), sppBulanOptions).render();
</script>
@endpush
@push('js')
@endpush