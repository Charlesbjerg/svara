<?php

namespace App\Repositories;

use App\Events\ProjectCreated;
use App\Models\Board;
use App\Models\Client;
use App\Models\Checklist;
use App\Models\PipelineEntity;
use App\Models\PipelinePhase;
use App\Models\Project;
use App\Models\ProjectMeta;
use App\Models\ProjectSignoff;
use App\Models\ProjectState;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectRepository implements ProjectRepositoryInterface {

    /**
     * Returns a collection of projects available to the user,
     * projects they are not involved with do not appear.
     *
     * @return Collection
     */
    public function getProjects(): Collection
    {
        return Project::all()->load(['client', 'state', 'pipeline', 'currentPhase', 'staff', 'meta']);
    }

    /**
     * Creates a new project with all relational and pipeline
     * data sent from 'Create Project' wizard.
     * 
     * @param array $data
     * @return Project $project
     */
    public function create(array $data): Project {

        // FIXME: SQL error when setting up project_pipelines_to_entities
        // pipeline_entity_pipeline_phase

        // Create initial project
        $project = new Project($data);

        // Associate Client
        $client = Client::where('name', $data['client'])->first();
        $project->client()->associate($client);

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
        $firstPhase = $phases->first();
        $project->currentPhaseId = $firstPhase->id;
        $project->save();

        // TODO: Save project meta data
        $this->saveProjectMeta($project, $data);

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
     * @return mixed $phases
     */
    public function createPipeline(array $data, int $projectId) {

        $phases = collect();

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
                $this->createEmptyEntity($entity, $phase);
            }
            // TODO: Check if a pivot model is setup, may need this to save data correctly
            $phase->entities()->saveMany($entities);
            $phases->push($phase);
        }

        return $phases;

    }

    /**
     * Creates an empty instance of an entity and saves to DB ready
     * for pipeline_entity_id to be added.
     *
     * @param array $entity
     * @return mixed $entity
     */
    private function createEmptyEntity(array $entity, $phase) {

        switch ($entity['name']) {
            case "checklists":
                $entity = new Checklist([
                    'name' => $phase->name . ' Checklist',
                    'pipeline_entity_id' => $phase->id,
                ]);
                $entity->save();
                break;
            case "boards":
                $entity = new Board([
                    'name' => $phase->name . ' Checklist',
                    'pipeline_entity_id' => $phase->id,
                ]);
                $entity->save();
                break;
            case "sign-off":
                $entity = new ProjectSignOff([
                    'name' => $phase->name . ' Checklist',
                    'pipeline_entity_id' => $phase->id,
                ]);
                $entity->save();
                break;
        }

        return $entity;

    }

    /**
     * Saves any provided meta data for the newly created
     * project.
     *
     * @param Project $project
     * @param array $data
     * @return void
     */
    public function saveProjectMeta(Project $project, array $data) {

        $options = DB::table('project_meta_options')->get();
        foreach($options as $option) {
            if (isset($data[$option->key])) {
                $meta = new ProjectMeta([
                    'value_type' => $option->value_type,
                    'sortable' => $option->sortable,
                ]);
                $meta->key = $option->key;
                $meta->value = $data[$option->key];
                $meta->project_id = $project->id;
                $meta->save();
            }
        }

    }

    /**
     * Returns all of the entities for a pipeline phase, including
     * their pivot id.
     *
     * @param PipelinePhase $phase
     * @return mixed
     */
    public function getPipelineEntities(PipelinePhase $phase) {

        $entities = DB::table('project_pipelines_to_entities')
            ->selectRaw('*, project_pipelines_to_entities.id as pid')
            ->join('pipeline_entities', 'project_pipelines_to_entities.entity_id', '=', 'pipeline_entities.id')
            ->where('project_pipelines_to_entities.pipeline_id', $phase->id)->get();

        // Check if sign-offs have been signed off.
        $entities->each(function ($entity) {
            if ($entity->component_name === 'sign-off') {
                $signedOff = DB::table('project_signoffs')
                    ->where('pipeline_entity_id', $entity->pid)
                    ->whereNotNull('signoff_timestamp')->first();
                if ($signedOff !== null) {
                    $entity->signedOff = true;
                }
            }
            return $entity;
        });

        return $entities;

    }

    /**
     * Filters down a list of projects from request data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterProjects(Request $request) {

        $filters = [];

        if (isset($request['name'])) {
            $filters[] = ['name', 'like', '%'.$request['name'].'%'];
        }

        if (isset($request['client'])) {
            $filters[] = ['client_id', $request['client']];
        }

//        if (isset($request['accountManager'])) {
//            $filters[] = ['account_manager_id', $request['accountManager']];
//        }

        if (isset($request['projectLead'])) {
            $filters[] = ['project_lead_id', $request['projectLead']];
        }

        return Project::with(['client', 'state', 'pipeline', 'currentPhase', 'staff', 'meta'])->where($filters)->get();

    }

}