@extends('layout')

@section('content')
<h1>Website</h1>
<h4 class="text-center mb-2">Guru</h4>
<a href="{{ url('form') }}" class="btn btn-primary mb-2"> Tambah Data </a>
<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>
    @foreach ($gurus as $guru)
        <tr>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->mata_pelajaran }}</td>
            <td>{{ $guru->kelas->nama_kelas }}</td>
            <td>
                <a href="{{ url('ubah/' .$guru->id) }}" class="btn btn-secondary">Ubah </a>
                <a href="{{ url('deleteGuru/' .$guru->id) }}" class="btn btn-danger" on>Hapus </a>
            </td>
        </tr>
    @endforeach
</table>

<h4 class="text-center mb-2">Siswa</h4>
<table class="table table-bordered">
    <tr>
        <th>Kelas</th>
        <th>Nama</th>
    </tr>
    @foreach ($kelass as $kelas)
        <tr>
            <td>{{ $kelas->nama_kelas }}</td>
            <td>
                @foreach ($kelas->siswa as $siswa)
                    <div>- {{ $siswa->nama }}</div>
                @endforeach
            </td>
        </tr>
    @endforeach
</table>

@endsection()
