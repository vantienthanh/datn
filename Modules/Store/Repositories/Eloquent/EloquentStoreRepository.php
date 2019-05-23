<?php

namespace Modules\Store\Repositories\Eloquent;

use Modules\Store\Repositories\StoreRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentStoreRepository extends EloquentBaseRepository implements StoreRepository
{
    public function findByProductID ($id) {
        return $this->model->where('product_id',$id)->get()->first();
    }
}
