{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
    @include('demografi.pegawai.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="row">
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai Berdasarkan Status Marital</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="maritalChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Jumlah Pegawai Berdasarkan Status Marital per Jenis Kelamin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="maritalJkChart"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
  // chart Marital
  var maritalOptions = {
      series: [{{$BelumMenikah}}, {{$Menikah}}, {{$Cerai}}],
      chart: {
          height: 300,
          type: 'pie',
      },
      colors: ['#B53471', '#12CBC4', '#5C82FF'],
      labels: ['Belum Menikah', 'Sudah Menikah', 'Cerai'],
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
  new ApexCharts(document.querySelector("#maritalChart"), maritalOptions).render();
  // end chart marital

  // chart marital jk
  var maritalJkOptions = {
      series: [{
          name: 'Laki - laki',
          data: {!!json_encode($MaritalLaki)!!}
      }, {
          name: 'Perempuan',
          data: {!!json_encode($MaritalPerempuan)!!}
      }],
      chart: {
        type: 'bar'
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
          barHeight: '45%',
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
        categories: ['Belum Menikah', 'Sudah Menikah', 'Cerai'],
      },
  };
  new ApexCharts(document.querySelector("#maritalJkChart"), maritalJkOptions).render();
  // end chart marital jk
</script>
@endpush
@push('js')
@endpush