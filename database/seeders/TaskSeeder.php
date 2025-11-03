<?php
namespace Database\Seeders;

use App\Models\Task;
use App\Models\MerchantPersonal;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $merchant = Merchant::where('name', 'Tech Store')->first();
        $personal = MerchantPersonal::where('email', 'john.doe@example.com')->where('merchant_id', $merchant->id)->first();

        Task::create([
            'merchant_id' => $merchant->id,
            'body' => 'Follow up with client',
            'date_start' => '2025-10-05',
            'date_end' => '2025-10-06',
            'personal_id' => $personal->id,
            'create_personal_id' => $personal->id,
        ]);

        Task::create([
            'merchant_id' => $merchant->id,
            'body' => 'Update inventory',
            'date_start' => '2025-10-07',
            'date_end' => null,
            'personal_id' => $personal->id,
            'create_personal_id' => $personal->id,
        ]);
    }
}