<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('product.index');
    }

    public function store()
    {
        $uri = Http::get('https://raw.githubusercontent.com/Bit-Code-Technologies/mockapi/main/purchase.json')->json();
        foreach ($uri as $key => $value) {
            $product[] = [
                'name' => $value['name'],
                'order_no' => $value['order_no'],
                'user_phone' => $value['user_phone'],
                'product_code' => $value['product_code'],
                'product_name' => $value['product_name'],
                'product_price' => $value['product_price'],
                'purchase_quantity' => $value['purchase_quantity'],
                'created_at' => Carbon::parse($value['created_at']),
                'total' => $value['product_price'] * $value['purchase_quantity'],
            ];
        }
        Product::insert($product);
        return redirect('/dashboard/show');
    }
    public function show()
    {
        $products = Product::orderBy('total','desc')->get();
        $totalQuantity= Product::sum('purchase_quantity');
        $totalPrice= Product::sum('total');
        $totalProductPrice= Product::sum('product_price');
        return view('product.show', ['products' => $products, 'totalQuantity' => $totalQuantity, 'totalPrice' => $totalPrice, 'totalProductPrice' => $totalProductPrice]);
    }
}
