<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'merchant_id',
        'name',
        'count',
        'wholesale_price',
        'retail_price',
        'articule',
        'group_id',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с ProductGroup
    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class, 'group_id');
    }

    // Связь с Sale
    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id');
    }

    // Связь с ProductOperation
    public function productOperations()
    {
        return $this->hasMany(ProductOperation::class, 'product_id');
    }
}