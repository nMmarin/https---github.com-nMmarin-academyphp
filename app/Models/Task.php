<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'merchant_id',
        'body',
        'date_start',
        'date_end',
        'personal_id',
        'create_personal_id',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с MerchantPersonal (кому назначена задача)
    public function personal()
    {
        return $this->belongsTo(MerchantPersonal::class, 'personal_id');
    }

    // Связь с MerchantPersonal (кто создал задачу)
    public function creator()
    {
        return $this->belongsTo(MerchantPersonal::class, 'create_personal_id');
    }
}