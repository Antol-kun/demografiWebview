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
       <div class="row">
         <div class="col-md-6">
            <!--begin::Card-->
            <div class="card card-custom gutter-b mb-3">
              <div class="card-header">
                  <div class="card-title">
                      <h3 class="card-label">Jumlah Siswa Baru Per Tahun Masuk</h3>
                  </div>
              </div>
              <div class="card-body">
                  <div id="siswaBaruChart"></div>
              </div>
            </div>
            <!--end::Card-->
         </div>
         <div class="col-md-6">
           <!--begin::Card-->
           <div class="card card-custom gutter-b mb-3">
               <div class="card-header">
                   <div class="card-title">
                       <h3 class="card-label">Jumlah Siswa Baru Per Tahun Masuk Berdasarkan Jenis Kelamin</h3>
                   </div>
               </div>
               <div class="card-body">
                  <div id="jkChart"></div>
               </div>
           </div>
           <!--end::Card-->
         </div>
       </div>

       <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Jumlah Siswa Baru Per Tahun Masuk Berdasarkan Agama</h3>
              </div>
          </div>
          <div class="card-body">
              <div id="agamaChart"></div>
          </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    // siswa baru Chart
    var tahun = []
    for(i=2021;i<=2023;i++){
      tahun.push(i)
    }
    var siswaBaruOptions = {
        series: [{
            name: 'Jumlah',
            data: [44, 55, 57]
        }],
        chart: {
          type: 'bar',
          height: 400
        },
        colors: ['#674EEA'],
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
          position: 'center'
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
              return val + " siswa"
            }
          }
        }
        };
    new ApexCharts(document.querySelector("#siswaBaruChart"), siswaBaruOptions).render();
    // End Chart siswa baru

    // siswa baru per ta berdasarkan jenis kelamin
    var jkOptions = {
        series: [{
            name: 'Laki - laki',
            data: [44, 55, 41]
          }, {
            name: 'Perempuan',
            data: [53, 32, 33]
        }],
        colors: ['#4b4b4b', '#fff200'],
        chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
             borderRadius: 5,
            horizontal: true,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: tahun,
        },
    };
    new ApexCharts(document.querySelector("#jkChart"), jkOptions).render();
    // end jk

    // agama per ta
    var agamaOptions = {
        series: [{
            name: 'Islam',
            data: [44, 55, 57]
          }, {
            name: 'Kristen',
            data: [76, 85, 45]
          }, {
            name: 'Katolik',
            data: [35, 41, 36]
          }, {
            name: 'Hindu',
            data: [26, 45, 48]
          }, {
            name: 'Budha',
            data: [45, 48, 52]
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '35%',
            endingShape: 'rounded',
            borderRadius: 5
          },
        },
        dataLabels: {
          enabled: false
        },
        legend: {
          itemMargin: {
            horizontal: 3
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
              return val + " siswa"
            }
          }
        }
    };

    new ApexCharts(document.querySelector("#agamaChart"), agamaOptions).render();
    // end agama
</script>
@endpush
@push('js')
@endpush