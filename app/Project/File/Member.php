<?php

namespace App\Project\File;

use App\Project\File\Types\MemberType;

class Member extends FileEloquent
{
    protected $table = "members";
    protected $fillable =[
        'file_id',
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
    public function type()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
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
}
