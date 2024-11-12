<?php
namespace App\Services;
use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskService
{
    protected $taskRepository;

    /**
     * TaskService Constructor
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Task create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    /**
     * Task update
     *
     * @param array $data
     * @param Task $task
     * @return void
     */
    public function update(array $data, Task $task)
    {
        return $this->taskRepository->update($data, $task);
    }

    /**
     * Task update
     *
     * @param array $data
     * @param Task $task
     * @return void
     */
    public function delete(Task $task)
    {
        return $this->taskRepository->delete($task);
    }    
    
    /**
    * Task create
    *
    * @param array $data
    * @return void
    */
   public function getTaskDetails(array $data)
   {
       return $this->taskRepository->getTaskDetails($data);
   }
}