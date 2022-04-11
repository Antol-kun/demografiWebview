

<table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users" role="grid">
    <!--begin::Table head-->
    <thead>
    <th class="min-w-125px " tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 40.688px;">No</th>
    <th class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 151.047px;">Isi Komponen</th>
     <th  class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 90.047px; text-align: center">Bobot</th>
    <th  class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 90.047px; text-align: center">Action</th>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    @foreach($komponen as $data)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$data->nama_komponen}}</td>
            <td style="text-align: center;">{{$data->bobot}} %</td>
            <td style="text-align: center">
                <a href="javascript:void(0)" onclick="editKomponen('{{$data->bobot.'>'.$data->nip.'>'.$data->kode_mapel.'>'.$data->tahun.'>'.$data->semester.'>'.$data->idkelompokkls.'>'.$data->idkomponen.'>'.$data->nama_komponen.'>'.$data->id}}')" ><i class="fas fa-edit" style="color: blue" data-toggle="tooltip" data-placement="top" title="Ubah Komponen"></i></a>
                <a href="javascript:void(0)" style="color: red; padding-left:10px"><i style="color: red" data-toggle="tooltip" data-placement="bottom" title="Hapus Komponen" class="fas fa-trash"
                      onclick="
                          return Swal.fire({
                          title: 'Yakin ingin menghapus data?',
                          text: 'Data tidak akan muncul lagi',
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!'
                          }).then((result) => {
                          if (result.value) {
                          window.location.href =   '/manajemennilai/hapuskomponen/{{base64_encode($data->id)}}' 
                          }
                          })"></i></a>
                           </td>
        </tr>
    @endforeach

    </tbody>
</table>

    <!--begin::Modal - New Target-->
    <div class="modal fade" id="editKomponen" tabindex="-1" aria-hidden="true">
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
                        <h1 class="mb-3">Ubah Komponen <span id="titleeditkomponen"></span></h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Heading-->

                    <div class="row mb-5">
                        <!--begin::Col-->


                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-5 fw-bold mb-2">Presentase (%)</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="text" class="form-control form-control-solid" placeholder=""id="editbobot" name="editbobote "/>
                            <!--end::Select-->
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2" style="padding-top: 40px"><span id="totalpresentase2"></span>/100 %</label>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" id="editnamakomponen" name="editnamakomponen"/>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="nilaiawalkp" name="nilaiawalkp" hidden/>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="idkp" name="idkp" hidden/>
                            <!--end::Select-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" id="simpanubahkp" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->

                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->



<script>
    function editKomponen(id) {

        var idx = id.split('>')

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "/manajemennilai/cekeditkomponen",
            data: { id: id },
            dataType: 'json',
            success: function(response){

                // //   console.log(response)
                 $('#idkp').val(idx[8]);
                //
                // $('#titleeditkomponen').html(response[1].type);
                 $('#editbobot').val(idx[0]);
                 $('#editnamakomponen').val(idx[7]);
                 $('#totalpresentase2').html(response.totalbobot);
                //
                 var totalbobot = response.totalbobot
                 var bobotyangdipilih = idx[0]
                //
                 var xsum = totalbobot - bobotyangdipilih
                //
                 $('#nilaiawalkp').val(xsum);
                // jika bobot baru ditambah xsum hasilnya melebihi 100 maka tidak bisa update
                $('#editKomponen').modal('show');
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
    }
</script>


<script type="text/javascript">
    

    $('body').on('click', '#simpanubahkp', function () {

        var nilaiawal = $("#nilaiawalkp").val();
        var editbobot = $("#editbobot").val();
        var editnamakomponen = $("#editnamakomponen").val();

        var idkp = $("#idkp").val();



        $('#simpanubahkp').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


        if (editbobot == '' || editnamakomponen == ''){

            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Mohon Isi Bobot dan Nama Komponen !',

            });

            $('#simpanubahkp').html('Coba Lagi');

        }else {

            if ((Number(nilaiawal) + Number(editbobot)) > 100) {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Jumlah Bobot Presentase yang Anda Masukan Melebihi Kapasitas Presentase !',

                });

                // console.log(Number(bobot) > Number(sisabobot))

                $('#simpanubahkp').html('Coba Lagi');

            } else {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    url: "/manajemennilai/simpanubah/"+idkp,
                    data: {
                        editbobot: editbobot,
                        editnamakomponen: editnamakomponen
                    },
                    // dataType: 'json',
                    success: function (response) {

                        if (response == "success") {


                            $('#simpanubahkp').html('Simpan');
                            $('#editKomponen').modal('hide');

                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data komponen berhasil disimpan',

                            }).then (function() {
                                window.location.reload();

                            });


                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Tersimpan!',

                            });

                            $('#simpanubahkp').html('Coba Lagi');

                        }

                    },
                    error: function (response) {

                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Gagal Terhubung!',

                        });
                        $('#simpanubahkp').html('Coba Lagi');
                        console.log(response);
                    }
                });

            }

        }

    });

</script>
