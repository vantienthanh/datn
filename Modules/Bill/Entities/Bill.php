<?php

namespace Modules\Bill\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

class Bill extends Model
{
//    use Translatable;

    protected $table = 'bill';
//    public $translatedAttributes = [];
    protected $fillable = ['address','phoneNumber','fullName','totalMoney','description','quantity','product_id','status'];

    public function product () {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
