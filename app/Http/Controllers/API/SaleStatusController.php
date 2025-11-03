<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SaleStatus;
use Illuminate\Http\Request;

class SaleStatusController extends Controller
{
    public function index()
    {
        return response()->json(SaleStatus::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:sale_statuses',
        ]);

        return response()->json(SaleStatus::create($data), 201);
    }

    public function show(SaleStatus $saleStatus)
    {
        return response()->json($saleStatus);
    }

    public function update(Request $request, SaleStatus $saleStatus)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:sale_statuses,name,' . $saleStatus->id,
        ]);

        $saleStatus->update($data);
        return response()->json($saleStatus);
    }

    public function destroy(SaleStatus $saleStatus)
    {
        $saleStatus->delete();
        return response()->json(null, 204);
    }
}