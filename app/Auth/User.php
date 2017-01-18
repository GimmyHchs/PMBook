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
}
