<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaction';
        $arrays = Transaction::with('credit')->with('user')->orderBy('created_at', 'DESC')->get();
        return view('admin.transactions.index', compact([
            'title', 'arrays'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Transaction::where('id', $id)->update([
            'user_id' => auth()->user()->id,
            'status' => 'paid',
        ]);

        return redirect('/admin/transaction')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export_paid($status = 'paid'){
        $arrays = Transaction::with('credit')->with('user')->where('status', $status)->get();
        // return view('admin.transactions.export_paid', compact('arrays'));
        $pdf = PDF::loadview('admin.transactions.export_paid', compact('arrays'));
        return $pdf->stream();
    }

    public function export_unpaid($status = 'unpaid'){
        $arrays = Transaction::with('credit')->with('user')->where('status', $status)->get();
        // return view('admin.transactions.export_unpaid', compact('arrays'));
        $pdf = PDF::loadview('admin.transactions.export_unpaid', compact('arrays'));
        return $pdf->stream();
    }
}
