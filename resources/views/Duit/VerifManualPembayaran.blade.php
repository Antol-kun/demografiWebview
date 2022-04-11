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
                <div class="col-md-4 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kelompok Kelas</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kelas" id="kelas"  class="form-select form-select-solid">
                        <option value="">Pilih Kelompok Kelas...</option>
                        <option>X IPA 2</option>
                        <option>XI IPS 3</option>
                        <option>XII IPA 1</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-4 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tahun Ajaran</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select  id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih TA...</option>
                        <option>2021 Ganjil</option>
                        <option>2021 Genap</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-4 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tipe Paket</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select  id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih Tipe Paket...</option>
                        <option>Bulanan</option>
                        <option>Tahunan</option>
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
                            <th>Nomor Invoice</th>
                            <th>Nama</th>
                            <th>Nama Paket</th>
                            <th>Jumlah Tagihan</th>
                            <th>Status</th>
                            <th>Bukti Bayar</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: center">1</td>
                            <td>01KSJDIE3</td>
                            <td>Imam</td>
                            <td>Paket Combo</td>
                            <td>Rp. 1.500.000,-</td>
                            <td>Menunggu Validasi</td>
                            <td><a href="#" type="button" class="btn btn-success btn-sm" >Lihat</a></td>
                            <td><a href="#" type="button" class="btn btn-primary btn-sm" >Validasi</a></td>

                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>938SDFKS</td>
                            <td>Cacas</td>
                            <td>Paket Hemat</td>
                            <td>Rp. 5.600.000,-</td>
                            <td>Menunggu Validasi</td>
                            <td><a href="#" type="button" class="btn btn-success btn-sm" >Lihat</a></td>

                            <td><a href="#" type="button" class="btn btn-primary btn-sm" >Validasi</a></td>

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