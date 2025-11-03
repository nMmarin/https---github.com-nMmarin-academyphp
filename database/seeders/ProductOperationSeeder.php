<?php
namespace Database\Seeders;

use App\Models\ProductOperation;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class ProductOperationSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();
        $product = Product::where('articule', 'SM123')->where('merchant_id', $merchant->id)->first();

        ProductOperation::create([
            'merchant_id' => $merchant->id,
            'type' => 'Restock',
            'creation_date' => '2025-10-09',
            'product_id' => $product->id,
        ]);

        ProductOperation::create([
            'merchant_id' => $merchant->id,
            'type' => 'Sale',
            'creation_date' => '2025-10-10',
            'product_id' => $product->id,
        ]);
    }
}