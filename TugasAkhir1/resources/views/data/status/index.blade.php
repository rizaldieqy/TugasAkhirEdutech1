@extends('layout.master')
@section('title', 'Data Status')
@section('dataStatus','active')
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

<div>
    <a href="{{ route('statuses.create') }}" class="btn btn-success mt-4 ml-2"><i class='fas fa-plus'></i> Tambah Data</a>
</div>
<br>
@if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
@endif
<br>
<table id="example" class="cell-border" style="width:100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($status as $tampil)
        <tr>
            <td>{{ $loop->iteration }}</td>
            @if($tampil->status_karyawan === 'Karyawan')
            <td class="badge badge-primary mt-5 ml-4">Karyawan</td>
            @elseif($tampil->status_karyawan === 'Magang')
            <td class="badge badge-warning mt-5 ml-4">Magang</td>
            @else 
            <td class="badge badge-success mt-5 ml-4">Kontrak</td>
            @endif
            <td><a href="{{ route('statuses.edit', ['status' => $tampil->id]) }}" class="btn btn-info"><i class='fas fa-edit'></i></a><br><br>
                <form action="{{ route('statuses.destroy', ['status' => $tampil->id]) }} " method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>





@endsection