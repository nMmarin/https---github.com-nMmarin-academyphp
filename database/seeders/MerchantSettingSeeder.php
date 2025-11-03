<?php
namespace Database\Seeders;

use App\Models\MerchantSetting;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantSettingSeeder extends Seeder
{
    public function run()
    {
        $merchant1 = Merchant::where('name', 'Tech Store')->first();
        $merchant2 = Merchant::where('name', 'Fashion Boutique')->first();

        MerchantSetting::create([
            'merchant_id' => $merchant1->id,
            'currency' => 'USD',
            'timeline' => 'monthly',
        ]);

        MerchantSetting::create([
            'merchant_id' => $merchant2->id,
            'currency' => 'EUR',
            'timeline' => 'weekly',
        ]);
    }
}