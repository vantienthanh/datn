<?php

namespace Modules\Store\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Store extends Model
{
//    use Translatable;

    protected $table = 'store__stores';
//    public $translatedAttributes = [];
    protected $fillable = ['product_id','quantity'];

    public function product () {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
