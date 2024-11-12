<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;

class TaskController extends Controller
{
    protected $taskService;
    protected $user;
    protected $client;
    protected $project;

    public function __construct(
        TaskService $taskService,
        User $user,
        Client $client,
        Project $project,
    ) {
        // $this->middleware('auth');
        $this->taskService = $taskService;
        $this->user = $user;
        $this->client = $client;
        $this->project = $project;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inputData = $request->all() ?: [];
        $projects = $this->project->pluck('title','id');
        $clients = $this->client->pluck('client_name','id');
        $status = TaskStatusEnum::cases();
        $tasks = $this->taskService->getTaskDetails($inputData);
        $totalStatusCount = array_sum(array_column($tasks->toArray(), 'status_count'));
        
        return view('tasks.index',compact('tasks', 'projects', 'status', 'clients', 'inputData', 'totalStatusCount'));
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
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
