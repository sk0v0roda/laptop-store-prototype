<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = \Cart::name('default');

        return view('cart.index')
            ->with('cart', $cart);

    }

    public function remove(Request $request)
    {
        $hashID = $request->string('hash_id');

        $cart = \Cart::name('default');

        $cart->removeItem($hashID);

        return response()->redirectionToRoute('cart.index');
    }

    public function create()
    {
        $cart = \Cart::name('default');

        \DB::transaction(function () use ($cart) {

            $order = Order::create([
                'user_id' => auth()->user()->id,
            ]);

            foreach ($cart->getItems() as $item) {
                $order->orderProducts()->save(
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $item->getId(),
                        'quantity' => $item->getQuantity()
                    ]));
            }
        });
        return response()->redirectToRoute('products.index');
    }

    public function put(Request $request)
    {
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
