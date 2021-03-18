<?php

namespace App\Http\Controllers\Pipeline;

use App\Models\PipelinePhase;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectPipelineController extends Controller
{
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
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project->load('pipeline');
        $phases = $project->pipeline;
        $phases->each(function($item, $key){
            $item->load('entities');
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
