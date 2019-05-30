<?php

namespace Modules\Bill\Repositories\Eloquent;

use Modules\Bill\Repositories\BillRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentBillRepository extends EloquentBaseRepository implements BillRepository
{
    public function getBy30Day () {
        return $this->model->where('status','finish')->take(30)->groupBy(DATE('created_at'))->get();
    }
}
