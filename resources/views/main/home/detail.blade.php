@extends('main.layouts.app')

@section('content')
<div class="p-2"></div>
<div class="row m-md-1">
  <h4 style="font-size: 12pt" class="fw-normal mb-3 float-start">{{ $title.' / '.$game->name }} / <a href="/" class="text-decoration-none">Beranda</a></h4>
  <div class="col-md-4">
    <div class="card w-100 border-0">
      <img src="{{ asset('storage/'.$game->photo) }}" class="card-img-top w-100" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $game->name }}</h5>
        <p class="card-text" style="text-align: justify">{{ $game->description }}</p>
        <p class="card-text" style="font-size: 10pt"><small class="text-muted">{{ $game->game_type->name.' - '.$game->genre->name }}</small></p>
      </div>
    </div>

  </div>

  <div class="col-md-8">
    <div class="card w-100 border-0 shadow-sm">
      <div class="card-body row p-4">
        
        <h4 class="mb-3">Diamond Lists</h4>

        @foreach ($credit as $item)
          <div class="col-md-2">
            <a href="/game/{{ $game->id }}/checkout/{{ $item->id }}" class="text-decoration-none">
              <div class="card w-100 border-0 shadow-sm">
                <img src="https://www.onlygfx.com/wp-content/uploads/2020/11/stack-of-gold-coins-3.png" class="card-img-top w-100" alt="...">
                <div class="card-body">
                  <h5 style="font-size: 7pt" class="card-title text-warning text-center">{{ $item->information }}</h5>
                  <h3 style="font-size: 15pt" class="card-text text-dark text-center fw-bold">{{ ($item->price / 1000) }}K</h3>
                </div>
              </div>
            </a>
          </div>
        @endforeach

      </div>

    </div>
  </div>

</div>
@endsection