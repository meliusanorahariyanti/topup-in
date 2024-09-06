@extends('admin.layouts.main')


@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">Table {{ $title }}</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </div>
    <div class="col-md-7 align-self-center">
      <a href="/admin/gametype/create"
        class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Tambah Data</a>
    </div>
  </div>
  
  <div class="row">
    <!-- column -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Table {{ $title }}</h4>
          <h6 class="card-subtitle">Add class <code>.table</code></h6>

          @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
          @if(session('danger'))
            <div class="alert alert-danger">
              {{session('danger')}}
            </div>
          @endif

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>User Count</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($arrays as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->game->count() }}</td>
                    <td>
                      <form action="/admin/gametype/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah anda yakin akan mengahpus data?')">
                        @csrf
                        @method('DELETE')
                        <a href="/admin/gametype/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>

                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection