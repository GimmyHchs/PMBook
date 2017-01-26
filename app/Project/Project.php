<?php

namespace App\Project;

use App\Auth\User;

class Project extends ProjectEloquent
{
    protected $table = 'projects';
    protected $fillable = [
        'creator_id',               //關聯創建者
        'name',                     //專案名稱
        'prefix',                   //專案前綴
        'nick',                     //專案代號
        'description',              //專案描述
    ];
    protected $appends = [
        'creator_name',             //建立者名稱
    ];
    protected $hidden = [
        'creator',
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
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    /*------------------------------------------------------------------------**
    ** Accessors
    **------------------------------------------------------------------------*/
    public function getCreatorNameAttribute()
    {
        if($this->creator)
            return $this->creator->name;
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
