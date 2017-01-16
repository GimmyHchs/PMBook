<?php

namespace App\Project;

use App\Project\File\File;

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
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /*------------------------------------------------------------------------**
    ** Methods
    **------------------------------------------------------------------------*/
    public function assignProject($project)
    {
        return $this->project()->associate($project)->save();
    }

    public function addFile($file)
    {
        return $this->files()->save($file);
    }
}
