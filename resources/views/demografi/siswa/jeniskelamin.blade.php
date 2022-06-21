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
                            <h3 class="card-label">Data Jenis Kelamin Siswa</h3>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div class="row">
                            <h3 class="text-center">Keseluruhan</h3>
                            <div class="col-md-12">
                                <div id="keseluruhanChart"></div>
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
                            <h3 class="card-label">Data Jenis Kelamin Siswa</h3>
                        </div>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <div class="row">
                            <h3 class="text-center">Sudah Menikah</h3>
                            <div class="col-md-12">
                                <div id="smChart"></div>
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
    // Keseluruhan Chart
    var keseluruhanOptions = {
        series: [36, 44],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - Laki', 'Perempuan'],
        colors: ['#50cd89', '#f64e60'],
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
    new ApexCharts(document.querySelector("#keseluruhanChart"), keseluruhanOptions).render();
    // End Keseluruhan Chart

    // Sudah Menikah Chart
    var smOptions = {
        series: [64, 16],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - Laki', 'Perempuan'],
        colors: ['#f7a305', '#8950fc'],
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
    new ApexCharts(document.querySelector("#smChart"), smOptions).render();
    // End Sudah Menikah Chart
</script>
@endpush
@push('js')
@endpush