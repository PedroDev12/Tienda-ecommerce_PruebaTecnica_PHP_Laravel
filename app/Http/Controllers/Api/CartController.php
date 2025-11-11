<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->user()->cart()->with('items.product')->first();
        return response()->json([
            'items' => $cart->items->map(fn($i) => [
                'product' => $i->product->title,
                'price' => $i->product->price,
                'quantity' => $i->quantity,
                'subtotal' => $i->product->price * $i->quantity
            ]),
            'total' => $cart->total()
        ]);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = $request->user()->cart;
        $item = $cart->items()->where('product_id', $data['product_id'])->first();

        if ($item)
            $item->update(['quantity' => $item->quantity + $data['quantity']]);
        else
            $cart->items()->create($data);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function remove(Request $request, $productId)
    {
        $cart = $request->user()->cart;
        $cart->items()->where('product_id', $productId)->delete();
        return response()->json(['message' => 'Product removed from cart']);
    }
}
