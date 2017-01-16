<?php

namespace App\Project\File\Types;

use App\Core\Eloquent;
use App\Project\File\File;

class FileType extends Eloquent implements TypeInterface
{
    protected $table = "file_types";
    protected $fillable = [
        'name',             //類型名稱
        'description',      //類型描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function children()
    {
        return $this->hasMany(File::class);
    }
    /*------------------------------------------------------------------------**
    ** methods
    **------------------------------------------------------------------------*/
    public function addChild($file)
    {
        return $this->children()->save($file);
    }
}
