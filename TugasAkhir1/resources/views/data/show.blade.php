@extends('layout.master')
@section('title', 'Halaman Detail')
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="h2 mr-auto">Biodata {{ $karyawan->nama }}</h1>
                <div class="float-right">
                    <a href="{{ route('karyawans.edit', ['karyawan' => $karyawan->id]) }}" class="btn btn-info mb-4"><i class='fas fa-edit'></i></a>
                    <form action="{{ route('karyawans.destroy', ['karyawan' => $karyawan->id]) }} " method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
        </div>
    </div>
</div>

  

  <br>
  <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <ul>
                        <li>Nama: {{ $karyawan->nama }}</li>
                        <li>Gender: {{ $karyawan->gender }}</li>
                        <li>No. Telepon: {{ $karyawan->no_tlp }}</li>
                        <li>Jabatan: {{ $karyawan->jabatan->nama_jabatan }}</li>
                        <li>Status: 
                            @if($karyawan->status->status_karyawan === 'Karyawan')
                            <div class="badge badge-primary">Karyawan</div>
                            @elseif($karyawan->status->status_karyawan === 'Magang')
                            <div class="badge badge-warning">Magang</div>
                            @else 
                            <div class="badge badge-success mt-3 ml-2">Kontrak</div>
                            @endif
                        </li>
                        <li>Pendidikan: {{ $karyawan->pendidikan->pendidikan_karyawan }}</li>
                        <li>Tanggal Lahir: {{ $karyawan->tgl_lahir }}</li>
                        <li>Umur: {{ $karyawan->umur }}</li>
                        <li>Alamat: {{ $karyawan->alamat }}</li>
                        <li>Tanggal Masuk: {{ $karyawan->tgl_masuk }}</li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>    


@endsection