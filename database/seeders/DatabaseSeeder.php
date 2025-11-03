<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MerchantSeeder::class,
            MerchantPersonalSeeder::class,
            SaleStatusSeeder::class,
            ProductGroupSeeder::class,
            ProductSeeder::class,
            ClientSeeder::class,
            TaskSeeder::class,
            SaleSeeder::class,
            ProductOperationSeeder::class,
            MerchantSettingSeeder::class,
        ]);
    }
}