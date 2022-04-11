{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--end::Wrapper-->
<!--begin::Button-->
<!--<a href="{{ url('datauangsekolah/create') }}" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a>-->
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
            
            <div style="padding-top: 15px;" class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kelompok  Kelas</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kelas" id="kelas"  class="form-select form-select-solid">
                        <option value="">Pilih Kelas...</option>
                        <option>X IPA 1</option>
                        <option>XI IPS 1</option>
                        <option>XII IPS 2</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tahun Ajaran</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select  id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih TA...</option>
                        <option>2021 Ganjil</option>
                        <option>2022 Genap</option>
                    </select>
                    <!--end::Input-->
                </div>
            </div>

            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <br />
                <div class="table-responsive">
                    <table id="tabeldata"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Nama</th>
                            <th>Sisa Tagihan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center">1</td>
                                <td>Imam</td>
                                <td>Rp. 1.500.000,-</td>
                                <td><a href="{{ url('datapaket/siswabelumlunas/detail') }}" type="button" class="btn btn-primary btn-sm" >Detail</a></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">2</td>
                                <td>Cacas</td>
                                <td>Rp. 2.300.000,-</td>
                                <td><a href="{{ url('datapaket/siswabelumlunas/detail') }}" type="button" class="btn btn-primary btn-sm" >Detail</a></td>
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