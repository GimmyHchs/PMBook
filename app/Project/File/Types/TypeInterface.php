<?php
namespace App\Project\File\Types;

/**
 * Type類別型 interface
 */
interface TypeInterface
{
    /**
     * 所有Type 必須能夠取得子關聯
     *
     * EX: MemberType 可以取得 children (members)
     * @return Relation
     */
    public function children();

    /**
     * 所有Type 必須能夠將子類型，與自己關聯
     *
     * EX: MemberType 可以 addChild (member)
     */
    public function addChild($child);
}
