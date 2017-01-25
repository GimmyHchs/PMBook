<?php

namespace App\Auth;

use Illuminate\Notifications\Notifiable;
use Hchs\Judge\Permission\AuthEloquent as Authenticatable;
use App\Project\Project;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    protected $fillable = [
        'name', 'project_prefix', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /*------------------------------------------------------------------------**
    ** Relations
    **------------------------------------------------------------------------*/

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function ownProjects()
    {
        return $this->hasMany(Project::class, 'creator_id');
    }
    /*------------------------------------------------------------------------**
    ** Method
    **------------------------------------------------------------------------*/
    public function joinProject($project)
    {
        return $this->projects()->syncWithoutDetaching([$project->id]);
    }
    public function joinProjects($projects)
    {
        return $this->projects()->syncWithoutDetaching($projects->pluck('id')->toArray());
    }
    public function createProject($project)
    {
        if($project instanceof Project)
        {
            if($project->getDirty()){
                return $this->ownProjects()->save($project);
            }else {
                return $project->touch();
            }
        }elseif (is_array($project)) {
            $project = $this->newInstance($project);
            return $this->createProject($project);
        }
    }
    public function toSafeArray()
    {
        return array_only($this->toArray(),[
            'name',
            'project_prefix',
        ]);
    }
}
