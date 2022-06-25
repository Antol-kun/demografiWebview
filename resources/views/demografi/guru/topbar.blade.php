<div class="d-flex align-items-center">
    <a href="{{route('demoguru')}}" class="btn btn-sm {{request()->segment(3) == 'semua' ? 'btn-primary' : ''}} me-3">Umum</a>
    <a href="{{route('demogurujk')}}" class="btn btn-sm {{request()->segment(3) == 'jeniskelamin' ? 'btn-primary' : ''}} me-3">Jenis Kelamin</a>
    <a href="{{route('demogurup')}}" class="btn btn-sm {{request()->segment(3) == 'pegawai' ? 'btn-primary' : ''}} me-3">Status Kepegawaian</a>
    <a href="{{route('demogurus')}}" class="btn btn-sm {{request()->segment(3) == 'sertifikasi' ? 'btn-primary' : ''}} me-3">Sertifikasi</a>
    <a href="{{route('demogurupd')}}" class="btn btn-sm {{request()->segment(3) == 'pendidikan' ? 'btn-primary' : ''}} me-3">Pendidikan</a>
    <a href="{{route('demogurum')}}" class="btn btn-sm {{request()->segment(3) == 'marital' ? 'btn-primary' : ''}} me-3">Status Marital</a>
</div>