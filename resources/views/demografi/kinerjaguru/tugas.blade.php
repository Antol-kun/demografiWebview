{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
<style>
    .mapel h3,
    .materi h3,
    .file h3,
    .tautan h3 {
        font-size: 26px;
        line-height: 15px;
    }

    .table.dataTable.no-footer {
        border-bottom: none;
    }
</style>
@endpush
@push('css')
@endpush

@section('sub_header_action')
@include('demografi.kinerjaguru.topbar')
@endsection

@section('content')
<div class="d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-xl-stretch mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Header-->
                        <div class="px-9 pt-7 card-rounded h-325px w-100 bg-info">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <h3 class="m-0 text-white fw-bolder fs-3"><i class="fas fa-chart-area text-white" style="font-size: 18px"></i>&nbsp;Statistik Pemberian Tugas</h3>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Balance-->
                            <div class="d-flex text-center flex-column text-white pt-4">
                                <span class="fw-bolder fs-2x pt-1">203</span>
                                <span class="fw-bold fs-7">Kelas Mapel</span>
                            </div>
                            <!--end::Balance-->
                            <!--begin::Balance-->
                            <div class="d-flex text-center flex-column text-white pt-4">
                                <span class="fw-bolder fs-2x pt-1">2.142</span>
                                <span class="fw-bold fs-7">Tugas Terupload</span>
                            </div>
                            <!--end::Balance-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Items-->
                        <div class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1 text-center" style="margin-top: -100px">
                            <h3 style="font-weight: 400">Rata-Rata Jumlah Tugas Terupload di Setiap Kelas</h3>
                            <div id="tugasChart"></div>
                            <h5 style="font-weight: 400">Rata - rata Sekolah</h5>
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom gutter-b position-relative mb-3">
                    <div class="card-body">
                        <h3 class="m-0 fw-bolder fs-3 mb-3"><i class="fas fa-user" style="font-size: 18px; color: #000"></i>&nbsp;Data Pemberian Tugas</h3>
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="table-responsive">
                                <table class="table data-table" id="cok">
                                    <thead>
                                        <tr class="px-3">
                                            <th>Pengajar, Mapel, Kelas</th>
                                            <th>Jumlah Tugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('guru/titi.png') }}"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Titi Khairunisa, S.Pd.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">Bahasa Indonesia | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">9 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('guru/bambang.png') }}"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Bambang Hartono, S.Pd.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">Matematika | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">9 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 90%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('guru/rudi.png') }}"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Rudi Maulana, S.Pd.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">Fisika | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">8 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 80%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('guru/sutarna.png') }}"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Tri Sutrisno, S.H., M.H.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">Kimia | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">8 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 80%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="{{ asset('guru/titi.png') }}"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sri Mulyani, S.Pd.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">MTK | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">7 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 70%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-11.jpg"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Ari Kurniawan Saputra, S.Kom M.Kom.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">TIK | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">7 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 70%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pr-0 d-flex align-items-center" style="gap: 5%">
                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                    <span class="symbol-label">
                                                        <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-6.jpg"
                                                            class="h-75 align-center" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Tira Agustin, S.Pd.</a>
                                                    <span class="text-muted font-weight-bold text-muted d-block">Kewarganegaraan | X IPA 1</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column w-100" style="padding-right: 15px;">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">6 Tugas</span>
                                                    </div>
                                                    <div class="progress progress-xs w-100">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 60%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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
    var options = {
        series: [15],
        labels: ['Tugas'],
        chart: {
            height: 200,
            type: 'radialBar',
        },
        colors: ['#1B305B'],
        plotOptions: {
            radialBar: {
                hollow: {
                    size: '60%',
                },
                dataLabels: {
                showOn: "always",
                position: 'bottom',
                name: {
                    show: true,
                },
                value: {
                    fontSize: "22px",
                    fontWeight: '700'
                },
                total: {
                    show: true,
                    label: 'Tugas',
                    formatter: function (w) {
                        return 15
                    }
                }
            },
            }
        },
        stroke: {
            lineCap: "round",
        },
    };
    new ApexCharts(document.querySelector("#tugasChart"), options).render();
</script>
@endpush
@push('js')
@endpush