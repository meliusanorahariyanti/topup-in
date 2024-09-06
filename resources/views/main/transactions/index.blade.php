@extends('main.layouts.app')

@section('content')
<div class="p-2"></div>
<div class="row m-md-1">
  <h4 style="font-size: 12pt" class="fw-normal mb-3 float-start">{{ $title }}</h4>

  <div class="col-md-3"></div>

  <div class="col-md-6">
    <div class="card w-100 border-0 shadow-sm">
      <div class="card-body row p-4">
        
        <h4 class="mb-3">{{ $title }}</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Game Name</th>
                <th>Genre</th>
                <th>Type</th>
                <th>Order Date</th>
                {{-- <th>Aksi</th> --}}
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($arrays as $item) --}}
                <tr>
                  <td>{{ $arrays->id }}</td>
                  <td>{{ $arrays->credit->game->name }}</td>
                  <td>{{ $arrays->credit->game->genre->name }}</td>
                  <td>{{ $arrays->credit->game->game_type->name }}</td>
                  <td>{{ $arrays->order_date }}</td>
                </tr>
              {{-- @endforeach --}}
            </tbody>
          </table>
        </div>

        <h4 class="mt-3">TRX Detail</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#ID</th>
                <th>IDGameApp</th>
                <th>Comments</th>
                <th>Total</th>
                <th>Status</th>
                {{-- <th>Aksi</th> --}}
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($arrays as $item) --}}
                <tr>
                  <td>{{ $arrays->id }}</td>
                  <td>{{ $arrays->IDGameApp }}</td>
                  <td>{{ $arrays->comments }}</td>
                  <td>{{ $arrays->total }}</td>
                  <td>
                    @if ($arrays->status == 'unpaid')
                      <span class="btn btn-danger btn-sm radius-6">{{ $arrays->status }}</span>
                    @else
                      <span class="btn btn-primary btn-sm radius-6">{{ $arrays->status }}</span>
                    @endif
                  </td>
                </tr>
              {{-- @endforeach --}}
            </tbody>
          </table>
          <p style="text-align: justify">
            <span class="text-danger">Note : </span>
            Silahkan segera konfirmasi ke kontak 
            <a href="#">087654345234</a> dengan TXID [<span class="fw-bold">{{ $arrays->id }}</span>] jika ingin melihat status pembayaran silahkan salin link : <a href="/trx/{{ $arrays->id }}/detail">http://localhost:8000/trx/{{ $arrays->id }}/detail</a></p>
        </div>
      </div>

    </div>
  </div>

  <div class="col-md-3"></div>

</div>
@endsection