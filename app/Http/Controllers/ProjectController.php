<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatusEnum;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use DataTables;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    protected $project;
    protected $user;
    protected $client;
    protected $projectService;

    public function __construct(
        ProjectService $projectService,
        Project $project,
        User $user,
        Client $client,
    ) {
        $this->projectService = $projectService;
        $this->project = $project;
        $this->user = $user;
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : JsonResponse|View
    {
        if ($request->ajax()) {
          return  $this->projectService->getProjectDetails();
        }

        return view('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // dd(auth()->user());
        $users = $this->user->pluck('name','id');
        $clients = $this->client->pluck('client_name','id');
        $projectStatus = ProjectStatusEnum::cases();
        
        return view('projects.edit', compact('project','projectStatus', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {   
        $productData = $request->validated();
        $productData['deadline_at'] = date('Y-m-d', strtotime($request->input('deadline_at')))    ;

        try {
            $project->update($productData);
            session()->flash('success', 'Product updated successfully.');
       } catch (\Exception $e) {
            session()->flash('error', 'Product update failed: ' . $e->getMessage());
       } 

       return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
