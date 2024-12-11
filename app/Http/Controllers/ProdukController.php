<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukModel;
use App\Models\CartModel;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
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
    public function destroy(string $id)
    {
        //
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
        
    }
}

