<?php

namespace Modules\Bill\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface BillRepository extends BaseRepository
{
    public function getBy30Day ();
    public function getBy12Month ();
}
