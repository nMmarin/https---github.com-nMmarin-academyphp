<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantSetting extends Model
{
    protected $table = 'merchant_settings';

    protected $fillable = [
        'merchant_id',
        'currency',
        'timeline',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}