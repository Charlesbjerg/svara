<?php

namespace App\Repositories;

use App\Events\ProjectCreated;
use App\Models\Client;
use App\Models\PipelineEntity;
use App\Models\PipelinePhase;
use App\Models\Project;
use App\Models\ProjectState;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectRepositoryInterface {

    /**
     * Returns a collection of projects available to the user,
     * projects they are not involved with do not appear.
     *
     * @return Collection
     */
    public function getProjects(): Collection
    {
        return Project::all()->load(['client', 'state']);
    }

    /**
     * Creates a new project with all relational and pipeline
     * data sent from 'Create Project' wizard.
     * 
     * @param array $data
     * @return Project $project
     */
    public function create(array $data): Project {

        // Create initial project
        $project = new Project($data);

        // Associate Client
        $client = Client::where('name', $data['client'])->first();
        $project->client()->associate($client);

        // Set initial project state
        $state = ProjectState::first();
        // FIXME: Figure out correct relationship and method for saving these
        // $project->state()->associate($state);
        $project->projectStateId = $state->id;

        $project->save();

        // Fetch User models from array of id's
        $staffIds = array();
        foreach($data['staff'] as $member) {
            $staffIds[] = $member['id'];
        }
        $projectStaff = User::whereIn('id', $staffIds)->get();

        // Add extra team members to this project
        $project->staff()->saveMany($projectStaff);

        // Setup pipeline
        $phases = $this->createPipeline($data, $project->id);
        $project->pipeline()->saveMany($phases);

        // Trigger notification event 
        ProjectCreated::dispatch($project);

        return $project;

    }

    /**
     * Assembles all the phases and entities for a pipeline
     * and returns as an array to be associated with the 
     * project.
     * 
     * @param array $data
     * @param int $projectId
     * @return array $phases
     */
    public function createPipeline(array $data, int $projectId) {

        $phases = array();

        // Loop through each entity
        foreach ($data['pipeline'] as $key => $pipeline) {
            $phase = new PipelinePhase([
                'name' => $pipeline['name'], 
                'sort_order' => $key,
                'project_id' => $projectId
            ]);
            $phase->save();
            $entities = array();
            foreach ($pipeline['entities'] as $entity) {
                $entities[] = PipelineEntity::where('id', $entity['id'])->first();
            }
            $phase->entities()->saveMany($entities);
            $phases[] = $phase;
        }

        return $phases;

    }

}