{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')

@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Card-->
        {{--LANGSUNG GUNAKAN NAMA VARIABLE YANG TELAH DIMASUKKAN KE ARRAY ELEMEN DI CONTROLLER PEMANGGIL SEBELUMNYA(HOMECONTROLLER::example()) --}}


<div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img class="gambarLogo3" src="http://edsy.ubl.ac.id/pasfoto/guru/no-image.png" alt="image" />
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1" style="padding-top: 50px">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{Auth::user()->nama}}</a>
                                <a href="#">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                            <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                            <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                           </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                        </svg>
                                    </span>
                                    {{Auth::user()->username}}</a>

                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                    </div>
                    <!--end::Title-->

                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ (request()->segment(2) == 'profil_admin') ? 'active' : '' }}" href="{{route('profile_adm', ['id' => base64_encode(Auth::user()->username)])}}">Profil</a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ (request()->segment(2) == 'password') ? 'active' : '' }}" href="{{route('password_adm', ['id' => base64_encode(Auth::user()->username)])}}">Kata Sandi</a>
                </li>
                <!--end::Nav item-->

                <!--end::Nav item-->
            </ul>
           
            <!--begin::Navs-->
        </div>
    </div>



	<div class="card">
     

        <div class="card-body pt-0">
            <!--begin::Notice-->
            <!--begin::Notice-->
            <br />
            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"/>
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"/>
																</svg>
															</span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1">
                    <!--begin::Content-->
                    <div class="fw-bold">
                        <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                        <div class="fs-6 text-gray-600">Pastikan Anda Mengingat Kata Sandi Baru yang Anda Ubah!</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
            <!--end::Notice-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kata Sandi Lama</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" id="passlama"  name="passlama"/>

                    <!--end::Input-->
                </div>
                <!--end::Col-->

            </div>
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kata Sandi Baru</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" id="passbaru" name="passbaru"/>

                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Konfirmasi Kata Sandi Baru</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" name="verpassbaru" id="verpassbaru"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>


        </div>

        <div class="card-footer text-end">
            <button class="btn w-100 w-sm-auto btn-primary" id="rpass" onclick="savepassword()">
                    <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                        </g>
                    </svg></span>
                Simpan</button>
        </div>

    </div>



    </div>

    <!--end::Container-->

</div>

<script>
        function savepassword() {

            var passlama = $("#passlama").val();
            var passbaru = $("#passbaru").val();
            var verpassbaru = $("#verpassbaru").val();

            $('#rpass').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


            if (passlama == '' || passbaru == '' || verpassbaru == ''){

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Mohon Isi Form Password yang Kosong !',

                });

                $('#rpass').html('Coba Lagi');

            }else if(passbaru != verpassbaru){

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Baru Tidak Sama !',

                });

                $('#rpass').html('Coba Lagi');

            }else{

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{route('updatepass')}}",
                    data: {
                        passlama: passlama,
                        passbaru: passbaru,
                        verifikasi: verpassbaru
                    },
                    // dataType: 'json',
                    success: function (response) {

                       // console.log(response)
                        if (response == "success") {

                            $("#passlama").val('');
                            $("#passbaru").val('');
                            $("#verpassbaru").val('');

                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Password Baru Berhasil Disimpan',

                            });



                            $('#rpass').html('Coba Lagi');

                        } else if (response == 'salah') {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Tersimpan, Password Lama yang Anda Masukan Salah !',

                            });

                            $('#rpass').html('Coba Lagi');

                        }else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Password Gagal Tersimpan!',

                            });

                            $('#rpass').html('Coba Lagi');
                        }

                    },
                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Gagal Terhubung!',

                        });
                        $('#rpass').html('Coba Lagi');
                        console.log(response);
                    }
                });


            }

        }
    </script> 



@endsection

@push('lib-js')
 
@endpush
@push('js')
@endpush
