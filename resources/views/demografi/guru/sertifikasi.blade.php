{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@section('css')
@endsection

@section('sub_header_action')
  @include('demografi.guru.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Guru Berdasarkan Status Sertifikasi</h3>
              </div>
          </div>
          <div class="card-body" style="position: relative;">
              <div class="row">
                  <div class="col-md-12">
                      <div id="sertifikasiChart"></div>
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
    // Sertifikasi Chart
    var tahun = []
    for(i=2018;i<=2022;i++){
      tahun.push(i)
    }
    var options = {
        series: [{
            name: 'Belum Sertifikasi',
            data: [44, 55, 57, 56, 61]
          }, {
            name: 'Dalam Proses Sertifikasi',
            data: [76, 85, 101, 98, 87]
          }, {
            name: 'Sudah Sertifikasi',
            data: [35, 41, 36, 26, 45]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        colors: ['#FBE1B3', '#F9C25C', '#F7A305'],
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '40%',
            endingShape: 'rounded',
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: true,
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
          categories: tahun,
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
    };

    var chart = new ApexCharts(document.querySelector("#sertifikasiChart"), options);
    chart.render();
    // End Chart Serfitikasi
</script>
@endpush
@push('js')
@endpush