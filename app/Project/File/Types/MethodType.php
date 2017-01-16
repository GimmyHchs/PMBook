<?php

namespace App\Project\File\Types;

use App\Core\Eloquent;
use App\Project\File\Method;

class MethodType extends Eloquent implements TypeInterface
{
    protected $table = "method_types";
    protected $fillable = [
        'name',             //類型名稱
        'description',      //類型描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function children()
    {
        return $this->hasMany(Method::class);
    }
    /*------------------------------------------------------------------------**
    ** methods
    **------------------------------------------------------------------------*/
    public function addChild($method)
    {
        return $this->children()->save($method);
    }
}
