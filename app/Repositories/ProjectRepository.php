<?php

namespace App\Repositories;
use App\Models\Project;

class ProjectRepository 
{
    /**
     * @var Project
     */
    protected $project;

    /**
     * ProjectRepository Constructor
     *
     * @param Project $project
     */
    public function __construct(Project $project) {
        $this->project = $project;
    }

    /**
     * Project create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->project->create($data);
    }

    /**
     *  Project update
     *
     * @param array $data
     * @param Project $project
     * @return void
     */
    public function update(array $data,  Project $project)
    {
        $project->update($data);
    }

    /**
     * Project delete
     *
     * @param Project $project
     * @return void
     */
    public function delete(Project $project)
    {
        $project->delete();
    }
} 