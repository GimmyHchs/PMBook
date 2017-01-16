<?php

namespace App\Project\File;

class Member extends FileEloquent
{
    protected $table = "members";
    protected $fillable =[
        'name',                 // 成員名稱
        'type',                 // 成員類型
        'description',          // 成員描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function file()
    {
        return $this->belongsTo(File::class);
    }
    /*------------------------------------------------------------------------**
    ** Methods
    **------------------------------------------------------------------------*/
    public function assignFile($file)
    {
        return $this->file()->associate($file)->save();
    }
}
