@extends('layout')

@section('content')
  <h2>
    @if (isset($guru))
      Ubah
    @else
      Tambah
    @endif
    Data Guru</h2>
  <form method="post">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <table class="table">
      <tr>
        <td width="200">Nama</td>
        <td width="1">:</td>
        <td><input type="text" name="nama" value="@if(isset($guru)) {{ $guru->nama }} @endif " class="form-control"></td>
      </tr>
      <tr>
        <td>Mata Pelajaran</td>
        <td>:</td>
        <td><input type="text" name="mata_pelajaran" value="@if(isset($guru)) {{ $guru->mata_pelajaran }} @endif " class="form-control"></td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>
          <select name="kelas" class="form-control">
            @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><button type="submit" class="btn btn-success">Simpan</button></td>
      </tr>
    </table>
  </form>
@endsection