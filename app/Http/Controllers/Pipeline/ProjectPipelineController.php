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
     * @param  \App\Models\PipelinePhase  $pipelinePhase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PipelinePhase $pipelinePhase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PipelinePhase  $pipelinePhase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PipelinePhase $pipelinePhase)
    {
        //
    }

    /**
     * Marks a pipeline phase as complete
     *
     * @param PipelinePhase $pipelinePhase
     * @return JsonResponse
     */
    public function completePhase(PipelinePhase $pipelinePhase) {

        // Mark current phase as complete
        $pipelinePhase->complete = true;
        $pipelinePhase->save();

        // Find outstanding phases
        $phases = PipelinePhase::where('project_id', $pipelinePhase->project_id)->get();
        $nextPhases = $phases->skipUntil(function($item) {
            return $item->complete === 0;
        });

        // Grab the next (first) one and update the project
        $nextPhase = $nextPhases->first();
        if ($nextPhase) {
            $project = $nextPhase->project;
            $project->current_phase_id = $nextPhase->id;
            $project->save();
            return response()->json([
                'nextPhase' => $nextPhase,
            ]);
        } else {
            return sendTrueResponse();
        }



    }
    
}
