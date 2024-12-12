<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\CartModel;
use App\Models\TransaksiModel;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

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
        $produk = ProdukModel::find($id);
        $cart = [];
        if (Auth::check()) {
            $cart = CartModel::where('user_id', auth()->user()->id)->get();
        }
        return view('home.content.produk', compact('produk', 'cart'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function history()
    {
        $transaksi = TransaksiModel::where('user_id', Auth::user()->id)->get();
        return view('home.content.history', compact('transaksi'));
    }


    public function cart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = CartModel::where('user_id', auth()->user()->id)->get();
        return view('home.content.cart', compact('cart'));
    }

    public function addtocart($produk_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $produk = ProdukModel::find($produk_id);
        if (!$produk) {
            return redirect()->route('home')->with('alert', [
                'type' => 'danger',
                'message' => 'Produk tidak ditemukan',
                'title' => 'Oops!'
            ]);
        }
        $cart = New CartModel();
        $cart->user_id = auth()->user()->id;
        $cart->produk_id = $produk->id;
        $cart->jumlah = 1;
        $cart->total = $produk->harga;
        $cart->save();
        return redirect()->back()->with('alert', [
            'type' => 'success',
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'title' => 'Berhasil!'
        ]);
    }

    public function deletecart($cart_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $cart = CartModel::find($cart_id);
        if (!$cart) {
            return redirect()->back()->with('alert', [
                'type' => 'danger',
                'message' => 'Produk tidak ditemukan',
                'title' => 'Oops!'
            ]);
        }
        $cart->delete();
        return redirect()->route('cart')->with('alert', [
            'type' => 'success',
            'message' => 'Produk berhasil dihapus dari keranjang',
            'title' => 'Berhasil!'
        ]);
    }

    public function checkout()
    {
        $cart = CartModel::with('produk')->where('user_id', Auth::user()->id)->get();
        if ($cart->isEmpty()) {
            return redirect()->back()->with('alert', [
                'type' => 'danger',
                'message' => 'Keranjang kamu kosong, silahkan tambahkan produk terlebih dahulu',
                'title' => 'Oops!'
            ]);
        }
        $data = [];
        $total = 0;
        $midtrans_item_details = [];
        foreach ($cart as $item) {
            $data[] = [
                'produk_id' => $item->produk_id,
                'nama' => $item->produk->title,
                'harga_satuan' => $item->produk->harga,
                'harga_total' => ($item->produk->harga * $item->jumlah),
                'jumlah' => $item->jumlah
            ];
            $midtrans_item_details[] = [
                'id' => $item->produk_id,
                'price' => $item->produk->harga,
                'quantity' => $item->jumlah,
                'name' => $item->produk->title,
            ];
            $total += ($item->produk->harga * $item->jumlah);
        }

        $order_id = 'RZWTRX-' . time() . '-' . rand(1000, 9999) . Auth::user()->id;
        $transaksi = New TransaksiModel();
        $transaksi->user_id = Auth::user()->id;
        $transaksi->id_transaksi = $order_id;
        $transaksi->total = $total;
        $transaksi->data = json_encode($data);
        // dd($midtrans_item_details);
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ],
            'item_details' => $midtrans_item_details,
        ];
        
        try {
            $snapToken = Snap::getSnapToken($params);
            $transaksi->snap_token = $snapToken;
            $transaksi->save();
            $cart = CartModel::where('user_id', Auth::user()->id)->delete();
            return redirect()->to("/payment/{$order_id}");
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }


    public function showPayment($id_transaksi)
    {
        $transaksi = TransaksiModel::where('id_transaksi', $id_transaksi)->first();
        return view('home.content.payment', compact('transaksi'));
    }
}

