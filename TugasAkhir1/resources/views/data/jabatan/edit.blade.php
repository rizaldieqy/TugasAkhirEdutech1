@extends('layout.master')
@section('title', 'Halaman Edit Jabatan')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mr-5 text-center text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('jabatans.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Jabatan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
                <form action="{{ route('jabatans.update', $jabatan) }}" method="POST" enctype="multipart/form-data" name="edit">
                    @method('PATCH')
                    @csrf
                    
                    <div class="form-group">
                        <label for="nama_jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan') is invalid @enderror" id="nama_jabatan" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}">
                        @error('nama_jabatan')
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

