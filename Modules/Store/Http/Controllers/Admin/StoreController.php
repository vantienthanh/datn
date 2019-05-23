<?php

namespace Modules\Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Product\Repositories\ProductRepository;
use Modules\Store\Entities\Store;
use Modules\Store\Http\Requests\CreateStoreRequest;
use Modules\Store\Http\Requests\UpdateStoreRequest;
use Modules\Store\Repositories\StoreRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class StoreController extends AdminBaseController
{
    /**
     * @var StoreRepository
     */
    private $store;
    private $product;

    public function __construct(StoreRepository $store, ProductRepository $product)
    {
        parent::__construct();

        $this->store = $store;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $stores = $this->store->all();

        return view('store::admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = $this->product->all();
        return view('store::admin.stores.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStoreRequest $request
     * @return Response
     */
    public function store(CreateStoreRequest $request)
    {
        $this->store->create($request->all());

        return redirect()->route('admin.store.store.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('store::stores.title.stores')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Store $store
     * @return Response
     */
    public function edit(Store $store)
    {
        return view('store::admin.stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Store $store
     * @param  UpdateStoreRequest $request
     * @return Response
     */
    public function update(Store $store, UpdateStoreRequest $request)
    {
        $this->store->update($store, $request->all());

        return redirect()->route('admin.store.store.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('store::stores.title.stores')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Store $store
     * @return Response
     */
    public function destroy(Store $store)
    {
        $this->store->destroy($store);

        return redirect()->route('admin.store.store.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('store::stores.title.stores')]));
    }
}
