<?php

namespace App\Models;

use App\Models\Traits\HasCustomerRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasFactory,
        HasApiTokens,
        HasCustomerRelations;

    protected $fillable=['name','phone','address'];

}
