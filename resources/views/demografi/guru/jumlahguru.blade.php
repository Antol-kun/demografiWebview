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
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Semua Guru</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="jumlahGuruChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Guru Berdasarkan Mata Pelajaran Akademik</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="akademikGuruChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Guru Berdasarkan Mata Praktek / Jurusan</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="praktekGuruChart"></div>
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
    // Chart Jumlah guru
    var tahun = [];
    for(let i=2013;i<=new Date().getFullYear();i++){
        tahun.push(i);
    }
    var guruChart = {
            series: [{
                name: 'Jumlah Guru',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 28]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'center', // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    colors: ["#FFFFFF"]
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
                    text: 'Jumlah Guru'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " orang"
                    }
                }
            }
        };

    var jumlahChart = new ApexCharts(document.querySelector("#jumlahGuruChart"), guruChart);
    jumlahChart.render();
    // end chart jumlah guru

    // mapel akademik chart
    var akademikChart = {
            series: [{
                name: 'Mata Pelajaran Akademik',
                data: [44, 55, 57, 56, 61]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            colors: ["#f1c40f"],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'center', // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    colors: ["#FFFFFF"]
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['MTK', 'B. Indo', 'B. Ing', 'Sejarah', 'Agama'],
            },
            yaxis: {
                title: {
                    text: 'Mata Pelajaran Akademik'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " Akademik"
                    }
                }
            }
        };

    var akademikChart = new ApexCharts(document.querySelector("#akademikGuruChart"), akademikChart);
    akademikChart.render();
    // end mapel akademik chart

    // mapel praktek chart
    var praktekChart = {
            series: [{
                name: 'Mata Pelajaran Praktek/Jurusan',
                data: [44, 55, 57, 56, 61]
            }],
            chart: {
                stacked: true,
                type: 'bar',
                height: 350
            },
            colors: ["#8950fc"],
            plotOptions: {
                bar: {
                    borderRadius: 5,
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'center', // top, center, bottom
                    },
                },
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '12px',
                    colors: ["#FFFFFF"]
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['TKJ', 'Akutansi', 'T.Mesin', 'Farmasi', 'Tata Boga'],
            },
            yaxis: {
                title: {
                    text: 'Jumlah Pelajaran Praktek'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        };

    var pChart = new ApexCharts(document.querySelector("#praktekGuruChart"), praktekChart);
    pChart.render();
    // end mapel praktek chart
</script>
@endpush
@push('js')
@endpush