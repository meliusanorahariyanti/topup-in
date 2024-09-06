<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameType;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Game Lists';
        $arrays = Game::with('game_type')
                        ->with('genre')
                        ->get();
        return view('admin.games.index', compact([
            'title',
            'arrays'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Game Lists';
        $types = GameType::all();
        $genres = Genre::all();
        return view('admin.games.create', compact([
            'title', 'types', 'genres'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());
        $request->validate([
            'genre_id' => 'required',
            'game_type_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required',
        ]);
        // $photo = null;
        if($request->file('photo')){
            $photo = $request->file('photo')->store('games', 'public');
        }

        Game::create([
            'genre_id' => $request->genre_id,
            'game_type_id' => $request->game_type_id,
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $photo
        ]);

        return redirect()->to('/admin/game')
                    ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Game Lists';
        $types = GameType::all();
        $genres = Genre::all();
        $arrays = Game::where('id', $id)->first();
        return view('admin.games.show', compact([
            'title',
            'arrays'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Game Lists';
        $types = GameType::all();
        $genres = Genre::all();
        $arrays = Game::where('id', $id)->first();
        return view('admin.games.edit', compact([
            'title', 'arrays', 'genres', 'types'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Game::where('id', $id)->first();
        $request->validate([
            'genre_id' => 'required',
            'game_type_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            // 'photo' => 'required',
        ]);
        
        $photo = null;

        if($request->file('photo')){
            $photo = $request->file('photo')->store('games', 'public');
        }

        Game::where('id', $id)->update([
            'genre_id' => $request->genre_id,
            'game_type_id' => $request->game_type_id,
            'name' => $request->name,
            'description' => $request->description,
            'photo' => ($photo == null) ? $row->photo : $photo
        ]);

        return redirect()->to('/admin/game')
                    ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::where('id', $id)->delete();
        return redirect('/admin/game')->with('success', 'Data berhasil dihapus!');
    }
}
