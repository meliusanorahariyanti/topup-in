<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GameType;
use Illuminate\Http\Request;

class GameTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Game Types';
        $arrays = GameType::withCount('game')->get();
        return view('admin.gametypes.index', compact([
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
        $title = 'Game Types';
        return view('admin.gametypes.create', compact([
            'title'
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
            'name' => 'required|string'
        ]);

        GameType::create([
            'name' => $request->name
        ]);

        return redirect('/admin/gametype')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Game Types';
        $arrays = GameType::where('id', $id)->first();
        return view('admin.gametypes.show', compact([
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
        $title = 'Game Types';
        $arrays = GameType::where('id', $id)->first();
        return view('admin.gametypes.edit', compact([
            'title',
            'arrays'
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
            'name' => 'required|string'
        ]);

        GameType::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect('/admin/gametype')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GameType::where('id', $id)->delete();
        return redirect('/admin/gametype')->with('success', 'Data berhasil dihapus!');
    }
}
