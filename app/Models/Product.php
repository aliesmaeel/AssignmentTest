<?php

namespace App\Models;

use App\Models\Traits\HasProductRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use HasProductRelations;

    protected $fillable=['name','description','price'];



}
