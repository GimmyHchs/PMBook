<?php
namespace App\Project;

use App\Core\Eloquent;
use App\Project\Contracts\ProjectKernel;

/**
 * Project類別核心
 */
abstract class ProjectEloquent extends Eloquent implements ProjectKernel
{

}
