<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MerchantPersonal;
use Illuminate\Http\Request;

class MerchantPersonalController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = MerchantPersonal::query();

        if ($merchantId) {
            $query->where('merchant_id', $merchantId);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:merchant_personal',
        ]);

        return response()->json(MerchantPersonal::create($data), 201);
    }

    public function show(MerchantPersonal $merchantPersonal)
    {
        return response()->json($merchantPersonal);
    }

    public function update(Request $request, MerchantPersonal $merchantPersonal)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:merchant_personal,email,' . $merchantPersonal->id,
        ]);

        $merchantPersonal->update($data);
        return response()->json($merchantPersonal);
    }

    public function destroy(MerchantPersonal $merchantPersonal)
    {
        $merchantPersonal->delete();
        return response()->json(null, 204);
    }
}