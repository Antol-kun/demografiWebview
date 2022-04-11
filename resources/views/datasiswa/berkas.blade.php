{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
        <a href="/datasiswa" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable}}</a>
</div>
<!-- <form method="post" action="/datasettingsiswa/store"> -->
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
                </div>
                <!--end::Card toolbar-->
            </div>

            <!-- <form name="kelasinput" id="kelasinput" method="post"> -->
            <div class="card-body pt-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td width="20%"><b>NIS</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nis}}</td>
                            <td rowspan="22"> 
                                        <center><img src="@if($datasiswa[0]->foto == null) {{ asset('pasfoto/siswa/no-image.png') }} @else {{ asset('pasfoto/siswa/'.$datasiswa[0]->foto) }} @endif" class="img-thumbnail" alt="Pasfoto Siswa" width="204" height="15a">
                                        <br/>
                                        <u>NISN : {{$datasiswa[0]->nisn}}</u>
                                        <br/>{{$datasiswa[0]->nama_siswa}}</center>
                                    </td>
                        </tr>
                      <tr>
                         <tr>
                            <td width="20%"><b>NIS</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nis}}</td>
                        </tr>
                      </tr>
                       <tr>
                            <td width="20%"><b>NISN</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nisn}}</td>
                        </tr>
                      <tr>
                            <td width="20%"><b>Nama Siswa</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->nama_siswa}}</td>
                        </tr>
                      <tr>
                            <td width="20%"><b>Tingkat Kelas</b></td>
                            <td width="2%">:</td>
                            <td>@if($datasiswa[0]->tingkatkelas == 'X') {{$datasiswa[0]->tingkatkelas}} (Sepuluh) @elseif($datasiswa[0]->tingkatkelas == 'XI') {{$datasiswa[0]->tingkatkelas}} (Sebelas) @elseif($datasiswa[0]->tingkatkelas == 'XII') {{$datasiswa[0]->tingkatkelas}} (Dua Belas) @endif</td>
                        </tr>
                      <tr>
                            <td width="20%"><b>Status Siswa</b></td>
                            <td width="2%">:</td>
                            <td>{{$datasiswa[0]->statussiswa}}</td>
                        </tr>
                    </tbody>
                  </table>
                                
            </div>

        </div>
        <!--end::Card-->
        
        <br/>
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    {{ $testVariable2 }}
                    <button type="button" class="btn btn-sm btn-primary" style="position: absolute; right: 30px;" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tambah Berkas</button>
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
                <!--begin::Notice-->
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
																</svg>
															</span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                            <h4 class="text-gray-800 fw-bolder">Data Berkas Siswa</h4>
                            <div class="fs-6 text-gray-600">Data beberapa berkas siswa terdiri dari Ijazah SMP, Akta Kelahiran dan Kartu Keluarga (KK)</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                
                <table class="table table-striped table-bordered data-table" id="tabeldata">
                            <thead>
                                <tr>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th>Jenis Berkas</th>
                                    <th>Nomor Ijazah/Akta/KK</th>
                                    <th>Berkas</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            @php $no=1; @endphp
                                @foreach($databerkas as $data)
                                <tr style="height: 40px">
                                    <td style="text-align:center;">{{$no++}}</td>
                                    <td>@if($data->jenis_berkas == 'Akta_lahir') Akta Lahir @elseif($data->jenis_berkas == 'KK') Kartu Keluarga @else Ijazah @endif</td>
                                    <td>{{$data->no_berkas}}</td>
                                    <td><i class="fas fa-file-pdf"></i><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#kt_modal_prev_app{{$data->idberkas}}" class="menu-link px-3"><span class="badge badge-danger">{{$data->file_berkas}}</span></a></td>
                                    <td>
                                        <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Action
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
                                              <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_app{{$data->idberkas}}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                              <a href="javascript:;" onclick="konfirmasi({{$data->idberkas}})" class="menu-link px-3">Hapus</a>
                                            </div>
                                            <!--end::Menu item-->

                                        </div>
                                        <!--end::Menu-->
                                </td>
                                </tr>

                            <!--begin::Modal - Create App-->
                            <div class="modal fade" id="kt_modal_edit_app{{$data->idberkas}}" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!-- <form method="post" action="/datasettingsiswa/updatesiswa"> -->
                                            {{ csrf_field() }}
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2>Ubah Berkas Siswa</h2>
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
                                        <div class="modal-body py-lg-10 px-lg-10">
                                        <form name="kelasinput" id="kelasinput" action="/datasiswa/ubahberkas" enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                           <div class="form-group" required>
                                                <label class="required fs-5 fw-bold mb-2">Jenis Berkas :</label>
                                                <select name="jenis" class="form-select form-select-solid" required>
                                                    <option value="">Silahkan Pilih Jenis Berkas...</option>
                                                    <option value="{{$data->jenis_berkas}}" selected>@if($data->jenis_berkas == 'Akta_lahir') Akta Lahir @elseif($data->jenis_berkas == 'KK') Kartu Keluarga @else Ijazah @endif</option>
                                                    <option value="Ijazah">Ijazah</option>
                                                    <option value="Akta_lahir">Akta Kelahiran</option>
                                                    <option value="KK">Kartu Keluarga</option>
                                                </select>
                                            </div><br/>
                                            <div class="form-group" required>
                                                <label class="required fs-5 fw-bold mb-2">Nomor Ijazah/akta/kk :</label>
                                                <input type="hidden" name="id" value="{{$data->idberkas}}"/>
                                                <input type="hidden" name="nisn" value="{{$nisn}}"/>
                                                <input type="text" class="form-control form-control-solid" placeholder="Nomor Ijazah/akta/kk" name="nomor" required value="{{$data->no_berkas}}">
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <label class="fs-5 fw-bold mb-2">File Berkas :</label>
                                                <input type="file" class="form-control form-control-solid" name="berkas" accept="application/pdf">
                                                <span class="form-text text-muted"><font color="red">*) Format yang diperbolehkan adalah <b>*.pdf</b></font></span>
                                            </div>
                                            
                                        </div>
                                        <!--end::Wrapper-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary font-weight-bold">Simpan Perubahan Data</button>
                                        </div>
                                    </form>
                                        </div>
                                        <!--end::Actions-->
                                        <!-- </form> -->
                                        </div>
                                        <!--end::Content-->
                                        </div>
                                            <!--end::Stepper-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->

                                <!--begin::Modal - Create App-->
                            <div class="modal fade" id="kt_modal_prev_app{{$data->idberkas}}" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!-- <form method="post" action="/datasettingsiswa/updatesiswa"> -->
                                           
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2>Preview Berkas Siswa</h2>
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
                                        <div class="modal-body py-lg-10 px-lg-10">
                                        
                                        <embed type="application/pdf" src="@if($data->jenis_berkas == 'Akta_lahir') {{ asset('berkas/siswa/akta/'.$data->file_berkas) }} @elseif($data->jenis_berkas == 'KK') {{ asset('berkas/siswa/kk/'.$data->file_berkas) }} @else {{ asset('berkas/siswa/ijazah/'.$data->file_berkas) }} @endif" width="100%" height="870px">
                                            
                                        </div>
                                        <!--end::Wrapper-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary font-weight-bold" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                        </div>
                                        <!--end::Actions-->
                                        <!-- </form> -->
                                        </div>
                                        <!--end::Content-->
                                        </div>
                                            <!--end::Stepper-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->

                                @endforeach
                            <tbody>
                            </tbody>
                        </table>

        </div>
        <!--end::Card-->


        <!--begin::Modal - Create App-->
        <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!-- <form method="post" action="/datasettingsiswa/updatesiswa"> -->
                        {{ csrf_field() }}
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Berkas Siswa</h2>
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
                    <div class="modal-body py-lg-10 px-lg-10">
                    <form name="kelasinput" id="kelasinput" action="/datasiswa/uploadberkas" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                       <div class="form-group" required>
                            <label class="required fs-5 fw-bold mb-2">Jenis Berkas :</label>
                            <select name="jenis" class="form-select form-select-solid" required>
                                <option value="">Silahkan Pilih Jenis Berkas...</option>
                                <option value="Ijazah">Ijazah</option>
                                <option value="Akta_lahir">Akta Kelahiran</option>
                                <option value="KK">Kartu Keluarga</option>
                            </select>
                        </div><br/>
                        <div class="form-group" required>
                            <label class="required fs-5 fw-bold mb-2">Nomor Ijazah/akta/kk :</label>
                            <input type="hidden" name="nisn" value="{{$nisn}}"/>
                            <input type="text" class="form-control form-control-solid" placeholder="Nomor Ijazah/akta/kk" name="nomor" required>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label class="required fs-5 fw-bold mb-2">File Berkas :</label>
                            <input type="file" class="form-control form-control-solid" name="berkas" accept="application/pdf" required>
                            <span class="form-text text-muted"><font color="red">*) Format yang diperbolehkan adalah <b>*.pdf</b></font></span>
                        </div>
                        
                    </div>
                    <!--end::Wrapper-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Simpan Data</button>
                    </div>
                </form>
                    </div>
                    <!--end::Actions-->
                    <!-- </form> -->
                    </div>
                    <!--end::Content-->
                    </div>
                        <!--end::Stepper-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        
    </div>
    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@endpush
@push('js')
    <script>
        $(document).ready(function () {

        });
        $(function () {
            $('[name="kelas"]').select2()
            $('[name="tahunakademik"]').select2()
        })

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

        function konfirmasi(id){
            Swal.fire({
                title: "Perhatian !",
                text: "Anda yakin akan menghapus data berikut ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus !",
                cancelButtonText: "Tidak",
                reverseButtons: true
            }).then(function(result) {
                // console.log('Data:'+id);
                if (result.value) {
                    $.ajax({
                      url: "/datasiswa/hapusberkas/"+id,
                      type: "GET",
                      dataType: 'json',
                      success: function (data) {
                        location.reload();
                        Swal.fire("Berhasil", "Data berhasil dihapus", "success");                       
                      },
                      error: function (data) {
                          console.log('Error:', data.responseText);                      
                          Swal.fire("Gagal", "Data gagal dihapus !", "error");
                      }                 
                    });
                }
            });
        }
        
    </script>
@endpush