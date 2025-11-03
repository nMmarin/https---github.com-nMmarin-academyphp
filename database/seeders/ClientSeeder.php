<?php
namespace Database\Seeders;

use App\Models\Client;
use App\Models\MerchantPersonal;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();
        $personal = MerchantPersonal::where('email', 'john.doe@example.com')->where('merchant_id', $merchant->id)->first();

        Client::create([
            'merchant_id' => $merchant->id,
            'name' => 'Alice',
            'surname' => 'Johnson',
            'create_date' => '2025-10-03',
            'phone_number' => '1112223333',
            'email' => 'alice.johnson@example.com',
            'create_personal_id' => $personal->id,
        ]);

        Client::create([
            'merchant_id' => $merchant->id,
            'name' => 'Bob',
            'surname' => 'Williams',
            'create_date' => '2025-10-04',
            'phone_number' => '4445556666',
            'email' => 'bob.williams@example.com',
            'create_personal_id' => $personal->id,
        ]);
    }
}