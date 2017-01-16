<?php

namespace App\Project\File;

use Illuminate\Database\Eloquent\Model;

class Method extends FileEloquent
{
    protected $table = "methods";
    protected $fillable =[
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
    /*------------------------------------------------------------------------**
    ** Methods
    **------------------------------------------------------------------------*/
    public function assignFile($file)
    {
        return $this->file()->associate($file)->save();
    }
}
