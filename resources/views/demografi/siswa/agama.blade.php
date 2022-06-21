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
        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Siswa Berdasarkan Agama</h3>
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
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // Agama Chart
    var tahun = []
    for(i=2019;i<=2022;i++){
      tahun.push(i)
    }
    var options = {
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

    new ApexCharts(document.querySelector("#agamaChart"), options).render();
    // End Chart Agama
</script>
@endpush
@push('js')
@endpush