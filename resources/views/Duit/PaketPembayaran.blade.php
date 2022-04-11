{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<!--begin::Button-->
<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalpaket" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a>
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
                    {{ $testVariable }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center position-relative my-1" data-kt-user-table-toolbar="base">
                        <!-- <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari {{ $testVariable }}.."> -->
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">

                <table id="tabeldata" class=" display table table-bordered nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Tahun Ajaran</th>
                        <th>Type Tagihan/Pembayaran</th>
                        <th>Frekuensi Sebelum Tgl Pembayaran</th>
                        <th>Frekuensi Sesudah Tgl Pembayaran</th>
                        <th>Keterangan Pembayaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       @php $no=1 @endphp
                    @foreach($paket as $data)
                        <tr  @if($data->type_pembayaran == 'Tahunan')
                             style="background-color: #00c179; color: white"
                        @elseif($data->type_pembayaran == 'Satu Kali')
                             style="background-color: #a55aff; color: white"
                        @else

                        @endif>
                            <td style="text-align:center;color: black">{{$no++}}</td>
                            <td>{{$data -> nama_paket}}</td>
                            <td>{{$data -> tahunakademik.' '.$data->semester}}</td>
                            <td>{{$data -> type_pembayaran}}</td>
                            <td style="text-align: center">1 Kali / <b>{{$data ->frekuensi_before}}</b> Hari </td>
                            <td style="text-align: center">1 Kali / <b>{{$data ->frekuensi_after}}</b> Hari</td>
                            <td>
                                @if($data->type_pembayaran == 'Tahunan' or $data->type_pembayaran == 'Satu Kali')
                                 Tagihan Tanggal: {{ $data -> tgl_tagihan}} <br />
                                   Jatuh Tempo Tanggal: {{ $data -> tgl_pembayaran}} <br />
                                    Pembayaran Bulan : {{$data->bulan_bayaran}}

                                @else
                                    <strong>
                                     Tagihan Tanggal: {{ $data -> tgl_tagihan}} (Setiap Bulan) <br />
                                     Jatuh Tempo Tanggal: {{$data -> tgl_pembayaran}} (Setiap Bulan)</strong>
                                @endif
                            </td>
                            <td>
                                <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Opsi
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
																</g>
															</svg>
														</span>
                                    <!--end::Svg Icon--></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="/datapaket/detailpaket/{{base64_encode($data->id)}}/{{base64_encode($data->nama_paket)}}" class="menu-link px-3 ">Lihat Detail</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0)"
                                           onclick="
                                               return Swal.fire({
                                               title: 'Yakin ingin menghapus data?',
                                               text: 'Data tidak akan muncul lagi',
                                               type: 'warning',
                                               showCancelButton: true,
                                               confirmButtonColor: '#3085d6',
                                               cancelButtonColor: '#d33',
                                               confirmButtonText: 'Hapus'
                                               }).then((result) => {

                                               if (result.value) {

                                               window.location.href = '/datapaket/hapuspaket/{{base64_encode($data->id)}}'
                                               } })"
                                           class="menu-link px-3">Hapus</a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!--end::Table-->
        </div>


    </div>
    <!--end::Card-->


    <div class="modal fade" id="modalpaket" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Tambah Paket Pembayaran</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" method="post" action="/datapaket/simpanpaket">
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Nama Paket</span>
                             </label>
                            <!--end::Label-->
                            <input required type="text" class="form-control form-control-solid" placeholder="Masukan Nama Paket" id="paket" name="paket" />
                        </div>

                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Tahun Ajaran</span>
                              </label>
                            <!--end::Label-->
                            <select required name="tahunajaran" id="tahunajaran" class="form-select form-select-solid">
                                <option value="" disabled selected>Tahun Ajaran</option>
                                @foreach($ta as $data)
                                    <option value="{{$data->idsettingtahun}}">{{$data->tahunakademik.' '.$data->semester}}</option>
                                @endforeach
                            </select>
                        </div>

                         <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Tipe Tagihan</span>
                                </label>
                                <!--end::Label-->
                                <select required name="tipetagihan" id="tipetagihan" onchange="typepaket()" class="form-select form-select-solid">
                                    <option value="" disabled selected>--</option>
                                    <option>Bulanan</option>
                                    <option>Tahunan</option>
                                    <option>Satu Kali</option>
                                </select>
                            </div>

                         <div class="row mb-5" id="tpbulanan" hidden>
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tanggal Tagihan (Ditiap Bulan)</label>
                                <!--begin::Select-->
                                <select  name="tgl_tagihan" id="tgl_tagihan" class="form-select form-select-solid">
                                    <option value="" disabled selected>Pilih Tanggal</option>
                                    @php
                                        for($i=1; $i<=28; $i++){
                                            echo "<option>".$i."</option>";
                                        }
                                    @endphp
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tanggal Jatuh Tempo (Ditiap Bulan)</label>
                                <!--begin::Select-->
                                <select  name="tgl_pembayaran" id="tgl_pembayaran" class="form-select form-select-solid">
                                    <option value="" disabled selected>Pilih Tanggal</option>
                                    @php
                                        for($i=1; $i<=28; $i++){
                                            echo "<option>".$i."</option>";
                                        }
                                    @endphp
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Col-->
                        </div>

                            <div class="row mb-5" id="tptahunan" hidden>

                                 <div class="col-md-12 fv-row">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Tanggal Tagihan</label>
                                    <!--begin::Select-->
                                    <select  name="tgl_tagihan" id="tgl_tagihan" class="form-select form-select-solid">
                                        <option value="" disabled selected>Pilih Tanggal</option>
                                        @php
                                            for($i=1; $i<=28; $i++){
                                                echo "<option>".$i."</option>";
                                            }
                                        @endphp
                                    </select>
                                    <!--end::Select-->
                                </div>

                                <div class="col-md-6 fv-row">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Tanggal Jatuh tempo</label>
                                    <!--begin::Select-->
                                    <select  name="tgl_pembayaran" id="tgl_pembayaran" class="form-select form-select-solid">
                                        <option value="" disabled selected>Pilih Tanggal</option>
                                        @php
                                            for($i=1; $i<=28; $i++){
                                                echo "<option>".$i."</option>";
                                            }
                                        @endphp
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Pilih Bulan Tagihan</label>
                                    <!--begin::Select-->
                                    <select  name="blnbayaran" id="blnbayaran" class="form-select form-select-solid">
                                        <option value="" disabled selected>Pilih Bulan</option>
                                        @php
                                            for($i=1; $i<=12; $i++){
                                                echo "<option>".$i."</option>";
                                            }
                                        @endphp
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Col-->
                            </div>

                         <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Frekuensi Notifikasi Sebelum Tgl Tempo</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select required id="fre_before" name="fre_before" class="form-select form-select-solid">
                                    <option value="" disabled selected>Pilih Waktu</option>
                                    @php
                                        for($i=1; $i<=7; $i++){
                                               echo "<option value=".$i.">1 Kali / ".$i." Hari</option>";
                                           }
                                    @endphp

                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                             <div class="col-md-6 fv-row">
                                 <!--begin::Label-->
                                 <label class="required fs-5 fw-bold mb-2">Frekuensi Notifikasi Setelah Tgl Tempo</label>
                                 <!--end::Label-->
                                 <!--begin::Input-->
                                 <select required id="fre_after" name="fre_after" class="form-select form-select-solid">
                                     <option value="" disabled selected>Pilih Waktu</option>
                                     @php
                                         for($i=1; $i<=7; $i++){
                                            echo "<option value=".$i.">1 Kali / ".$i." Hari</option>";
                                         }
                                     @endphp

                                 </select>
                                 <!--end::Input-->
                             </div>
                         </div>
                        <br />
                        <hr />

                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <div class="d-flex align-items-center">
                                    <!--begin::Checkbox-->
                                    <div class="table-responsive">
                                           <table id="limit"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th>Rincian</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($komponenbiaya as $data)
                                                <tr>
                                                    <td style="text-align: center">
                                                        {{$loop->index+1}}
                                                    </td>
                                                    <td style="width: 800px">
                                                        <label class="form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input h-20px w-20px" type="checkbox"  id="ckomponen[]"  name="ckomponen[]" value="{{$data->idkomponen}}" />
                                                            <span class="form-check-label fw-bold">{{$data->nama_komponen.' - Rp.'.number_format($data->besaran_biaya)}}</span>
                                                        </label>

                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                            <div class="row mb-5" style="padding-top: 10px" >

                                <div style="text-align: right">
                                    <button type="submit" onclick="loadingpaket()" id="buttonpaket" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                </div>

                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadingpaket() {

            var paket = $('#paket').val()
            var ta = $('#tahunajaran').val()
            var tgp = $('#tgl_tagihan').val()
            var tgb = $('#tgl_pembayaran').val()

            if(paket != '' && ta != '' && tgp != '' && tgb != '') {
                $('#buttonpaket').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Loading...');
            }


        }


        function typepaket() {

            var type = $('#tipetagihan').val()

            if (type == 'Bulanan'){

                $('#tpbulanan').attr('hidden', false)
                $('#tptahunan').attr('hidden', true)

            }else if (type == 'Tahunan'){

                $('#tpbulanan').attr('hidden', true)
                $('#tptahunan').attr('hidden', false)

            }else{

                $('#tpbulanan').attr('hidden', true)
                $('#tptahunan').attr('hidden', false)

            }

        }

    </script>

@endsection
