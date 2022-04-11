{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
<form name="kelasinput" id="kelasinput" method="post" action="/datarole/store">
  {{ csrf_field() }}
<div class="me-4">
    <!--begin::Menu-->
        <a href="{{ url('/databobotkomponennilai') }}" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
</div>
@endsection

@php
        $code = base64_decode(request()->segment(3));
         $id =  $params = explode('>', $code);
    @endphp

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
                    {{ $testVariable }} | Kelas {{ $id[6] }} - Mapel : {{ $id[5] }}
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body pt-0">
               
               <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
            <!--begin::Table head-->
            <thead>
            <th class="min-w-125px " tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 40.688px;">No</th>
            <th class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Nama Komponen</th>
            <th  class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 90.047px; text-align: center">Action</th>
            </thead>
            <tbody class="text-gray-600 fw-bold">
                @foreach($komponen as $data)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$data->nama_komponen}}</td>
                        <td>
                            <a href="javascript:void(0)" class="tkomponen" data-id="{{base64_encode($data->idkompnilai.'>'.$data->nama_komponen.'>'.$code)}}"><span class="badge badge-primary">Tambah Isi Komponen</span></a>
                            <a href="javascript:void(0)" onclick="ModalKomponen('{{base64_encode($data->idkompnilai.'>'.$data->nama_komponen.'>'.$code)}}')" ><span class="badge badge-warning">Lihat Isi Komponen</span></a>

                        </td>
                    </tr>

                    <!--begin::Modal - New Target-->
    <div class="modal fade" id="inputpengetahuan" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
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
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->

                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Komponen <span id="typekomponen"></span></h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Input Komponen Nilai <span id="typekomponen2"></span>.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <form id="formKomponen" action="{{route('simpankomponen')}}">
                       
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Nama Kelompok Kelas</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" readonly class="form-control form-control-solid" placeholder="" value="{{ $id[6] }}" id="kpkelompokkelas" name="kpkelompokkelas"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Nama Mapel</label>
                            <!--begin::Select-->
                            <input type="text"readonly class="form-control form-control-solid" placeholder="" value="{{$id[5]}}" id="kpmapel" name="kpmapel"/>
                            <!--end::Select-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <!--end::Label-->
                            <label class="required fs-5 fw-bold mb-2">Tahun Ajaran / Semester</label>
                            <!--begin::Select-->
                            <input type="text" readonly class="form-control form-control-solid" placeholder="" value="{{$id[2]}} {{$id[3]}}" id="kptasemester" name="kptasemester"/>
                            <input type="text" class="form-control form-control-solid" placeholder=""id="paramsnya" name="paramsnya" hidden />
                            <input type="text" class="form-control form-control-solid" placeholder=""id="sisabobot" name="sisabobot" hidden/>
                            <!--end::Select-->
                        </div>
                    </div>
                    <!--end::Col-->
                    <div class="row mb-5">
                        <!--begin::Col-->


                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Presentase (%)</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="number" class="form-control form-control-solid" placeholder=""id="bobot" value="" name="bobot"/>
                            <!--end::Select-->
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2" style="padding-top: 40px"><span id="totalpresentase"></span>/100 Tersisa <span id="sisapresentase"></span>%</label>
                        </div>
                        <!--end::Col-->

                    </div>
                    <div class="row mb-5">
                        <!--begin::Col-->


                        <div class="col-md-12 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Nama Komponen Nilai</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="text" class="form-control form-control-solid" placeholder="" id="namakomponen" name="namakomponen"/>
                            <!--end::Select-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <div style="padding-top: 20px; padding-bottom: 20px;">
                        <hr />
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="form-check form-check-custom form-check-solid me-10">
                                <input class="form-check-input h-20px w-20px" type="checkbox" onclick="showkelaslaen()"  id="komponenlaen"  name="komponenlaen" value="Mantap" />
                                <span class="form-check-label fw-bold">Ingin Komponen Ini Diterapkan Dikelas Anda yang Lain?</span>
                            </label>
                        </div>
                    </div>
                    <div id="div_kelaslaen" hidden class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <div class="d-flex align-items-center">
                                <!--begin::Checkbox-->
                                @foreach($mapel as $data)
                                    @if($data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas." ".$data -> Namamapel != $id[6]." ".$id[5])

                                        <label class="form-check form-check-custom form-check-solid me-10">
                                            <input class="form-check-input h-20px w-20px kelaslaenc" type="checkbox" id="kelaslaen"  name="kelaslaen[]" value="{{$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls}}" />
                                            <span class="form-check-label fw-bold">{{$data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas.' - Mapel: '.$data -> Namamapel}}</span>
                                        </label>
                                    @endif
                                 @endforeach
                            <!--end::Checkbox-->
                            </div>
                        </div>
                    </div>
                    <div id="div_kelaslaen2" hidden style="padding-top: 20px; padding-bottom: 20px;">
                        <hr />
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="simpankp" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

    <!--end::Modal - New Target-->
    
                @endforeach
            </tbody>
        </table>
            </div>
            <!--end::Table-->

            </div>

        </div>
        <!--end::Card-->

        
    </div>
    <!--end::Container-->
</div>



  <!--begin::Modal - New Target-->
    <div class="modal fade" id="modalKomponen" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
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
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">

                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Komponen <span id="namaKomponen"></span></h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">Daftar Komponen Nilai <span id="namaKomponen2"></span>.</div>
                        <!--end::Description-->
                    </div>

                    <div id="isinilaikomponen">

                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

@push('lib-js')
@endpush
@push('js')
    <script>



   $('body').on('click', '.tkomponen', function () {
        var id = $(this).data('id');

        var ids = atob(id)
        var idx = ids.split('>')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "/manajemennilai/cekbobot",
            data: { id: id },
          //  dataType: 'json',
            success: function(response){

              //  console.log(response.totalbobot)
                $('#typekomponen').html(idx[1]);
                $('#typekomponen2').html(idx[1]);
                $('#totalpresentase').html(response.totalbobot);
                $('#sisapresentase').html(100 - response.totalbobot);
                $('#inputpengetahuan').modal('show');

                if (response.totalbobot >= 100){

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Jumlah Presentase Komponen Sudah Melebihi 100%',

                    }).then (function() {
                        $('#inputpengetahuan').modal('hide');
                    });
                }else {

                    $('#kpmapel').val(idx[7]);
                    $('#kpkelompokkelas').val(idx[8]);
                    $('#kptasemester').val(idx[4]+" "+ idx[5]);
                    $('#paramsnya').val(idx[2]+">"+idx[3]+">"+idx[4]+">"+idx[5]+">"+idx[6]+">"+idx[0]);

                    $('#sisabobot').val(100 - response.totalbobot);
                }

            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });

    });




 $('body').on('click', '#simpankp', function () {

        var paramsnya = $("#paramsnya").val();
        var bobot = $("#bobot").val();
        var namakomponen = $("#namakomponen").val();

        var sisabobot = $("#sisabobot").val();
 
          var kelaslaen = [];
          $(".kelaslaenc").each(function(){
              if ($(this).is(":checked")) {
                  kelaslaen.push($(this).val());
              }
          });
       // if(e.target.getAttribute('name')=="komponenlaen")
       //      var type = e.target.value

//        console.log(kelaslaen)

        $('#simpankp').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


        if (namakomponen == '' || bobot == ''){

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Mohon Isi Bobot dan Nama Komponen !',

            });

            $('#simpankp').html('Coba Lagi');

        }else {

            if (Number(bobot) > Number(sisabobot)) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Jumlah Bobot Presentase yang Anda Masukan Melebihi Kapasitas Presentase !',

                });

                // console.log(Number(bobot) > Number(sisabobot))

                $('#simpankp').html('Coba Lagi');

            } else {
                var $this           = $(this); //submit button selector using ID
                var $caption        = $this.html();// We store the html content of the submit button
                var form            = "#formKomponen"; //defined the #form ID
                var formData        = $(form).serializeArray(); //serialize the form into array
                var route           = $(form).attr('action'); //get the route using attribute action
//console.log(formData)

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: route, // get the route value
                   // data: formData,
                    data: 
                    {
                            "paramsnya":paramsnya,
                            "namakomponen": namakomponen,
                            "bobot":bobot,
                            "kelaslaen":kelaslaen,
                    },
                    // dataType: 'json',

                    
                    success: function (response) {

                      console.log(response)
                        if (response == "success") {


                            $('#simpankp').html('Simpan');

                            $("#bobot").val('');
                            $("#namakomponen").val('');

                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data komponen berhasil disimpan',

                            });

                            $('#inputpengetahuan').modal('hide');

                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Tersimpan!',

                            });

                            $('#simpankp').html('Coba Lagi');

                        }

                    },
                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Gagal Terhubung!',

                        });
                        $('#simpankp').html('Coba Lagi');
                        console.log(response);
                    }
                });

            }

        }

    });




        /*$(document).ready(function () {
        })*/
        $(function () {
            $('[name="pengguna"]').select2()
            $('[name="akses"]').select2()
        })

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            // $('#btnSimpan').click(function (e) {
            //     e.preventDefault();
            //     $(this).html('Memproses Data...');
            //     //document.getElementById("btnSimpan").disabled = true;

            //     var pengguna = $("#pengguna").val();
            //     var akses = $("#akses").val();

            //     var arr=[];
            //     $("input:checkbox[name*=id]:checked").each(function(){
            //          //arr.push($(this).val());
            //          arr.push({
            //             'cek': $(this).val(),
            //             'pub': 'Y'
            //          });
            //     });

                // for (var y=0; y<arr.length; y++)
                // {
                //   //console.log(arr[y].cek);
                //     $.ajax({
                //       data: {pengguna: pengguna, akses: akses, fitur: arr[y].cek, status:arr[y].pub},
                //       url: "/datarole/store",
                //       type: "POST",
                //       dataType: 'json',
                //       success: function (data) {
                //           $('#kelasinput').trigger("reset");
                //           document.getElementById("btnSimpan").disabled = false;
                //           $('#btnSimpan').html('Simpan');
                //           location.href = "/datarole/";
                //           // console.log(data);
                //       },
                //       error: function (data) {
                //           console.log('Error:', data);
                //           $('#btnSimpan').html('Simpan');
                //           document.getElementById("btnSimpan").disabled = false;
                //       }
                //   });
                // }

                

                
            // });

    function ModalKomponen(id) {
        console.log(id);

        var ids = atob(id)
        var idx = ids.split('>')

        $('#namaKomponen').html(idx[1]);
        $('#namaKomponen2').html(idx[1]);
         $('#isinilaikomponen').load('/manajemennilai/viewnilaikomponen/'+id);

        $('#modalKomponen').modal('show');

        

    }

    function showkelaslaen() {

        var checkfile = document.getElementById("komponenlaen");
        if (checkfile.checked == true){
            $('#div_kelaslaen').prop("hidden", false);
            $('#div_kelaslaen2').prop("hidden", false);
        }else {
            $('#div_kelaslaen').prop("hidden", true);
            $('#div_kelaslaen2').prop("hidden", true);
        }

    }
            
            
    </script>
@endpush