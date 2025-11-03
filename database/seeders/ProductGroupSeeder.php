<?php
namespace Database\Seeders;

use App\Models\ProductGroup;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();

        ProductGroup::create(['merchant_id' => $merchant->id, 'name' => 'Electronics']);
        ProductGroup::create(['merchant_id' => $merchant->id, 'name' => 'Clothing']);
    }
}