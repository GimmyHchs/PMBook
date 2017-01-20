<?php

namespace App\Project;

use App\Auth\User;

class Project extends ProjectEloquent
{
    protected $table = 'projects';
    protected $fillable = [
        'name',                     //專案名稱
        'prefix',                   //專案前綴
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
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /*------------------------------------------------------------------------**
    ** methods
    **------------------------------------------------------------------------*/
    public function addFolder($folder)
    {
        return $this->folders()->save($folder);
    }
    public function assignUser($user)
    {
        return $this->users()->syncWithoutDetaching([$user->id]);
    }
    public function getUsers()
    {
        return $this->users()->get();
    }
}
