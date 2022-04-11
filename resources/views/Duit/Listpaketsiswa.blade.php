
<table id="cok"  class=" display table table-striped table-bordered nowrap" style="width:100%">
    <thead>
    <tr>
        <th style="text-align: center">No</th>
        <th>Nama Paket</th>
        <th>Status Pembayaran</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($isipaket as $data)
        <tr>
            <td style="text-align: center">
                {{$loop->index+1}}
            </td>
            <td>{{$data->nama_paket}}</td>
            <td>{{$data->status}}</td>
            <td><a href="javascript:void(0)"  onclick="
                    return Swal.fire({
                    title: 'Yakin ingin menghapus data?',
                    text: 'Data tidak akan muncul lagi',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                    if (result.value) {
                    window.location.href = '{{route('hapuspaketsiswa', ['id' => base64_encode($data->nisn.'-'.$data->id)])}}'
                    }
                    })"><span class="badge badge-danger">Hapus</span> </a></td>
        </tr>
    @endforeach
    </tbody>

</table>
