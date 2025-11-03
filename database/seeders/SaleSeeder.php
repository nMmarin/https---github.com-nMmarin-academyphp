<?php
namespace Database\Seeders;

use App\Models\Sale;
use App\Models\MerchantPersonal;
use App\Models\Client;
use App\Models\SaleStatus;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();
        $personal = MerchantPersonal::where('email', 'john.doe@example.com')->where('merchant_id', $merchant->id)->first();
        $client = Client::where('email', 'alice.johnson@example.com')->where('merchant_id', $merchant->id)->first();
        $status = SaleStatus::where('name', 'Pending')->where('merchant_id', $merchant->id)->first();
        $product = Product::where('articule', 'SM123')->where('merchant_id', $merchant->id)->first();

        Sale::create([
            'merchant_id' => $merchant->id,
            'create_personal_id' => $personal->id,
            'create_date' => '2025-10-08',
            'client_id' => $client->id,
            'status_id' => $status->id,
            'amount' => 300.00,
            'product_id' => $product->id,
        ]);
    }
}