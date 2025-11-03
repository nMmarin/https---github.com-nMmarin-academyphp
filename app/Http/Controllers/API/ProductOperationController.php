<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductOperation;
use Illuminate\Http\Request;

class ProductOperationController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = ProductOperation::query();

        if ($merchantId) {
            $query->where('merchant_id', $merchantId);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
        ]);

        return response()->json(ProductOperation::create($data), 201);
    }

    public function show(ProductOperation $productOperation)
    {
        return response()->json($productOperation);
    }

    public function update(Request $request, ProductOperation $productOperation)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
        ]);

        $productOperation->update($data);
        return response()->json($productOperation);
    }

    public function destroy(ProductOperation $productOperation)
    {
        $productOperation->delete();
        return response()->json(null, 204);
    }
}