<?php

namespace App\Project;

class Project extends ProjectEloquent
{
    protected $table = 'projects';
    protected $fillable = [
        'name',                     //專案名稱
        'nick',                     //專案代號
        'description',              //專案描述
    ];

    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    /*------------------------------------------------------------------------**
    ** methods
    **------------------------------------------------------------------------*/
    public function addFolder($folder)
    {
        return $this->folders()->save($folder);
    }
}
