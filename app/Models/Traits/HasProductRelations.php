<?php


namespace App\Models\Traits;


use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasProductRelations
{
    public function orders(): BelongsToMany
    {
        return  $this->belongsToMany(Order::class,'order_items','order_id','product_id');
    }

}
