{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="/datapelanggaransiswa" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL
        SEBELUMNYA(HOMECONTROLLER::example()) --}}
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    Tambah {{ $testVariable }}
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
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
                            <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                            <div class="fs-6 text-gray-600">Data diisi sebaik mungkin <b class="text-danger">berdasarkan
                                    fakta</b></div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                <form name="pelanggarupdate" id="pelanggarupdate" action="#" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>
                                    <div
                                        style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                                        <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                                            Form Pelanggaran :
                                        </span>
                                    </div>
                                </legend><br /><br />
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">NISN/NAMA</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="nisn" id="nisn" class="form-select form-select-solid" value="{{ $siswa[0]->nisn }}">
                                            @foreach ($list as $nama_siswa => $nisn)
                                                @if ($nisn === $siswa[0]->nisn)
                                                    <option value="{{ $nisn }}" selected>{{ $nisn ." - ". $nama_siswa }}</option>
                                                @else
                                                    <option value="{{ $nisn }}">{{ $nisn ." - ". $nama_siswa }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Tanggal Kejadian</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="date" class="form-control form-control-solid" placeholder=""
                                            name="tgl_kejadian" required id="tgl_kejadian" autocomplete="off"
                                            required value="{{ $siswa[0]->tgl_kejadian }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Tempat Kejadian</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="tmpt_kejadian" required id="tmpt_kejadian" autocomplete="off"
                                            required value="{{ $siswa[0]->tempat_kejadian }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Saksi</label>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        @php
                                            $select_saksi = $siswa[0]->saksi;
                                            $data_saksi = ['Guru', 'Siswa', 'Masyarakat'];
                                        @endphp
                                        <select name="saksi" class="form-select form-select-solid" required id="saksi"
                                            required value="{{ $select_saksi }}">
                                            @foreach ($data_saksi as $i)
                                                @if ($i == $select_saksi)
                                                    <option value="{{ $select_saksi }}" selected>{{ $select_saksi }}</option>
                                                @else
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Kasus/Keterangan</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="kasus" required id="kasus" autocomplete="off" value="{{ $siswa[0]->kasus }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--end::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Sanksi/Hukuman</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="sanksihukuman" required id="sanksihukuman" autocomplete="off" value="{{ $siswa[0]->sanksi }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Jenis Sanksi</label>
                                        <!--end::Label-->
                                        @php
                                            $select_sanksi = $siswa[0]->jenis_sanksi;
                                            $data_sanksi = ['Ringan', 'Sedang', 'Berat'];
                                        @endphp
                                        <!--begin::Select-->
                                        <select name="jenis_sanksi" class="form-select form-select-solid"
                                            id="jenis_sanksi" required value="{{ $select_sanksi }}">
                                            @foreach ($data_sanksi as $j)
                                                @if ($j == $select_sanksi)
                                                    <option value="{{ $select_sanksi }}" selected>{{ $select_sanksi }}</option>
                                                @else
                                                    <option value="{{ $j }}">{{ $j }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>
                                    <div
                                        style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                                        <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                                            Foto Bukti :
                                        </span>
                                    </div>
                                </legend><br /><br />
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" class="form-control form-control-solid" placeholder=""
                                            name="bukti_pelanggaran" id="bukti_pelanggaran" onchange="readURL(this);"/><br />
                                        @if ($siswa[0]->img_kasus)
                                            <img id="blah" class="img-thumbnail" src="{{ $siswa[0]->img_kasus }}" width="204" height="136">
                                        @else
                                            <img id="blah" src="{{ asset('pasfoto/siswa/no-image.png') }}"
                                            class="img-thumbnail" alt="bukti_pelanggaran" width="204" height="136">
                                        @endif
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <hr />
                            </fieldset>
                        </div>
                    </div>


                    <div class="card-footer text-end">
                        <button type="submit" class="btn w-100 w-sm-auto btn-primary" id="updateBtn">
                            <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5" />
                                    </g>
                                </svg></span>
                            Simpan</button>
                    </div>
                </form>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    @endsection

    @push('lib-js')
    @endpush
    @push('js')
    <script>
        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="nisn"]').select2()
            $('[name="saksi"]').select2()
            $('[name="jenis_sanksi"]').select2()
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // insert data using ajax
        $('#updateBtn').click(function(e){
            e.preventDefault();

            $(this).html('Memproses Data...');
            $('#updateBtn').disabled = true;

            $.ajax({
                data: new FormData($('#pelanggarupdate')[0]),
                url: "/datapelanggaransiswa/update/{{ $siswa[0]->id }}",
                type: "POST",
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data.success == true){
                        Swal.fire("Berhasil", "Data Pelanggaran berhasil diubah !", "success");

                        $('#pelanggarupdate').trigger('reset');
                        $('#updateBtn').disabled = false;
                        $('#updateBtn').html('Simpan');
                        location.href = "/datapelanggaransiswa/";
                    } else {
                        Swal.fire("Gagal !", "Data belum lengkap !", "error");
                        $('#updateBtn').disabled = false;
                        $('#updateBtn').html('Simpan');
                    }
                }
            });
        });
            
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
    @endpush