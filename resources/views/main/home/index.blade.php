@extends('main.layouts.app')

@section('content')
@include('main.additionals.jumbroton')
<div class="row m-md-1 p-2">
    <h4 class="fw-normal text-white mb-3">Game Lists</h4>

    <div id="game-list" class="row">
        @foreach ($arrays as $item)
        <div class="col-md-4 game-item">
            <a href="/game/{{ $item->id }}/detail" class="text-decoration-none">
                <div class="card mb-3 w-100 shadow-sm border-0 radius-6 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$item->photo) }}" class="w-100 h-50" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $item->name }}</h5>
                                <p style="text-align: justify; font-size: 10pt" class="card-text text-white">
                                    {{ substr($item->description, 0,120) }}..</p>
                                <p class="card-text" style="font-size: 10pt"><small
                                        class="text-muted">{{ $item->game_type->name.' - '.$item->genre->name }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="col-12 text-center">
        <a href="#" id="show-all" class="text-warning">Tampilkan Semua</a>
    </div>

</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Menyimpan referensi ke tombol "Tampilkan Semua" dan semua item game
        const showAllButton = document.getElementById('show-all');
        const gameItems = document.querySelectorAll('#game-list .game-item');

        // Awalnya menyembunyikan semua item kecuali 6 item pertama
        gameItems.forEach((item, index) => {
            if (index >= 6) {
                item.classList.add('hidden');
            }
        });

        // Menambahkan event listener untuk menangani klik pada tombol "Tampilkan Semua"
        showAllButton.addEventListener('click', (e) => {
            e.preventDefault(); // Mencegah perilaku default dari link
            gameItems.forEach((item) => {
                item.classList.remove(
                'hidden'); // Menampilkan semua item dengan menghapus kelas 'hidden'
            });
            showAllButton.style.display =
            'none'; // Opsional: Menghilangkan tombol setelah semua item ditampilkan
        });
    });

</script>
