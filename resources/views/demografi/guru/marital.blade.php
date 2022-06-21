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
                    <h3 class="card-label">Data Guru Berdasarkan Status Marital</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div id="maritalChart"></div>
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
    var options = {
            series: [{
                name: 'Net Profit',
                data: [40, 50, 65, 70, 50, 30]
            }, {
                name: 'Revenue',
                data: [-30, -40, -55, -60, -40, -20]
            }],
            chart: {
                type: 'bar',
                stacked: true,
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['12%'],
                    endingShape: 'rounded'
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: ['#aeb5b2'],
                        fontSize: '12px',
                    }
                }
            },
            yaxis: {
                min: -80,
                max: 80,
                labels: {
                    style: {
                        colors: ['#aeb5b2'],
                        fontSize: '12px',
                    }
                }
            },
            fill: {
                opacity: 1
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px',
                },
                y: {
                    formatter: function (val) {
                        return "$" + val + " thousands"
                    }
                }
            },
            colors: ["#6d7574", "#3e71c9"],
            grid: {
                borderColor: ["#a3a3a3"],
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };
    var chart = new ApexCharts(document.querySelector("#maritalChart"), options);
    chart.render();
</script>
@endpush
@push('js')
@endpush