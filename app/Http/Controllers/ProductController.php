<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class ProductController extends Controller
{
    // Show home page
    public function index(Request $request)
    {
        return view('product.home', [
            'heading' => 'Homepage',
            'products' => Product::take(4)->get()
        ]);
    }

    // Show men page
    public function menIndex(Request $request)
    {
        $products = Product::where('category', 'men')
            ->latest()
            ->paginate(9);

        return view('product.men', ['action' => 'none', 'products' => $products]);
    }

    // Show women page
    public function womenIndex(Request $request)
    {
        $products = Product::where('category', 'women')->latest()->paginate(9);

        return view('product.women', ['action' => 'none', 'products' => $products]);
    }

    // Show kids page
    public function kidsIndex(Request $request)
    {
        $products = Product::where('category', 'kids')->latest()->paginate(9);

        return view('product.kids', ['action' => 'none', 'products' => $products]);
    }

    //Search 
    public function search(Request $request)
    {

        return view('product.search', [
            'products' => Product::latest()->filter(request(['search']))->paginate(9)
        ]);
    }

    //Show sigle product
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }

    //ADMIN
    //Show product
    public function productShow()
    {
        return view('admin.product', [
            'products' => Product::latest()->get()
        ]);
    }
    //Show add form
    public function addProduct()
    {
        return view('admin.add-product');
    }

    //Show edit form
    public function editProduct(Product $product)
    {
        return view('admin.edit-product', [
            'product' => $product
        ]);
    }

    //Store added product
    public function addedProduct(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'color' => ['required'],
            'brand' => ['required'],
            'image' => ['required'],
            'size' => ['required'],
            'category' => ['required'],
            'description' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Product::create($formFields);

        return redirect('/admin/product');
    }

    //Update product
    public function editedProduct(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'color' => ['required'],
            'brand' => ['required'],
            'image' => ['required'],
            'size' => ['required'],
            'category' => ['required'],
            'description' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($formFields);

        return redirect('/admin/product');
    }

    //Delete product
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect('/admin/product');
    }

    //CART
    public function add(Request $request, Product $product)
    {
        $formFields['product_id'] = $product->id;
        $formFields['user_id'] = auth()->user()->id;

        Cart::create($formFields);

        return redirect('/cart');
    }

    //FILTER
    //Drop filter men
    public function filterDrop(Request $request)
    {

        if ($request->query('drop-filter') === "pricehtol") {
            $products = Product::where('category', 'men')
                ->orderByDesc('price')->paginate(9);
            return view('product.men', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "priceltoh") {
            $products = Product::where('category', 'men')
                ->orderBy('price', 'asc')->paginate(9);
            return view('product.men', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "best-seller") {
            $products = Product::where('category', 'men')
                ->orderBy('created_at', 'desc')->paginate(9);
            return view('product.men', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else {
            return redirect('/product/men');
        }
    }
    public function filterDropW(Request $request)
    {

        if ($request->query('drop-filter') === "pricehtol") {
            $products = Product::where('category', 'women')
                ->orderByDesc('price')->paginate(9);
            return view('product.women', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "priceltoh") {
            $products = Product::where('category', 'women')
                ->orderBy('price', 'asc')->paginate(9);
            return view('product.women', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "best-seller") {
            $products = Product::where('category', 'women')
                ->orderBy('created_at', 'desc')->paginate(9);
            return view('product.women', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else {
            return redirect('/product/women');
        }
    }
    public function filterDropK(Request $request)
    {

        if ($request->query('drop-filter') === "pricehtol") {
            $products = Product::where('category', 'kids')
                ->orderByDesc('price')->paginate(9);
            return view('product.kids', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "priceltoh") {
            $products = Product::where('category', 'kids')
                ->orderBy('price', 'asc')->paginate(9);
            return view('product.kids', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else if ($request->query('drop-filter') === "best-seller") {
            $products = Product::where('category', 'kids')
                ->orderBy('created_at', 'desc')->paginate(9);
            return view('product.kids', [
                'action' => 'filter',
                'products' => $products
            ]);
        } else {
            return redirect('/product/kids');
        }
    }
}
