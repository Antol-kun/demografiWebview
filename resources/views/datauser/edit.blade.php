{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<a href="{{ url('datauser') }}" class="btn btn-sm btn-primary">Kembali ke {{$testVariable}}</a>
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
                    Ubah {{ $testVariable }}
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
                            <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                            <div class="fs-6 text-gray-600">Pengguna agar memperhatikan seluruh <b class="text-danger">input/isian</b> yang disediakan!</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <!--end::Notice-->
                <!--begin::Input group-->
                <form name="kelasinput" id="kelasinput" method="post">
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pengguna</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="hidden" name="id" id="id" value="{{$datauser[0]->id}}"/>
                        <select class="form-control form-control-solid" id="pengguna" name="pengguna" required onchange="ambilUser(this)">
                            <option value="">Pilih Pengguna...</option>
                            <option value="{{$datauser[0]->username}}" selected>{{$datauser[0]->username}} - {{$datauser[0]->nama}}</option>
                            @foreach($dataguru as $guru)
                            <option value="{{$guru->Nip}}">{{$guru->Nip}} - {{$guru->Nama}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Username</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" required class="form-control form-control-solid" placeholder="" name="username" id="username" value="{{$datauser[0]->username}}" readonly />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Pengguna</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" required class="form-control form-control-solid" placeholder="" name="nama" id="nama" value="{{$datauser[0]->nama}}" readonly />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Email Pengguna</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" required class="form-control form-control-solid" placeholder="" name="email" id="email" value="{{$datauser[0]->email}}" readonly />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Password</label><font size="1pt">(Password di generate oleh sistem : 12345678)</font>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="password" required class="form-control form-control-solid" placeholder="" name="password" id="password" value="12345678" readonly />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pilih Role</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control form-control-solid" id="role" name="role" required>
                            <option value="">Pilih Role...</option>
                            <option value="{{$datauser[0]->idhakakses}}" selected>{{$datauser[0]->nama_akses}}</option>
                            @foreach($datahak as $data)
                            <option value="{{$data->idhakakses}}">{{$data->nama_akses}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    
                </div>


            </div>

            <div class="card-footer text-end">
                <button class="btn w-100 w-sm-auto btn-primary" id="saveBtn">
                    <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
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
            $('[name="role"]').select2()
            $('[name="pengguna"]').select2()

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Memproses Data...');
                document.getElementById("saveBtn").disabled = true;

                $.ajax({
                  data: $('#kelasinput').serialize(),
                  url: "/datauser/update",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                                            
                      console.log(data);
                      if(data.message == 'match'){
                        document.getElementById("saveBtn").disabled = false;
                        $('#saveBtn').html('Simpan');
                        Swal.fire("Gagal", "Data sudah di input !", "warning");
                      }else{
                        $('#kelasinput').trigger("reset");
                        document.getElementById("saveBtn").disabled = false;
                        $('#saveBtn').html('Simpan');                      
                        location.href = "/datauser/";
                        Swal.fire("Berhasil", "Data berhasil diubah", "success");
                      }
                      
                      
                  },
                  error: function (data) {
                      console.log('Error:', data);                      
                      $('#saveBtn').html('Simpan');
                      document.getElementById("saveBtn").disabled = false;
                      Swal.fire("Gagal", "Data gagal diubah !"+data, "error");
                  }
              });
            });
            
        })

        function ambilUser(nip){
            $.ajax({
            url: "/datauser/showuser/"+nip.value,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                console.log(data[0].Nip);
                document.getElementById('username').value = data[0].Nip;
                document.getElementById('nama').value = data[0].Nama;
                document.getElementById('email').value = data[0].Email;
                document.getElementById('password').value = '12345678';
            },
            error: function (data) {
                console.log(data);
                document.getElementById('username').value = '-';
                document.getElementById('nama').value = '-';
                document.getElementById('email').value = '-';
                document.getElementById('password').value = '';
            }
        });
        }

    </script>
@endpush
