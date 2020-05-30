@extends('layout.master')
@section('title', 'Data Karyawan')
@section('dataKaryawan','active')
@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mr-5 text-center text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('karyawans.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Karyawan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
<div>
    <a href="{{ route('karyawans.create') }}" class="btn btn-success mt-4 ml-2"><i class='fas fa-plus'></i> Tambah Data</a>
</div>
<br>
@if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
@endif

<br>
<table class="table table-striped display responsive nowrap" style="width:100%" id="example">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>No.Telepon</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Pendidikan</th>
            <th>Tanggal Lahir</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $tampil)
        <tr>
            <td><a href="/karyawans/ {{ $tampil->id }}">{{ $loop->iteration }}</td>
            <td>{{ $tampil->nama }}</td>
            <td>{{ $tampil->gender }}</td>
            <td>{{ $tampil->no_tlp }}</td>
            <td>{{ $tampil->jabatan->nama_jabatan }}</td>
            <td>{{ $tampil->status->status_karyawan }}</td>
            <td>{{ $tampil->pendidikan->pendidikan_karyawan }}</td>
            <td>{{ $tampil->tgl_lahir }}</td>
            <td>{{ $tampil->umur }}</td>
            <td>{{ $tampil->alamat }}</td>
            <td>{{ $tampil->tgl_masuk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>





@endsection