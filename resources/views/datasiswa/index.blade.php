{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<div class="me-4">
    <!--begin::Menu-->
    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
            </g>
        </svg>
    </span>
    <!--end::Svg Icon-->Filter Data</a>
    <!--begin::Menu 1-->
    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
        <!--begin::Header-->
        <div class="px-7 py-5">
            <div class="fs-5 text-dark fw-bolder">Filter Kelompok Kelas</div>
        </div>
        <!--end::Header-->
        <!--begin::Menu separator-->
        <div class="separator border-gray-200"></div>
        <!--end::Menu separator-->
        <!--begin::Form-->
        <form method="post" action="#">
            {{ csrf_field() }}
        <div class="px-7 py-5">
            <!--begin::Input group-->
            <div class="mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bold">Kelompok Kelas :</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div>
                    <select name="kelas" class="form-select form-select-solid" id="kelas">
                        <option value="">Pilih Kelompok Kelas...</option>
                        @foreach($kelompok as $kls)
                        <option value="{{$kls->kode_kelompok}}">{{$kls->kode_kelompok}}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bold">Status Siswa :</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div>
                    <select name="status_siswa" id="status_siswa" class="form-select form-select-solid" required>
                        <option value="">Silahkan Pilih Status Siswa...</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Lulus">Lulus</option>
                        <option value="DO">DO (Drop Out)</option>
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bold">Tingkat Kelas :</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div>
                    <select name="tingkat" class="form-select form-select-solid" required>
                        <option value="">Silahkan Pilih Tingkat Kelas...</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bold">Tahun Masuk :</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div>
                    <select name="tahun_masuk" id="tahun_masuk" class="form-select form-select-solid" required>
                            <option value="">Tahun Masuk...</option>
                            {{ $thn = date('Y') }}
                            @for($a=2015; $a<=$thn; $a++)
                                <option value="{{ $a }}">{{ $a }}</option>
                            @endfor
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10">
                <!--begin::Label-->
                <label class="form-label fw-bold">Agama :</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div>
                    <select name="agama" class="form-select form-select-solid"required id="agama" required>
                            <option value="">Silahkan Pilih Agama...</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Filter</button>
            </div>
            <!--end::Actions-->
        </div>
    </form>
        <!--end::Form-->
    </div>
    <!--end::Menu 1-->
    <!--end::Menu-->
</div>
<!--end::Wrapper-->
<!--begin::Button-->
<a href="/datasiswa/create" class="btn btn-sm btn-primary">Tambah {{$testVariable}}</a>&nbsp;&nbsp;
<a href="javascript:void(0);" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Import Excel Data {{$testVariable}}</a>
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
                    Data {{ $testVariable }}
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

                        <table class="table table-striped table-bordered data-table" id="tabeldata">
                            <thead>
                                <tr>
                                    <th width="50" style="text-align:center;">No</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Asal Sekolah</th>
                                    <th>No. Telepon</th>
                                    <th>Kelompok Kelas</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            @php $no=1; @endphp
                                @foreach($datasiswa as $data)
                                <tr style="height: 40px">
                                    <td style="text-align:center;">{{$no++}}</td>
                                    <td>{{$data->nis}}</td>
                                    <td>{{$data->nisn}}</td>
                                    <td>{{$data->nama_siswa}}</td>
                                    <td>{{$data->asal_sekolah}}</td>
                                    <td>@if($data->no_telp == '') --- @else {{$data->no_telp}} @endif</td>
                                    <td>@if($data->kode_kelompok == '') --- @else {{$data->kode_kelompok}} @endif</td>
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
                                              <a href="/datasiswa/show/{{ base64_encode($data->idsiswa) }}" class="menu-link px-3">Detail</a>
                                            </div>
                                            <div class="menu-item px-3">
                                              <a href="/datasiswa/berkas/{{ base64_encode($data->nisn) }}" class="menu-link px-3">Berkas Siswa</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                              <a href="/datasiswa/edit/{{ base64_encode($data->idsiswa) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                              <a href="javascript:;" onclick="konfirmasi({{$data->idsiswa}})" class="menu-link px-3">Hapus</a>
                                            </div>
                                            <!--end::Menu item-->

                                        </div>
                                        <!--end::Menu-->
                                </td>
                                </tr>
                                @endforeach
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!--end::Table-->
            </div>


        </div>
        <!--end::Card-->
    </div>

     <!--begin::Modal - New Card-->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
    <div class="modal-header">
    <h2>Import data excel siswa</h2>
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
    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
    <form name="kelasinput" id="kelasinput" method="post" enctype="multipart/form-data" action="/datasiswa/importdatasiswa">
        {{ csrf_field() }}
        <div class="row mb-5">
                        
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Excel Siswa : </label>
                            <input type="file" required class="form-control form-control-solid" placeholder="" name="dataimport" id="dataimport"/>
                        </div>

                    </div>

    <div class="text-center">
        <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Batal</button>
        <a href="/datasiswa/downloadsampelsiswa" class="btn btn-info me-3">Download Sampel</a>
        <button type="submit" class="btn btn-success" id="saveBtn">Import Data</button>
    </div>
</form>
                               
    </div>
    <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->

    <!--end::Container-->
</div>
@endsection

@push('lib-js')
@push('lib-js')
<script>
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
                      url: "/datasiswa/hapus/"+id,
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
@push('js')
@endpush