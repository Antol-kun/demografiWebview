{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

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
                    <h3 class="card-label">Data Guru Berdasarkan Pendidikan Akhir</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div id="pendidikanChart"></div>
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
    var tahun = [];
    for(let i=2013;i<=2022;i++){
        tahun.push(i);
    }

    var options = {
        series: [{
          name: 'SLTA',
            data: Array.from({length: 9}, () => Math.floor(Math.random() * 20))
          }, {
            name: 'D3',
            data: Array.from({length: 9}, () => Math.floor(Math.random() * 20))
          }, {
            name: 'S1',
            data: Array.from({length: 9}, () => Math.floor(Math.random() * 20))
          }, {
            name: 'S2',
            data: Array.from({length: 9}, () => Math.floor(Math.random() * 20))
          }, {
            name: 'S3',
            data: Array.from({length: 9}, () => Math.floor(Math.random() * 20))
        }],
        colors: ['#F64E60', '#8950FC', '#31BEFB', '#00D97E', '#FFB800'],
        chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 5,
            horizontal: false,
            columnWidth: '70%',
            endingShape: 'rounded',
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          },
        },
        dataLabels: {
          enabled: true,
          offsetY: -20,
          style: {
            fontSize: '10px',
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
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " guru"
            }
          }
        }
    };

    var chart = new ApexCharts(document.querySelector("#pendidikanChart"), options);
    chart.render();
</script>
@endpush
@push('js')
@endpush