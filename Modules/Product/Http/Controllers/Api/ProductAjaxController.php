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
use Modules\Product\Repositories\ProductRepository;

class ProductAjaxController extends Controller
{
    private $product;

    public function __construct(ProductRepository $product)
    {

        $this->product = $product;
    }

    public function productDetail (Request $request) {
//        dd($request->all());
        $item = $this->product->find($request->id);
//        dd($item->getImage());
        return [
          'name' => $item->name,
          'const' => $item->const,
          'image' => $item->getImage()
        ];
    }
}