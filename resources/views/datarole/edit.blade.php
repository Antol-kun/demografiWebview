{{-- INI KITA EXTENDS ROOT VIEW YANG ADA DI FOLDER resources\views\layouts\template.blade.php --}}
@extends('layouts.template')
@push('lib-css')
@endpush
@push('css')
@endpush

@section('sub_header_action')
  {{ csrf_field() }}
<div class="me-4">
    <!--begin::Menu-->
        <a href="/datarole" class="btn btn-sm btn-flex btn-info fw-bolder">Kembali ke {{$testVariable3}}</a>
</div>
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
                        
            <div class="card-body pt-0">
               <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Role Deskripsi</label>
                        <!--end::Label-->
                        <!--end::Input-->
                         <select class="form-control form-control-solid" name="akses" id="akses" onchange="isi(this)" disabled>
                            <option value="">Pilih Role Deskripsi</option>
                            <option value="{{$dataakses[0]->role_deskripsi}}" selected>{{$dataakses[0]->nama_akses}}</option>
                            @foreach($hakakses as $akses)
                            <option value="{{$akses->idhakakses}}">{{$akses->nama_akses}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                                
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
                    <button type="button" class="btn btn-sm btn-primary" style="position: absolute; right: 30px;" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Tambah Fitur</button>                    
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
                            <h4 class="text-gray-800 fw-bolder">Tabel Fitur</h4>
                            <div class="fs-6 text-gray-600">Setting fitur aplikasi sesuai hak akses dan role pengguna</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->

                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                    <table class="display table table-striped table-bordered nowrap dataTable no-footer" id="tabeldata" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.25px;">#</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">Nama Fitur</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 30.25px;">Aksi</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @php $no=1; @endphp       
                            @foreach($editfitur as $fitur) 
                            <tr class="odd">                           
                                <td>{{$no++}}</td>
                                <td class="d-flex align-items-center">{{$fitur->nama_fitur}}</td>
                                <td>
                                    <a href="javascript:void(0)" class="tfitur" onclick="konfirmasi({{$fitur->role_deskripsi}} , {{$fitur->idfitur}})"><span class="badge badge-danger">Hapus Fitur</span></a>
                                </td>
                            </tr>                          
                            @endforeach                        
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        </div>
                    

            </div>

        </div>
        <!--end::Card-->

        <!--begin::Modal - Create App-->
        <div class="modal fade" id="kt_modal_create_app" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <form name="kelasinput" id="kelasinput" method="post" action="/datarole/update">
                        {{ csrf_field() }}
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Tabel Fitur</h2>
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
                        <button type="submit" class="btn btn-sm btn-primary" style="position: absolute; right: 30px;" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Simpan Fitur</button>
                        <br/><br/>
                        <input type="hidden" name="idhak" id="idhak"/>
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 29.25px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                    </div>
                                </th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 235.688px;">Nama Fitur</th>
                                </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                            @foreach($datafitur as $fitur)
                            <tr class="odd">
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="id[]" value="{{$fitur->idfitur}}">
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <td class="d-flex align-items-center">{{$fitur->nama_fitur}}</td>
                            </tr>                          
                            @endforeach                         
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Actions-->
                                    </form>
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
            var hak = document.getElementById('idhak');
            var akses = document.getElementById('akses');
            hak.value = akses.value;
        });

        $(function () {
            $('[name="pengguna"]').select2()
            $('[name="akses"]').select2()
        })

        function isi(key){
            var hak = document.getElementById('idhak');
            hak.value = key.value;
        }

    $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

    function konfirmasi(hak, fitur){
            Swal.fire({
                title: "Perhatian !",
                text: "Anda yakin akan menghapus data berikut ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus !",
                cancelButtonText: "Tidak",
                reverseButtons: true
            }).then(function(result) {
                // console.log('Data:'+hak+' - '+fitur);
                if (result.value) {
                    $.ajax({
                      url: "/datarole/hapusfitur/"+hak+"/"+fitur,
                      type: "GET",
                      dataType: 'json',
                      success: function (data) {
                        location.reload();
                         Swal.fire("Berhasil", "Data berhasil dihapus", "success");                       
                      },
                      error: function (data) {
                          console.log('Error:', data);                      
                          Swal.fire("Gagal", "Data gagal dihapus !", "error");
                      }                 
                    });
                }
            });
        }

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
            
            
    </script>
@endpush