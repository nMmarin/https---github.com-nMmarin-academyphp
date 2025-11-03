<?php
namespace Database\Seeders;

use App\Models\SaleStatus;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class SaleStatusSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();

        SaleStatus::create(['merchant_id' => $merchant->id, 'name' => 'Pending']);
        SaleStatus::create(['merchant_id' => $merchant->id, 'name' => 'Completed']);
        SaleStatus::create(['merchant_id' => $merchant->id, 'name' => 'Cancelled']);
    }
}