{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ route('kehadiran.index') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
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
                            <div class="fs-6 text-gray-600">Pastikan data diisi dengan <b class="text-danger">benar.</b></div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                <form name="kehadiranupdate" id="kehadiranupdate" action="#" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>
                                    <div
                                        style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left">
                                        <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                                            Form Kehadiran :
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
                                        <select name="nisn" id="nisn" class="form-select form-select-solid" value="{{ $izin[0]->nisn }}">
                                            @php
                                                $select_nisn = $izin[0]->nisn;
                                            @endphp
                                            @foreach ($list_siswa as $nama_siswa => $nisn)
                                                @if ($nisn == $select_nisn)
                                                    <option value="{{ $select_nisn }}" selected>{{ $nisn ." - ". $nama_siswa }}</option>
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
                                        <label class="required fs-5 fw-bold mb-2">Keterangan</label>
                                        <!--end::Label-->
                                        <!--end::Input-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="keterangan" required id="keterangan" autocomplete="off"
                                            required value="{{ $izin[0]->keterangan }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Tanggal Mulai</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" placeholder=""
                                            name="tgl_mulai" required id="tgl_mulai" autocomplete="off"
                                            required value="{{ $izin[0]->tgl_mulai }}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">Tanggal Selesai</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" placeholder=""
                                            name="tgl_selesai" required id="tgl_selesai" autocomplete="off"
                                            required value="{{ $izin[0]->tgl_selesai}}"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="card-footer text-end">
                        <button type="submit" class="btn w-100 w-sm-auto btn-primary" id="saveBtn">
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
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // insert data using ajax
            $('#saveBtn').click(function(e){
                e.preventDefault();

                $(this).html('Memproses Data...');
                $('#saveBtn').disabled = true;

                $.ajax({
                    // data: $('#pelanggarinput').serialize(),
                    data: new FormData($('#kehadiranupdate')[0]),
                    url: "{{ route('kehadiran.update', base64_encode($izin[0]->idizin)) }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data){
                        if(data.success == true){
                            Swal.fire("Berhasil", "Data Pelanggaran berhasil diperbarui !", "success");

                            $('#kehadiranupdate').trigger('reset');
                            $('#saveBtn').disabled = false;
                            $('#saveBtn').html('Simpan');
                            location.href = "{{ route('kehadiran.index') }}";
                        } else {
                            Swal.fire("Gagal !", "Data belum lengkap !", "error");
                            $('#saveBtn').disabled = false;
                            $('#saveBtn').html('Simpan');
                        }
                    }
                });
            });
        </script>
    @endpush