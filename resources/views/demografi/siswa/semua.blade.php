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
        <!--begin::Card-->
        <div class="card card-custom gutter-b mb-3">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Jumlah Semua Siswa</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="jumlahSiswaChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->

        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Data Jumlah Siswa Per Kelompok Kelas</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="siswaKlsChart"></div>
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
    // Chart Jumlah siswa
    var tahun = [];
    for(let i=2013;i<=new Date().getFullYear();i++){
        tahun.push(i);
    }
    var siswaOptions = {
            series: [{
                name: 'Jumlah Siswa',
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
                    text: 'Jumlah Seluruh Siswa'
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

    new ApexCharts(document.querySelector("#jumlahSiswaChart"), siswaOptions).render();
    // end chart jumlah siswa

    // mapel siswa kelas
    var siswaKlsOptions = {
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
                categories: ['X MIPA', 'X IPS', 'XI MIPA', 'XI IPS', 'XII MIPA'],
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        };

    new ApexCharts(document.querySelector("#siswaKlsChart"), siswaKlsOptions).render();
    // end mapel siswa kelas
</script>
@endpush
@push('js')
@endpush