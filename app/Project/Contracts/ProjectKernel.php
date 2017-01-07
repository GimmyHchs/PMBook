<?php
namespace App\Project\Contracts;

interface ProjectKernel {

    /**
     * 跟專案有關的Model，都必須有users關聯
     *
     * @return void
     */
    public function users();

}
