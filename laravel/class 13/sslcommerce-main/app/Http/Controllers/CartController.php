<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        $request->validate(['quantity' => 'nullable|integer|min:1']);
        $qty = (int) ($request->quantity ?? 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'name'  => $product->name,
                'price' => $product->finalPrice(),
                'image' => $product->imageUrl(),
                'quantity' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', $product->name . ' added to cart.');
    }

    public function update(Request $request, int $productId): RedirectResponse
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = (int) $request->quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated.');
    }

    public function remove(int $productId): RedirectResponse
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        return back()->with('success', 'Item removed from cart.');
    }
}
