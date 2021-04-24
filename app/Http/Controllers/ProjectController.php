<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\ProjectRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    private $projectRepo;

    public function __construct(ProjectRepositoryInterface $projectRepo) {
        $this->projectRepo = $projectRepo;
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $projects = $this->projectRepo->getProjects();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = $this->projectRepo->create($request->all());
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Project $project)
    {
        $project->load(['client', 'state', 'pipeline', 'staff', 'messageThreads', 'meta']);
        $project->messageThreads->filter(function($thread) {
//            print('<pre>'.print_r([$thread, Auth::user()], true).'</pre>');
            if ((Auth::user()->isClient() && $thread->sharedWithClient) || Auth::user()->isStaff()) {
                return true;
            } else {
                return false;
            }
        });
//        dd($project->messageThreads);
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Returns all staff members for a given project
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function allStaffMembers(Project $project) {
        // TODO: Should fetch all staff for a project, not just the lead
        // Only fetching lead to help setup frontend as relations don't exist yet
        return response()->json(['staff' => [0 => $project->projectLead]]);
    }

    /**
     * Fetches all the documents from entities in the projects
     * pipeline.
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function documents(Project $project) {

        // Fetch all documents from entities
        $documentEntities = DB::table('pipeline_phases')->select('documents.*')
            ->join('project_pipelines_to_entities', 'project_pipelines_to_entities.pipeline_id', '=', 'pipeline_phases.id')
            ->join('documents', 'project_pipelines_to_entities.id', '=', 'documents.pipeline_entity_id')
            ->where('pipeline_phases.project_id', '=', $project->id)->get();

        // Replace created_at keys to be camelcase
        $documentEntities->each(function($document) {
            $document->createdAt = $document->created_at;
        });

        return response()->json($documentEntities);
    }

    /**
     * Returns a filter collection of Projects.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function filter(Request $request) {
        $projects = $this->projectRepo->filterProjects($request);
        return response()->json($projects);
    }

}
