<?php

namespace Modules\Product\Repositories\Eloquent;

use Modules\Product\Events\ProductWasCreated;
use Modules\Product\Events\ProductWasDeleted;
use Modules\Product\Events\ProductWasUpdated;
use Modules\Product\Repositories\ProductRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{
    public function create($data)
    {
        $author = $this->model->create($data);
        event(new ProductWasCreated($author, $data));
        return $author;
    }
    public function update($author, $data)
    {
        $author->update($data);
        event(new ProductWasUpdated($author, $data));
        return $author;
    }
    public function destroy($author)
    {
        event(new ProductWasDeleted($author));
        return $author->delete();
    }
}
