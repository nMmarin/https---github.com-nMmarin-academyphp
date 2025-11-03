<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $merchantId = $request->query('merchant_id');
        $query = Client::query();

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
            'phone' => 'required|string',
            'email' => 'required|email|unique:clients',
        ]);

        return response()->json(Client::create($data), 201);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:clients,email,' . $client->id,
        ]);

        $client->update($data);
        return response()->json($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}