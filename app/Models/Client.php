<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'merchant_id',
        'name',
        'surname',
        'create_date',
        'phone_number',
        'email',
        'create_personal_id',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с MerchantPersonal (кто создал клиента)
    public function creator()
    {
        return $this->belongsTo(MerchantPersonal::class, 'create_personal_id');
    }

    // Связь с Sale
    public function sales()
    {
        return $this->hasMany(Sale::class, 'client_id');
    }
}