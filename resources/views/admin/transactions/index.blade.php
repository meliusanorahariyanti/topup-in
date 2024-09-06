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
      <a href="/admin/transaction/unpaid/export"
        class="btn waves-effect waves-light btn btn-danger pull-right hidden-sm-down text-white"> Export PDF (UNPAID)</a>
      <a href="/admin/transaction/paid/export"
        class="btn me-2 waves-effect waves-light btn btn-success pull-right hidden-sm-down text-white"> Export PDF (PAID)</a>
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
                  <th>TXID</th>
                  <th>Game Name</th>
                  <th>IDGameApp</th>
                  <th>Comments</th>
                  <th>Order Date</th>
                  <th>Updated By</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($arrays as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->credit->game->name }}</td>
                    <td>{{ $item->IDGameApp }}</td>
                    <td>{{ $item->comments }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>{{ ($item->user_id == null) ? 'NULL' : $item->user->name }}</td>
                    <td>Rp. {{ number_format($item->total) }}</td>
                    <td class="text-center">
                      @if ($item->status == 'unpaid')
                        <form action="/admin/transaction/{{ $item->id }}" method="post" onsubmit="return confirm('Apakah anda yakin TXID {{ $item->id }} telah dibayar?')">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger btn-sm">Bayar ?</button>
                        </form>
                      @else
                        <span class="btn btn-success btn-sm">Terbayar</span>
                      @endif
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