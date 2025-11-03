<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();
        $group1 = ProductGroup::where('name', 'Electronics')->where('merchant_id', $merchant->id)->first();
        $group2 = ProductGroup::where('name', 'Clothing')->where('merchant_id', $merchant->id)->first();

        Product::create([
            'merchant_id' => $merchant->id,
            'name' => 'Smartphone',
            'count' => 100,
            'wholesale_price' => 200.00,
            'retail_price' => 300.00,
            'articule' => 'SM123',
            'group_id' => $group1->id,
        ]);

        Product::create([
            'merchant_id' => $merchant->id,
            'name' => 'T-Shirt',
            'count' => 50,
            'wholesale_price' => 10.00,
            'retail_price' => 20.00,
            'articule' => 'TS456',
            'group_id' => $group2->id,
        ]);
    }
}