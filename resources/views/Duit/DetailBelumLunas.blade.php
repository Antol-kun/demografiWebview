{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--end::Wrapper-->
<!--begin::Button-->
<a href="{{ url('datapaket/siswabelumlunas') }}" class="btn btn-sm btn-primary">Kembali ke Tagihan Belum Lunas</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL SEBELUMNYA(HOMECONTROLLER::example()) --}}
       

           <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                {{$testVariable}}
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">
          
          <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <br />
                <div class="table-responsive">
                    <table id="tabeldata"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Nama</th>
                            <th>Nama Paket</th>
                            <th>Biaya Tagihan</th>

                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">1</td>
                                <td>Imam</td>
                                <td>Keamanan</td>
                                <td>Rp. 1.00.000,-</td>

                            </tr>
                            <tr>
                                <td style="text-align: center">2</td>
                                <td>Imam</td>
                                <td>Parkir</td>
                                <td>Rp. 500.000,-</td>

                            </tr>


                        </tbody>

                    </table>
                </div>
            </div>
            <!--end::Table-->

        </div>
    </div>
       
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@push('lib-js')
@endpush
@push('js')

@endpush