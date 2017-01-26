<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateRequest;
use App\Project\ProjectRepository;
use Auth;
use JavaScript;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projects;

    public function __construct(ProjectRepository $projects)
    {
        $this->projects = $projects;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return $this->projects->getAll()->get()->toArray();
        }
        $this->shareUserToJS();
        return view('project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        if($request->isFailed()) return $request->responseError();

        $project = $this->projects->getNew($request->all());
        Auth::user()->createProject($project);

        return response()->json(['ok' => true, 'project' => $project], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->projects->find($id);
        return response()->json(['ok' => true, 'project' => $project], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 刪除選取的 projects
     */
    public function selectedDelete(Request $request)
    {
        $projects = $this->projects->getModel()->find($request->ids);
        $this->projects->deleteMany($projects);

        return redirect('/project');
    }
}
