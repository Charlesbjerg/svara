<?php

namespace App\Http\Controllers\Pipeline;

use App\Models\PipelinePhase;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Repositories\ProjectRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectPipelineController extends Controller
{

    /**
     * @var ProjectRepositoryInterface
     */
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function show(Project $project)
    {
        // Load pipeline data
        $project->load('pipeline');
        $phases = $project->pipeline;

        // Fetching entity data manually - Eloquent doesn't return pivot id
        $phases->each(function($item, $key){
            $item->entities = $this->projectRepository->getPipelineEntities($item);
        });

        return response()->json($phases);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PipelinePhase  $projectPipeline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PipelinePhase $projectPipeline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PipelinePhase  $projectPipeline
     * @return \Illuminate\Http\Response
     */
    public function destroy(PipelinePhase $projectPipeline)
    {
        //
    }
}
