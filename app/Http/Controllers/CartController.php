<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $cart = \Cart::name('default');

        return view('cart.index')
            ->with('cart', $cart);

    }

    public function put(Request $request) {
        $productID = $request->integer('product_id');

        $product = Product::findOrFail($productID);

        $cart = \Cart::name('default');

        $cart->addItem([
            'id' => $product->id,
            'title' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ]);

        return response()->redirectToRoute('cart.index');
    }

}
