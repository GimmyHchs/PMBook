<?php

namespace App\Project\File\Types;

use App\Core\Eloquent;
use App\Project\File\Member;

class MemberType extends Eloquent implements TypeInterface
{
    protected $table = "member_types";
    protected $fillable = [
        'name',             //類型名稱
        'description',      //類型描述
    ];
    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/
    public function children()
    {
        return $this->hasMany(Member::class);
    }
    /*------------------------------------------------------------------------**
    ** methods
    **------------------------------------------------------------------------*/
    public function addChild($member)
    {
        return $this->children()->save($member);
    }
}
