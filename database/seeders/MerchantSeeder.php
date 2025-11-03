<?php
namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    public function run()
    {
        Merchant::firstOrCreate(['name' => 'Tech Store'], [
            'address' => '123 Tech Street',
            'phone_number' => '9876543210',
            'country' => 'USA',
        ]);

        Merchant::firstOrCreate(['name' => 'Fashion Boutique'], [
            'address' => '456 Fashion Avenue',
            'phone_number' => '0123456789',
            'country' => 'USA',
        ]);
    }
}