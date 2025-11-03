<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'merchant_id',
        'create_personal_id',
        'create_date',
        'client_id',
        'status_id',
        'amount',
        'product_id',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с MerchantPersonal (кто создал продажу)
    public function creator()
    {
        return $this->belongsTo(MerchantPersonal::class, 'create_personal_id');
    }

    // Связь с Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Связь с SaleStatus
    public function status()
    {
        return $this->belongsTo(SaleStatus::class, 'status_id');
    }

    // Связь с Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}