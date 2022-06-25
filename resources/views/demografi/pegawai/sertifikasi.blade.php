{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@section('css')
@endsection

@section('sub_header_action')
  @include('demografi.pegawai.topbar')
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b my-5">
          <div class="card-header">
              <div class="card-title">
                  <h3 class="card-label">Data Pegawai Berdasarkan Status Sertifikasi</h3>
              </div>
          </div>
          <div class="card-body">
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
    // sertifikasi chart
    var sertifikasiOptions = {
            series: [{
                name: 'Jumlah',
                data: [12, 18, 22]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#F64E60', '#F7A305', '#32ff7e'],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '45%',
                    distributed: true,
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
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
                categories: ["Belum Sertifikasi", "Dalam Proses Sertifikasi", "Sudah Sertifikasi"],
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
    new ApexCharts(document.querySelector("#sertifikasiChart"), sertifikasiOptions).render();
    // end sertifikasi chart
</script>
@endpush
@push('js')
@endpush