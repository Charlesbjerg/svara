<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectState;
use Illuminate\Http\Request;

class ProjectStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $states = ProjectState::all();
        return response()->json($states);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  \App\Models\ProjectState  $projectState
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectState $projectState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectState  $projectState
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectState $projectState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectState  $projectState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectState $projectState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectState  $projectState
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectState $projectState)
    {
        //
    }

    /**
     * Updates the label attached to a project
     *
     * @param Project $project
     */
    public function updateProject(Request $request, Project $project) {
        $project->project_state_id = $request->input('state_id');
        $project->save();
        return sendTrueResponse();
    }

}
