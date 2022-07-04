<div class="d-flex align-items-center">
    <a href="{{route('demo_kinerja')}}" class="btn btn-sm {{request()->segment(3) == 'presensi' ? 'btn-primary' : ''}} me-3">Presensi</a>
    <a href="{{route('demo_kinerjam')}}" class="btn btn-sm {{request()->segment(3) == 'materi' ? 'btn-primary' : ''}} me-3">Materi</a>
    <a href="{{route('demo_kinerjat')}}" class="btn btn-sm {{request()->segment(3) == 'tugas' ? 'btn-primary' : ''}} me-3">Tugas</a>
    <a href="{{route('demo_kinerjaq')}}" class="btn btn-sm {{request()->segment(3) == 'quiz' ? 'btn-primary' : ''}} me-3">Quiz/Ujian Online</a>
    <a href="{{route('demo_kinerjabs')}}" class="btn btn-sm {{request()->segment(3) == 'banksoal' ? 'btn-primary' : ''}} me-3">Bank Soal</a>
    <a href="{{route('demo_kinerjabm')}}" class="btn btn-sm {{request()->segment(3) == 'bankmateri' ? 'btn-primary' : ''}} me-3">Bank Materi</a>
</div>