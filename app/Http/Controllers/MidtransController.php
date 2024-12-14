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

    private function verifySignature($requestBody, $receivedSignature)
    {
        // Ambil server key dari config/env
        $serverKey = config('midtrans.server_key');

        // Ambil nilai yang diperlukan
        $orderId = $requestBody['order_id'];
        $statusCode = $requestBody['status_code'];
        $grossAmount = $requestBody['gross_amount'];
        
        // Buat signature key
        $signatureKey = $orderId . $statusCode . $grossAmount . $serverKey;

        // Generate signature
        $calculatedSignature = hash('sha512', $signatureKey);
        
        // Bandingkan dengan signature yang diterima
        return hash_equals($calculatedSignature, $receivedSignature);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // Ambil signature dari header
            $receivedSignature = $request->signature_key;
            
            if (!$receivedSignature) {
                Log::warning('Midtrans notification received without signature');
                return response()->json([
                    'message' => 'No signature provided'
                ], 400);
            }

            // Verifikasi signature
            if (!$this->verifySignature($request->all(), $receivedSignature)) {
                Log::warning('Invalid Midtrans signature received', [
                    'order_id' => $request->order_id,
                    'received_signature' => $receivedSignature
                ]);
                return response()->json([
                    'message' => 'Invalid signature'
                ], 400);
            }

            $data = $request->all();
            $transaksi = TransaksiModel::where('id_transaksi', $request->order_id)->first();
            
            if (!$transaksi) {
                Log::error('Transaction not found', ['order_id' => $request->order_id]);
                return response()->json([
                    'message' => 'Transaksi tidak ditemukan'
                ], 404);
            }

            switch ($request->transaction_status) {
                case 'settlement':
                    $transaksi->status = 1;
                    $transaksi->status_label = 'Paid';
                    break;
                case 'cancel':
                    $transaksi->status = 2;
                    $transaksi->status_label = 'Cancel';
                    break;
                case 'expire':
                    $transaksi->status = 3;
                    $transaksi->status_label = 'Kadaluarsa';
                    break;
                case 'pending':
                    $transaksi->status = 0;
                    $transaksi->status_label = 'Pending';
                    break;
                default:
                    return response()->json([
                        'message' => 'Status tidak valid'
                    ], 400);
            }

            $transaksi->data_pay = json_encode($data);
            $transaksi->update();

            Log::info('Transaction status updated successfully', [
                'order_id' => $request->order_id,
                'status' => $request->transaction_status
            ]);

            return response()->json($transaksi, 201);

        } catch (\Exception $e) {
            Log::error('Error processing Midtrans notification', [
                'error' => $e->getMessage(),
                'order_id' => $request->order_id ?? null
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
