<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = Product::query();

        if ($merchantId) {
            $query->where('merchant_id', $merchantId);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'wholesale_price' => 'required|numeric|min:0',
            'retail_price' => 'required|numeric|min:0',
            'articule' => 'required|string|unique:products,articule',
            'group_id' => 'required|exists:product_groups,id',
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'wholesale_price' => 'required|numeric|min:0',
            'retail_price' => 'required|numeric|min:0',
            'articule' => 'required|string|unique:products,articule,' . $product->id,
            'group_id' => 'required|exists:product_groups,id',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}