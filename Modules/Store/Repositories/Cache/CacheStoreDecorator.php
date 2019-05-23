<?php

namespace Modules\Store\Repositories\Cache;

use Modules\Store\Repositories\StoreRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStoreDecorator extends BaseCacheDecorator implements StoreRepository
{
    public function __construct(StoreRepository $store)
    {
        parent::__construct();
        $this->entityName = 'store.stores';
        $this->repository = $store;
    }
}
