<?php

namespace Modules\Bill\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use Modules\Bill\Repositories\BillRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentBillRepository extends EloquentBaseRepository implements BillRepository
{

    public function getBy30Day () {
        return $this->model->select( DB::raw('sum(quantity) as totalQtt, DAY(created_at) as date'))->take(30)->groupBy(DB::raw('DAY(created_at)'))->get();
    }

    public function getBy12Month () {
        return $this->model->select( DB::raw('sum(quantity) as totalQtt, MONTH(created_at) as date'))->take(12)->groupBy(DB::raw('MONTH(created_at)'))->get();
    }
}
