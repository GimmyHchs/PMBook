<?php

namespace App\Project\File;

use App\Project\Folder;
use App\Project\File\Types\FileType;

class File extends FileEloquent
{
    protected $table = 'files';
    protected $fillable = [
        'folder_id',
        'name',                     //檔案名稱
        'type',                     //檔案類型
        'description',              //檔案描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function methods()
    {
        return $this->hasMany(Method::class);
    }
    public function type()
    {
        return $this->belongsTo(FileType::class, 'file_type_id');
    }

    /*------------------------------------------------------------------------**
    ** Methods
    **------------------------------------------------------------------------*/
    public function assignFolder($folder)
    {
        return $this->folder()->associate($folder)->save();
    }
    public function addMember($member)
    {
        return $this->members()->save($member);
    }
    public function addMethod($method)
    {
        return $this->methods()->save($method);
    }
    public function assignType($type)
    {
        return $this->type()->associate($type)->save();
    }
    public function getUsers()
    {
        if($this->folder)
        {
            return $this->folder->getUsers();
        }
    }
}
