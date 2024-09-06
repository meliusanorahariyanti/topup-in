<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Credit;
use App\Models\Transaction;
use Carbon\Carbon;

class PageController extends Controller
{
    public function index(){
        $title = 'Home';
        $arrays = Game::with('genre')
                        ->with('game_type')
                        ->get();
        return view('main.home.index', compact([
            'title', 'arrays'
        ]));
    }

    public function detail($id){
        $title = 'Detail Game';
        $game = Game::with('genre')
                        ->with('game_type')
                        ->where('id', $id)
                        ->first();
        $credit = Credit::with('game')
                        ->where('game_id', $id)
                        ->get();
        return view('main.home.detail', compact([
            'title', 'game', 'credit'
        ]));
    }

    public function checkout($id, $credit_id){
        $title = 'Checkout Information';
        $credit = Credit::with('game')
                        ->where('game_id', $id)
                        ->where('id', $credit_id)
                        ->first();
        return view('main.home.checkout', compact([
            'title', 'credit'
        ]));
    }

    public function checkout_now(Request $request){
        $txID = 'TX'.time();
        // dd($request->all());
        Transaction::create([
            'id' => $txID,
            // 'user_id' => auth()->user()->id,
            'credit_id' => $request->credit_id,
            'order_date' => Carbon::now(),
            'IDGameApp' => $request->id_game_app,
            'comments' => $request->comments,
            'total' => $request->total,
            'status' => 'unpaid',
        ]);

        return redirect('/trx'.'/'.$txID.'/detail')->with('success', 'Terima kasih telah order!');
    }

    public function checkout_detail($txid){
        $title = 'Transaksi ID '.$txid;
        $arrays = Transaction::with('credit')
                        ->where('id', $txid)->first();
        return view('main.transactions.index', compact([
            'title', 'arrays'
        ]));
    }
}
