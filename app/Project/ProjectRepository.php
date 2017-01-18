<?php
namespace App\Project;
use App\Core\Repository;
use App\Auth\User;

/**
 *  負責處理 Project Query的邏輯.
 */
class ProjectRepository extends Repository
{
    /**
     * @var Project
     */
    protected $model;

    /**
     *  建構子依賴注入 Project.
     *
     *  @param Project::class
     */
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/
    /**
     *  回傳以Slug為搜尋目標的Project.
     *
     *  @return Collection|Builder|null
     */
    public function getFromNick(String $nick)
    {
        return $this->model->whereSlug(urlencode($nick))->get();
    }

    /**
     *  在某一個User下建立Project.並回傳該Project.
     *
     *  建立的Project內容值以傳入的data為基準.
     *  $data = ['title'=>'hello', ... ];
     *
     *  @return Project
     */
    public function createFromUser($data, User $user)
    {
        $project = $this->create($data);
        $user->addProject($project);
        return $project;
    }
}
