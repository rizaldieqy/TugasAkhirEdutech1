@extends('layout.master')
@section('title', 'Halaman Edit Pendidikan')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mr-5 text-center text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('pendidikans.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Pendidikan</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <hr>
                <form action="{{ route('pendidikans.update', $pendidikan) }}" method="POST" enctype="multipart/form-data" name="edit">
                    @method('PATCH')
                    @csrf
                    
                    <div class="form-group">
                      <label for="pendidikan_karyawan">Pendidikan</label>
                      <select name="pendidikan_karyawan" id="pendidikan_karyawan" class="form-control">
                          <option value="S2" {{ $pendidikan->pendidikan == 'S2' ? 'selected' : '' }}> S2 </option>
                          <option value="S1" {{ $pendidikan->pendidikan == 'S1' ? 'selected' : '' }}> S1 </option>
                          <option value="D3" {{ $pendidikan->pendidikan == 'D3' ? 'selected' : '' }}> D3 </option>
                          <option value="SMA/SMK" {{ $pendidikan->pendidikan == 'SMA/SMK' ? 'selected' : '' }}> SMA/SMK </option>
                        </select>
                        @error('pendidikan_karyawan')
                      <div class="alert alert-danger">{{$message}}</div>
                        @enderror 
                    </div>


                    <button type="submit"  class="btn-btn-primary mb-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

