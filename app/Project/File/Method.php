<?php

namespace App\Project\File;

use App\Project\File\Types\MethodType;

class Method extends FileEloquent
{
    protected $table = 'methods';
    protected $fillable = [
        'file_id',
        'name',                 // 方法名稱
        'type',                 // 方法類型
        'description',          // 方法描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function type()
    {
        return $this->belongsTo(MethodType::class, 'method_type_id');
    }
    /*------------------------------------------------------------------------**
    ** Methods
    **------------------------------------------------------------------------*/
    public function assignFile($file)
    {
        return $this->file()->associate($file)->save();
    }
    public function assignType($type)
    {
        return $this->type()->associate($type)->save();
    }
    public function getUsers()
    {
        if($this->file)
        {
            return $this->file->getUsers();
        }
    }
}
