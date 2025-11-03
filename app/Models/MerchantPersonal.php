<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantPersonal extends Model
{
    protected $table = 'merchant_personal';

    protected $fillable = [
        'merchant_id',
        'name',
        'surname',
        'create_date',
        'phone_number',
        'email',
    ];

    // Связь с Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Связь с Client (созданные клиенты)
    public function createdClients()
    {
        return $this->hasMany(Client::class, 'create_personal_id');
    }

    // Связь с Task (задачи, назначенные персоналу)
    public function tasks()
    {
        return $this->hasMany(Task::class, 'personal_id');
    }

    // Связь с Task (созданные задачи)
    public function createdTasks()
    {
        return $this->hasMany(Task::class, 'create_personal_id');
    }

    // Связь с Sale (созданные продажи)
    public function createdSales()
    {
        return $this->hasMany(Sale::class, 'create_personal_id');
    }
}