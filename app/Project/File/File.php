<?php

namespace App\Project\File;

use Illuminate\Database\Eloquent\Model;
use App\Project\Folder;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
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
}
