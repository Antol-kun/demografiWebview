<div class="d-flex align-items-center">
    <a href="{{route('demosiswa')}}" class="btn btn-sm {{request()->segment(3) == 'semua' ? 'btn-primary' : ''}} me-3">Umum</a>
    <a href="{{route('demosiswatk')}}" class="btn btn-sm {{request()->segment(3) == 'tingkatkelas' ? 'btn-primary' : ''}} me-3">Tingkat Kelas</a>
    <a href="{{route('demosiswatm')}}" class="btn btn-sm {{request()->segment(3) == 'tahunmasuk' ? 'btn-primary' : ''}} me-3">Tahun Masuk</a>
    <a href="{{route('demosiswajk')}}" class="btn btn-sm {{request()->segment(3) == 'jeniskelamin' ? 'btn-primary' : ''}} me-3">Jenis Kelamin</a>
    <a href="{{route('demosiswaa')}}" class="btn btn-sm {{request()->segment(3) == 'agama' ? 'btn-primary' : ''}} me-3">Agama</a>
    <a href="{{route('demosiswass')}}" class="btn btn-sm {{request()->segment(3) == 'statussiswa' ? 'btn-primary' : ''}} me-3">Status Siswa</a>
</div>