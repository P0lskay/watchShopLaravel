<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopWatches extends Model
{
    use SoftDeletes;
    
    public function category(){
        return $this->belongsTo(ShopCategory::class);
    }
}
