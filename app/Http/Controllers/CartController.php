<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //Show cart page
    public function show()
    {
        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->pluck('product_id');
        $products = [];
        foreach ($carts as $cart) {
            $products[] = Product::where('id', $cart)->get();
        }
        return view('order.cart', [
            'products' => $products
        ]);
    }

    //Remove product
    public function remove(Cart $cart, Product $product)
    {
        $cart->where('product_id', $product->id)
            ->where('user_id', auth()->user()->id)
            ->delete();
        return redirect('/cart');
    }
}
