<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'product_groups';

    protected $fillable = [
        'merchant_id',
        'name',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с Product
    public function products()
    {
        return $this->hasMany(Product::class, 'group_id');
    }
}