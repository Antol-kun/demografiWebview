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
                    <h3 class="card-label">Data Guru Berdasarkan Jenis Kelamin</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div id="jkChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
        <div class="row pt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Data Jenis Kelamin Berdasarkan Status Marital</h3>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <h5 style="color: #777e90">Belum Menikah</h5>
                                        <div id="bmChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Data Jenis Kelamin Berdasarkan Status Marital</h3>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <h5 style="color: #777e90">Sudah Menikah</h5>
                                        <div id="smChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Data Jenis Kelamin Berdasarkan Status Kepegawaiaan</h3>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <h5 style="color: #777e90">Guru Tetap Yayasan (GTY)</h5>
                                        <div id="bmkChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Data Jenis Kelamin Berdasarkan Status Kepegawaiaan</h3>
                                </div>
                            </div>
                            <div class="card-body" style="position: relative;">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-12 text-center">
                                        <h5 style="color: #777e90">Guru Tidak Tetap (GTT)</h5>
                                        <div id="smkChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
<script>
    var jkChart = {
        series: [12, 35],
        chart: {
            type: 'donut',
        },
        dataLabels: {
            style: {
                fontSize: '18px',
                fontWeight: 'bold',
            },
        },
        labels: ['Laki - laki', 'Perempuan'],
        colors: ['#f64e60', '#8950fc'],
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                    }
                }
            }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 20
            },
            legend: {
              position: 'bottom'
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
    var jkchart = new ApexCharts(document.querySelector("#jkChart"), jkChart);
    jkchart.render();

    var bmChart = {
        series: [36, 44],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - laki', 'Perempuan'],
        colors: ['#50cd89', '#f64e60'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom'
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
    var bmchart = new ApexCharts(document.querySelector("#bmChart"), bmChart);
    bmchart.render();

    var smChart = {
        series: [64, 16],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - laki', 'Perempuan'],
        colors: ['#f7a305', '#8950fc'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom'
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
    var smchart = new ApexCharts(document.querySelector("#smChart"), smChart);
    smchart.render();

    var bmkChart = {
        series: [36, 44],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - laki', 'Perempuan'],
        colors: ['#f7a305', '#50cd89'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom'
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
    var bmkchart = new ApexCharts(document.querySelector("#bmkChart"), bmkChart);
    bmkchart.render();

    var smkChart = {
        series: [64, 16],
        chart: {
            type: 'pie',
        },
        labels: ['Laki - laki', 'Perempuan'],
        colors: ['#31befb', '#f64e60'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 100
            },
            legend: {
              position: 'bottom'
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
    var smkchart = new ApexCharts(document.querySelector("#smkChart"), smkChart);
    smkchart.render();
</script>
@endpush
@push('js')
@endpush