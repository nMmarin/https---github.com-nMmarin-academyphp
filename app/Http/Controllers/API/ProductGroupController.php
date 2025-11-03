<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = ProductGroup::query();

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
        ]);

        return response()->json(ProductGroup::create($data), 201);
    }

    public function show(ProductGroup $productGroup)
    {
        return response()->json($productGroup);
    }

    public function update(Request $request, ProductGroup $productGroup)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'name' => 'required|string|max:255',
        ]);

        $productGroup->update($data);
        return response()->json($productGroup);
    }

    public function destroy(ProductGroup $productGroup)
    {
        $productGroup->delete();
        return response()->json(null, 204);
    }
}