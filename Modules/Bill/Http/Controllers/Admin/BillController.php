<?php

namespace Modules\Bill\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Bill\Entities\Bill;
use Modules\Bill\Http\Requests\CreateBillRequest;
use Modules\Bill\Http\Requests\UpdateBillRequest;
use Modules\Bill\Repositories\BillRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Product\Repositories\ProductRepository;
use Modules\Store\Entities\Store;
use Modules\Store\Repositories\StoreRepository;

class BillController extends AdminBaseController
{
    /**
     * @var BillRepository
     */
    private $bill;
    private $product;
    private $store;

    public function __construct(BillRepository $bill, ProductRepository $product, StoreRepository $store)
    {
        parent::__construct();

        $this->bill = $bill;
        $this->product = $product;
        $this->store= $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bills = $this->bill->all();

        return view('bill::admin.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = $this->product->all();
        return view('bill::admin.bills.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateBillRequest $request
     * @return Response
     */
    public function store(CreateBillRequest $request, Store $store)
    {
        $result = $this->store->findByProductID($request->product_id);

        if($result->quantity < $request->quantity) {

            return redirect()->back()->withErrors('Số lượng hàng trong kho không đủ ');

        } else {
            $result->quantity = $result->quantity - $request->quantity;

            $this->bill->create($request->all());

            $store_final = json_decode(json_encode($result ,true),true);

            $this->store->update($store->where('id',$store_final['id']), $store_final);

            return redirect()->route('admin.bill.bill.index')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('bill::bills.title.bills')]));

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bill $bill
     * @return Response
     */
    public function edit(Bill $bill)
    {
        return view('bill::admin.bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Bill $bill
     * @param  UpdateBillRequest $request
     * @return Response
     */
    public function update(Bill $bill, UpdateBillRequest $request)
    {
        $this->bill->update($bill, $request->all());

        return redirect()->route('admin.bill.bill.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('bill::bills.title.bills')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bill $bill
     * @return Response
     */
    public function destroy(Bill $bill)
    {
        $this->bill->destroy($bill);

        return redirect()->route('admin.bill.bill.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('bill::bills.title.bills')]));
    }
}
