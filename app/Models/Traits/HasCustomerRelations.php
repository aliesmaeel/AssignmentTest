<?php


namespace App\Models\Traits;


use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCustomerRelations
{
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
