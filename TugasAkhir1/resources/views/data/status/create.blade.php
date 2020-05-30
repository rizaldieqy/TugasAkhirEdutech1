@extends('layout.master')
@section('title', 'Input Data Status')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="mr-5 text-center text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('statuses.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Data Status</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <form action="{{ route('status.store') }}" method="POST">
                @csrf
               
                <div class="form-group">
                  <label for="status_karyawan">Status</label>
                  <select name="status_karyawan" id="status_karyawan" class="form-control">
                    <option value="Karyawan" {{ old('status_karyawan') == 'Karyawan' ? 'selected' : '' }}> Karyawan </option>
                    <option value="Kontrak" {{ old('status_karyawan') == 'Kontrak' ? 'selected' : '' }}> Kontrak </option>
                    <option value="Magang" {{ old('status_karyawan') == 'Magang' ? 'selected' : '' }}> Magang </option>
                  </select>
                @error('status_karyawan')
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