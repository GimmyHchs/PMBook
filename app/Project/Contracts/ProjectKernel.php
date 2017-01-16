<?php
namespace App\Project\Contracts;

interface ProjectKernel {

    /**
     * 跟專案有關的Model，都必須能夠取得users
     *
     * @return void
     */
    public function getUsers();

}
