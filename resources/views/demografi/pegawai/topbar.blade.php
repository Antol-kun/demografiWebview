<div class="d-flex align-items-center">
    <a href="{{route('demopegawai')}}" class="btn btn-sm {{request()->segment(3) == 'semua' ? 'btn-primary' : ''}} me-3">Umum</a>
    <a href="{{route('demopegawaijk')}}" class="btn btn-sm {{request()->segment(3) == 'jeniskelamin' ? 'btn-primary' : ''}} me-3">Jenis Kelamin</a>
    <a href="{{route('demopegawaip')}}" class="btn btn-sm {{request()->segment(3) == 'statuskepegawaian' ? 'btn-primary' : ''}} me-3">Status Kepegawaian</a>
    <a href="{{route('demopegawais')}}" class="btn btn-sm {{request()->segment(3) == 'sertifikasi' ? 'btn-primary' : ''}} me-3">Sertifikasi</a>
    <a href="{{route('demopegawaipd')}}" class="btn btn-sm {{request()->segment(3) == 'pendidikan' ? 'btn-primary' : ''}} me-3">Pendidikan</a>
    <a href="{{route('demopegawaim')}}" class="btn btn-sm {{request()->segment(3) == 'marital' ? 'btn-primary' : ''}} me-3">Status Marital</a>
</div>