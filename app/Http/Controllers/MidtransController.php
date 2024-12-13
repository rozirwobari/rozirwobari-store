<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class MidtransController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $transaksi = TransaksiModel::where('id_transaksi', $request->order_id)->first();
        if ($transaksi) {
            if ($request->transaction_status == 'settlement') {
                $transaksi->status = 1;
                $transaksi->status_label = 'Paid';
            } else if ($request->transaction_status == 'cancel') {
                $transaksi->status = 2;
                $transaksi->status_label = 'Cancel';
            } else if ($request->transaction_status == 'expire') {
                $transaksi->status = 3;
                $transaksi->status_label = 'Kadaluarsa';
            } else if ($request->transaction_status == 'pending') {
                $transaksi->status = 0;
                $transaksi->status_label = 'Pending';
            } else {
                return response()->json([
                    'message' => 'Status tidak valid'
                ], 400);
            }
            $transaksi->data_pay = json_encode($data);
            $transaksi->update();
        }
        return response()->json($transaksi, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
