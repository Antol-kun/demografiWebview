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
                {{$title}}
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
                        <option>X IPS 2</option>
                        <option>XI IPA 1</option>
                        <option>XII IPA 2</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-4 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tahun Ajaran</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select  id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih Semester...</option>
                        <option>2021 Ganjil</option>
                        <option>2021 Genap</option>
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-4 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Type Paket</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select  id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih Type Paket...</option>
                        <option>Bulanan</option>
                        <option>Tahunan</option>
                    </select>
                    <!--end::Input-->
                </div>
            </div>

            <div style="padding-top: 15px;" class="row">
                <!--begin::Col-->
                <div class="col-md-12 fv-row">

                    <table class="table table-hover" style="width: 30%">
                        <tbody>
                        <tr>
                            <td >
                                <div style="border: 0; padding: 10px; background-color: lightgreen; text-align: left; width: 2%">  </div>
                            </td>
                            <td><b>Lunas</b></td>

                            <td>
                                <div style="border: 0; padding: 10px; background-color: lightcoral; text-align: left; width: 2%">  </div>
                            </td>
                            <td ><b>Belum Lunas</b></td>


                            <td width="2%" style="background-color: ghostwhite">
                                <div style="border: 0; padding: 10px; background-color: white; text-align: left; width: 2%">  </div>
                            </td>
                            <td width="15%"><b>Belum Tertagih</b></td>
                        </tr>

                        </tbody>
                    </table>
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
                            <th scope="col">Jul 21</th>
                            <th scope="col">Agust 21</th>
                            <th scope="col">Sept 21</th>
                            <th scope="col">Okt 21</th>
                            <th scope="col">Nov 21</th>
                            <th scope="col">Des 21</th>
                            <th scope="col">Jan 22</th>
                            <th scope="col">Feb 22</th>
                            <th scope="col">Mar 22</th>
                            <th scope="col">Apr 22</th>
                            <th scope="col">Mei 22</th>
                            <th scope="col">Jun 22</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: center">1</td>
                            <td>Imam</td>
                            <td>0</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td  style="background: lightgreen">Rp.500.000,-</td>
                            <td  style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td  style="background: lightgreen">Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">2</td>
                            <td>Cacas</td>
                            <td>Rp. 2.300.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td  style="background: lightcoral">Rp.500.000,-</td>
                            <td  style="background: lightcoral">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td style="background: lightgreen">Rp.500.000,-</td>
                            <td  style="background: lightcoral">Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
                            <td>Rp.500.000,-</td>
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





