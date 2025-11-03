<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MerchantSetting;
use Illuminate\Http\Request;

class MerchantSettingController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = MerchantSetting::query();

        if ($merchantId) {
            $query->where('merchant_id', $merchantId);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'key' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        return response()->json(MerchantSetting::create($data), 201);
    }

    public function show(MerchantSetting $merchantSetting)
    {
        return response()->json($merchantSetting);
    }

    public function update(Request $request, MerchantSetting $merchantSetting)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'key' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        $merchantSetting->update($data);
        return response()->json($merchantSetting);
    }

    public function destroy(MerchantSetting $merchantSetting)
    {
        $merchantSetting->delete();
        return response()->json(null, 204);
    }
}