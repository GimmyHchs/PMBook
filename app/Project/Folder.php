<?php

namespace App\Project;

class Folder extends ProjectEloquent
{
    protected $table = 'folders';
    protected $fillable = [
        'project_id',
        'name',                     //資料夾名稱
        'description',              //資料夾描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignProject($project)
    {
        return $this->project()->associate($project)->save();
    }
}
