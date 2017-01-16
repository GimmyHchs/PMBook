<?php
namespace App\Project\File;

use App\Project\ProjectEloquent;

/**
 * File類別核心
 */
abstract class FileEloquent extends ProjectEloquent
{
    /**
     * 所有FileEloquent 必須有類型關聯
     */
    abstract public function type();

    /**
     * 所有FileEloquent 必須能夠被賦予類型
     */
    abstract public function assignType($type);
}
