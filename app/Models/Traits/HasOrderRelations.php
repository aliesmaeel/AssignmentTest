<?php


namespace App\Models\Traits;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasOrderRelations
{

    public function customer() :BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function products(): BelongsToMany

    {
        return $this->belongsToMany(Product::class,'order_items','product_id','order_id');
    }
}
