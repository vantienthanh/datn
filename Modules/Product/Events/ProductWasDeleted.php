<?php
/**
 * Created by PhpStorm.
 * User: thanhvan
 * Date: 5/19/2019
 * Time: 6:01 PM
 */

namespace Modules\Product\Events;


use Modules\Media\Contracts\DeletingMedia;
use Modules\Product\Entities\Product;

class ProductWasDeleted implements DeletingMedia
{
    /**
     * @var Author
     */
    private $author;
    public function __construct(Product $author)
    {
        $this->author = $author;
    }
    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->author->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->author);
    }
}