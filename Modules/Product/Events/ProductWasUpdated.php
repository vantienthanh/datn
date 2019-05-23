<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 5/19/2019
 * Time: 6:01 PM
 */

namespace Modules\Product\Events;


use Modules\Media\Contracts\StoringMedia;
use Modules\Product\Entities\Product;

class ProductWasUpdated implements StoringMedia
{
    /**
     * @var Author
     */
    private $author;
    /**
     * @var array
     */
    private $data;
    public function __construct(Product $author, array $data)
    {
        $this->author = $author;
        $this->data = $data;
    }
    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->author;
    }
    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}