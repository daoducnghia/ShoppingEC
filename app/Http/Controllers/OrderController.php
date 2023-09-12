<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //Show checkout page
    public function show()
    {
        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->pluck('product_id');
        $products = [];
        foreach ($carts as $cart) {
            $products[] = Product::where('id', $cart)->get();
        }
        return view('order.checkout', [
            'products' => $products
        ]);
    }

    //Ordered
    public function ordered(Request $request)
    {
        $shippingFF = $request->validate([
            'fullname' => ['required'],
            'telephone' => ['required'],
            'address' => ['required'],
            'country' => ['required'],
            'province' => ['required']
        ]);

        // Store in order
        $orderFormFileds['order_total'] = $request->total;
        $orderFormFileds['order_date'] = $request->date;
        $orderFormFileds['user_id'] = auth()->user()->id;
        $order = Order::create($orderFormFileds);
        $orderId = $order->id;

        // Store in shipping
        $shippingFF['order_id'] = $orderId;
        Shipping::create($shippingFF);

        // Store in order detail
        $userId = auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->pluck('product_id');
        $products = [];
        foreach ($carts as $cart) {
            $products[] = Product::where('id', $cart)->get();
        }
        foreach ($products as $product) {
            $orderDFF = [
                'order_id' => $orderId,
                'product_id' => $product[0]->id
            ];
            $orderD = OrderDetail::create($orderDFF);
        }

        // Remove product ordered in cart
        foreach ($products as $product) {
            $delCart = Cart::where('user_id', $userId)
                ->where('product_id', $product[0]->id)
                ->delete();
        }
        return redirect('/user');
    }
}
