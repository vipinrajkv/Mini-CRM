<?php

namespace App\Repositories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TaskRepository
{
    /**
     * @var Task
     */
    protected $task;

    /**
     * TaskRepository Constructor
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Task create
     *
     * @param array $data
     * @return void
     */
    public function getTaskDetails(array $data)
    {
        $date = isset($data['date']) ? date('Y-m-d', strtotime($data['date'])) : '';
        $status = isset($data['status']) ? $data['status'] : '';
        // $user = isset($data['user']) ? $data['user'] : '';
        $project = isset($data['project']) ? $data['project'] : '';
        $client = isset($data['client']) ? $data['client'] : '';
        $search = isset($data['search']) ? $data['search'] : '';

        $query = $this->task->select(
         'tasks.title as tasks_title','tasks.description','tasks.status','tasks.deadline_at' ,'projects.title','clients.client_name',
         DB::raw('COUNT(DISTINCT tasks.id) as task_count'),
         DB::raw("COUNT(CASE WHEN '{$status}' = '' THEN 1 WHEN tasks.status = '{$status}' THEN 1 END) as status_count"))

            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->join('clients', 'clients.id', '=', 'tasks.client_id')
            ->join('projects', 'projects.id', '=', 'tasks.project_id');
        $query->when($date !== '', function ($query) use ($date) {
                $query->whereDate('tasks.deadline_at', $date);
            },
        );
        $query->when($status !== '' && $status !== 'all', function ($query) use ($status) {
            $query->where('tasks.status', $status);
        });

        $query->when($project !== '' && $project !== 'all', function ($query) use ($project) {
            $query->where('tasks.project_id', $project);
        });
        $query->when($client !== '' && $client !== 'all', function ($query) use ($client) {
            $query->where('tasks.client_id', $client);
        });
        $query->when($search !== '', function ($query) use ($search) {
            $query->where('tasks.title', 'like', '%' . $search . '%')
                  ->orWhere('tasks.description', 'like', '%' . $search . '%');
        });

        return $query->orderBy('tasks.deadline_at', 'desc')->groupBy('tasks.id','tasks.title','tasks.status','tasks.description','tasks.deadline_at', 'projects.title', 'clients.client_name')->get();
    }

    /**
     * Task create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->task->create($data);
    }

    /**
     *  Task update
     *
     * @param array $data
     * @param Task $task
     * @return void
     */
    public function update(array $data,  Task $task)
    {
        $task->update($data);
    }

    /**
     * Task delete
     *
     * @param Task $task
     * @return void
     */
    public function delete(Task $task)
    {
        $task->delete();
    }
}
