<?php
namespace Database\Seeders;

use App\Models\MerchantPersonal;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantPersonalSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();

        MerchantPersonal::create([
            'merchant_id' => $merchant->id,
            'name' => 'John',
            'surname' => 'Doe',
            'create_date' => '2025-10-01',
            'phone_number' => '1234567890',
            'email' => 'john.doe@example.com',
        ]);

        MerchantPersonal::create([
            'merchant_id' => $merchant->id,
            'name' => 'Jane',
            'surname' => 'Smith',
            'create_date' => '2025-10-02',
            'phone_number' => '0987654321',
            'email' => 'jane.smith@example.com',
        ]);
    }
}