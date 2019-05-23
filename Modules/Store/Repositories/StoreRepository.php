<?php

namespace Modules\Store\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface StoreRepository extends BaseRepository
{
    public function findByProductID ($id);
}
