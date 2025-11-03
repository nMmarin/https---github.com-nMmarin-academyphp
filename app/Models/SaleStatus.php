<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleStatus extends Model
{
    protected $table = 'sale_statuses';

    protected $fillable = [
        'merchant_id',
        'name',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с Sale
    public function sales()
    {
        return $this->hasMany(Sale::class, 'status_id');
    }
}