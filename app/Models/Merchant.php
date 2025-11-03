<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'country',
    ];

    // Связь с MerchantPersonal
    public function merchantPersonals()
    {
        return $this->hasMany(MerchantPersonal::class);
    }

    // Связь с SaleStatus
    public function saleStatuses()
    {
        return $this->hasMany(SaleStatus::class);
    }

    // Связь с ProductGroup
    public function productGroups()
    {
        return $this->hasMany(ProductGroup::class);
    }

    // Связь с Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Связь с Client
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Связь с Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Связь с Sale
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Связь с ProductOperation
    public function productOperations()
    {
        return $this->hasMany(ProductOperation::class);
    }

    // Связь с MerchantSetting
    public function merchantSettings()
    {
        return $this->hasMany(MerchantSetting::class);
    }
}