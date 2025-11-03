<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOperation extends Model
{
    protected $table = 'product_operations';

    protected $fillable = [
        'merchant_id',
        'type',
        'creation_date',
        'product_id',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}