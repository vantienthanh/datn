<?php
/**
 * Created by PhpStorm.
 * User: thanh
 * Date: 23/05/2019
 * Time: 13:24
 */

namespace Modules\Product\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Bill\Repositories\BillRepository;
use Modules\Product\Repositories\ProductRepository;

class ProductAjaxController extends Controller
{
    private $product;
    private $bill;

    public function __construct(ProductRepository $product, BillRepository $bill)
    {
        $this->product = $product;
        $this->bill = $bill;
    }

    public function productDetail (Request $request) {
        $item = $this->product->find($request->id);
        return [
          'name' => $item->name,
          'cost' => $item->cost,
          'image' => $item->getImage()
        ];
    }

    public function tk_30_day () {
        return $this->bill->getBy30Day();
    }
}