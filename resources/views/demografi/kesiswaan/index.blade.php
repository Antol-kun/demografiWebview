{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<!-- <a href="{{ url('datasekolah/create') }}" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a> -->
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Seluruh Jumlah Pelanggaran Berdasarkan Jenis Sanksi</h3>
                </div>
            </div>
            <div class="card-body" style="position: relative;">
                <input type="hidden" id="berat" name="berat" value="{{$berat}}">
                <input type="hidden" id="sedang" name="sedang" value="{{$sedang}}">
                <input type="hidden" id="ringan" name="ringan" value="{{$ringan}}">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div id="siswaChart"></div>
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
    var siswaChart = {
        series: [
            Number($("#berat").val()), 
            Number($("#sedang").val()), 
            Number($("#ringan").val())
        ],
        chart: {
            type: 'donut',
        },
        labels: ['Berat', 'Sedang', 'Ringan'],
        colors: ['#e74c3c', '#f7cf05', '#3498db'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 50
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

    var schart = new ApexCharts(document.querySelector("#siswaChart"), siswaChart);
    schart.render();
</script>
@endpush
@push('js')
@endpush