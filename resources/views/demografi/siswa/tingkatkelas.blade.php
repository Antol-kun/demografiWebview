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
                            <h3 class="card-label">Data Jumlah Siswa</h3>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div class="row">
                            <h3 class="text-center">Per Kelas</h3>
                            <div class="col-md-12">
                                <div id="perKlsChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-md-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b mb-3">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Data Jumlah Siswa</h3>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div class="row">
                            <h3 class="text-center">Per Jurusan</h3>
                            <div class="col-md-12">
                                <div id="perJurusanChart"></div>
                            </div>
                        </div>
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
    // PerKelas Chart
    var perKlsOptions = {
        series: [850, 636, 636],
        chart: {
            type: 'donut',
        },
        labels: ['Kelas IX', 'Kelas X', 'Kelas XI'],
        colors: ['#f64e60', '#8950fc', '#f7a305'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom',
              
            }
          }
        }],
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " orang"
                }
            }
        }
    };
    var perKlsChart = new ApexCharts(document.querySelector("#perKlsChart"), perKlsOptions);
    perKlsChart.render();
    // End PerKelas Chart

    // PerJurusan Chart
    var perJurusanOptions = {
        series: [1273, 845],
        chart: {
            type: 'donut',
        },
        labels: ['IPA', 'IPS'],
        colors: ['#f64e60', '#50cd89'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom',
              
            }
          }
        }],
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " orang"
                }
            }
        }
    };
    var perJurusan = new ApexCharts(document.querySelector("#perJurusanChart"), perJurusanOptions);
    perJurusan.render();
    // End PerJurusan Chart
</script>
@endpush
@push('js')
@endpush