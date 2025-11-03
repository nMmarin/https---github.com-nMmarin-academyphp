<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {
        return response()->json(Merchant::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'country' => 'required|string',
        ]);

        return response()->json(Merchant::create($data), 201);
    }

    public function show(Merchant $merchant)
    {
        return response()->json($merchant);
    }

    public function update(Request $request, Merchant $merchant)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'country' => 'required|string',
        ]);

        $merchant->update($data);
        return response()->json($merchant);
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return response()->json(null, 204);
    }
}