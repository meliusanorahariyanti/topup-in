<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Credit;
use App\Models\Game;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Credits';
        $arrays = Credit::with('game')->get();
        return view('admin.credits.index', compact([
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
        $title = 'Credits';
        $games = Game::with('genre')->with('game_type')->get();
        return view('admin.credits.create', compact([
            'title', 'games'
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
        $request->validate([
            'game_id' => 'required',
            'price' => 'required',
            'information' => 'required|string',
        ]);

        Credit::create([
            'game_id' => $request->game_id,
            'price' => $request->price,
            'information' => $request->information,
        ]);

        return redirect('/admin/credit')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Credits';
        $arrays = Credit::where('id', $id)->first();
        return view('admin.credits.show', compact([
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
        $title = 'Credits';
        $games = Game::with('genre')->with('game_type')->get();
        $arrays = Credit::where('id', $id)->first();
        return view('admin.credits.edit', compact([
            'title',
            'arrays', 'games'
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
        $request->validate([
            'game_id' => 'required',
            'price' => 'required',
            'information' => 'required|string',
        ]);

        Credit::where('id', $id)->update([
            'game_id' => $request->game_id,
            'price' => $request->price,
            'information' => $request->information,
        ]);

        return redirect('/admin/credit')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Credit::where('id', $id)->delete();
        return redirect('/admin/credit')->with('success', 'Data berhasil dihapus!');
    }
}
