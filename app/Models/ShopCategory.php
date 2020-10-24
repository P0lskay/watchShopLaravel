<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
    ];
}
