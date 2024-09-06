@extends('main.layouts.app')

@section('content')
<div class="p-2"></div>
<div class="row m-md-1">
  <h4 style="font-size: 12pt" class="fw-normal mb-3 float-start">{{ $title }} / <a href="/game/{{ $credit->game_id }}/detail" class="text-decoration-none">{{ $credit->game->name }}</a></h4>
  <div class="col-md-4">
    <div class="card w-100 border-0">
      <img src="{{ asset('storage/'.$credit->game->photo) }}" class="card-img-top w-100" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $credit->game->name }}</h5>
        <p class="card-text" style="text-align: justify">{{ $credit->game->description }}</p>
        <p class="card-text" style="font-size: 10pt"><small class="text-muted">{{ $credit->game->game_type->name.' - '.$credit->game->genre->name }}</small></p>
      </div>
    </div>

  </div>

  <div class="col-md-8">
    <div class="card w-100 border-0 shadow-sm">
      <div class="card-body row p-4">
        
        <h4 class="mb-3">{{ $title }}</h4>
        <form action="/game/checkout" method="POST" onsubmit="return confirm('Apakah anda yakin akan checkout?')">
          @csrf

          <div class="form-group mb-3">
            <label for="game" class="mb-1">Game Name (Type - Genre): </label>
            <input type="hidden" name="credit_id" id="credit_id" value="{{ $credit->id }}">
            <input type="text" name="game" value="{{ $credit->game->name.' - '.($credit->game->game_type->name.' - '.$credit->game->genre->name) }}" class="form-control" placeholder="Game Name" readonly>
          </div>

          <div class="form-group mb-3">
            <label for="id_game_app" class="mb-1">ID Game App (optional): </label>
            <input type="text" name="id_game_app" class="form-control" placeholder="ID Game App">
          </div>

          <div class="form-group mb-3">
            <label for="comments" class="mb-1">Comments : </label>
            <input type="text" name="comments" class="form-control" placeholder="Comments">
          </div>

          <input type="hidden" name="total" value="{{ $credit->price }}">

          <h3 class="float-start fw-bold mt-2">Rp. {{ number_format($credit->price) }}</h3>
          <button type="submit" class="btn btn-dark btn-lg px-5 float-end">Checkout</button>
        </form>
      </div>

    </div>
  </div>

</div>
@endsection