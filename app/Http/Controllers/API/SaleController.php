<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = Sale::query();

        if ($merchantId) {
            $query->where('merchant_id', $merchantId);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status_id' => 'required|exists:sale_statuses,id',
        ]);

        return response()->json(Sale::create($data), 201);
    }

    public function show(Sale $sale)
    {
        return response()->json($sale);
    }

    public function update(Request $request, Sale $sale)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status_id' => 'required|exists:sale_statuses,id',
        ]);

        $sale->update($data);
        return response()->json($sale);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->json(null, 204);
    }
}