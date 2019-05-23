<?php

namespace Modules\Product\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Image\Imagy;
use Modules\Media\Support\Traits\MediaRelation;
class Product extends Model
{
//    use Translatable;
    use MediaRelation;
    protected $table = 'product';
//    public $translatedAttributes = [];
    protected $fillable = ['name','description','cost','status'];

    public function getImage()
    {
        $file = $this->files()->first();
        if($file) {
            $imagy = app(Imagy::class);
//            dd($imagy);
            return $imagy->getThumbnail($file->path, 'mediumThumb');
        }
        return null;
    }
}
