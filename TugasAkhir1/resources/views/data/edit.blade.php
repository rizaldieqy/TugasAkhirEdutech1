@extends('layout.master')
@section('title', 'Data Karyawan')
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



<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <form action="{{ route('karyawans.update', $karyawan) }}" method="POST" enctype="multipart/form-data" name="edit">
                @method('PATCH')
                @csrf
               
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is invalid @enderror" id="nama" name="nama" value="{{ $karyawan->nama }}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="gender">Gender</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="laki-laki" value="Laki-Laki" {{ $karyawan->gender == 'Laki-Laki' ? 'checked' : '' }}>
                    <label for="laki-laki" class="form-check-input">Laki-Laki</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" id="perempuan" value="Perempuan" {{ $karyawan->gender == 'Perempuan' ? 'checked' : '' }}>
                    <label for="perempuan" class="form-check-input">Perempuan</label>
                </div>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <br>
                <br>

                
                <div class="form-group">
                    <label for="no_tlp">No. Telepon</label>
                    <input type="text" class="form-control @error('no_tlp') is invalid @enderror" id="no_tlp" name="no_tlp" value="{{ $karyawan->no_tlp }}">
                    @error('no_tlp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                


                <div class="form-group">
                    <label for="jabatan_id">Jabatan</label>
                    <select name="jabatan_id" id="jabatan_id" class="form-control">
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == "$jabatan->nama_jabatan" ? 'selected' : '' }}>{{ $jabatan->nama_jabatan }}</option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            

                <div class="form-group">
                    <label for="status_id">Status</label>
                    <select name="status_id" id="status_id" class="form-control">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status_id') == "$status->status_karyawan" ? 'selected' : '' }}>{{ $status->status_karyawan }}</option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="pendidikan_id">Pendidikan</label>
                    <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                        @foreach ($pendidikans as $pendidikan)
                            <option value="{{ $pendidikan->id }}" {{ old('pendidikan_id') == "$pendidikan->pendidikan_karyawan" ? 'selected' : '' }}>{{ $pendidikan->pendidikan_karyawan }}</option>
                        @endforeach
                    </select>
                    @error('pendidikan_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $karyawan->tgl_lahir }}">
                    @error('tgl_lahir')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control @error('umur') is invalid @enderror" id="umur" name="umur" value="{{ $karyawan->umur }}">
                    @error('umur')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $karyawan->alamat }}</textarea>
                </div>


                <div class="form-group">
                    <label for="tgl_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tgl_masuk') is invalid @enderror" id="tgl_masuk" name="tgl_masuk" value="{{ $karyawan->tgl_masuk }}">
                    @error('tgl_masuk')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"  class="btn-btn-primary mb-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection