<?php

namespace App\Repositories;

use App\Models\PipelinePhase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Project;
use Illuminate\Http\Request;

interface ProjectRepositoryInterface {

    /**
     * Returns a collection of projects available to the user,
     * projects they are not involved with do not appear.
     *
     * @return Collection
     */
    public function getProjects() : Collection;

    /**
     * Creates a new project with all relational and pipeline
     * data sent from 'Create Project' wizard.
     * 
     * @param array $data
     * @return Project $project
     */
    public function create(array $data) : Project;

    /**
     * Assembles all the phases and entities for a pipeline
     * and returns as an array to be associated with the 
     * project.
     * 
     * @param array $data
     * @param int $projectId
     * @return Collection $phases
     */
    public function createPipeline(array $data, int $projectId);

    /**
     * Returns all of the entities for a pipeline phase, including
     * their pivot id.
     *
     * @param PipelinePhase $phase
     * @return mixed
     */
    public function getPipelineEntities(PipelinePhase $phase);

    /**
     * Filters down a list of projects from request data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterProjects(Request $request);

}