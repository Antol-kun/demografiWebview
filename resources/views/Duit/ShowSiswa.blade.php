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
        <th class="min-w-125px" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  style="width: 100.688px;">NISN Siswa</th>
        <th class="min-w-125px " tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  style="width: 250.047px;">Nama Siswa</th>
        <th class="min-w-125px " tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  style="width: 250.047px;">List Paket Siswa</th>
        <th class="min-w-125px " tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  style="width: 250.047px;">Tampilkan Paket Siswa</th>

    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="text-gray-600 fw-bold">
    @foreach($listSiswa as $data)
        <tr class="odd">

            <!--begin::Checkbox-->
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" name="nisn[]" id="nisn[]" value="{{$data['nisn']}}">
                </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">

                <!--begin::User details-->
                <div class="d-flex flex-column">
                   {{$data['nisn']}}
                </div>
                <!--begin::User details-->
            </td>
            <!--end::User=-->

            <!--begin::Last login=-->
            <!--begin::Last login=-->
            <td>{{$data['nama_siswa']}}</td>
            <td> @foreach($data['paket'] as $pk)
                     @if($pk->status == 'Belum Lunas')
                        <span class="badge badge-danger">{{$pk->nama_paket}}</span>
                     @else
                       <span class="badge badge-success">{{$pk->nama_paket}}</span>
                     @endif
                @endforeach
            </td>
            <td><a href="#" onclick="showList('{{base64_encode($data['nisn'])}}')"><span class="badge badge-warning">Tampilkan</span> </a></td>
            <!--end::Last login=-->
        </tr>
    @endforeach

    </tbody>
    <!--end::Table body-->
</table>

<div class="modal fade" id="mlistpaket" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">

            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div id="listpaket">

                </div>


            </div>
        </div>
    </div>
</div>

<script>
    function showList(val) {

        $('#listpaket').load('/keuangan/listpaketsiswa/'+val)
        $('#mlistpaket').modal('show')



    }
</script>
