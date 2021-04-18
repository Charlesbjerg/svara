<?php

namespace App\Http\Controllers\Pipeline\Signoffs;

use App\Http\Controllers\Controller;
use App\Mail\ProjectSignoffNotif;
use App\Models\Project;
use App\Models\ProjectSignoff;
use App\Models\ProjectSignoffTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProjectSignoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $pipelineEntityId)
    {
        $signoff = ProjectSignoff::where('pipeline_entity_id', $pipelineEntityId)->first();
        return response()->json($signoff);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $template = ProjectSignoffTemplate::where('id', $request->input('templateId'))->first();
        $signoff = new ProjectSignoff([
            'name' => $template->name,
            'message' => $template->message,
            'pipeline_entity_id' => $request->input('pipelineEntityId'),
        ]);
        $signoff->save();
        return response()->json($signoff);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectSignoff  $signoff
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ProjectSignoff $signoff)
    {
        return response()->json($signoff);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectSignoff  $signoff
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ProjectSignoff $signoff)
    {
        $signoff->fill($request->all());
        $signoff->save();
        return response()->json($signoff);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectSignoff  $signoff
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ProjectSignoff $signoff)
    {
        $signoff->delete();
        return sendTrueResponse();
    }

    /**
     * Sends a project sign off to the main contact of a client
     * via email.
     *
     * @return mixed|void
     */
    public function dispatchNotif(ProjectSignoff $signoff) {
        // Need to get client user account that is attached to the client for this project.
        $user = DB::table('users')
            ->select('users.*')
            ->join('clients', 'users.id', '=', 'clients.main_contact_id')
            ->join('projects', 'clients.id', '=', 'projects.client_id')
            ->join('pipeline_phases', 'projects.id', '=', 'pipeline_phases.project_id')
            ->join('project_pipelines_to_entities', 'pipeline_phases.id', '=', 'project_pipelines_to_entities.pipeline_id')
            ->where('project_pipelines_to_entities.id', '=', $signoff->pipeline_entity_id)
            ->first();
        Mail::to($user->email)->send(new ProjectSignoffNotification($user, $signoff));
        return sendTrueResponse();
    }

    /**
     * Shows the form for a client to sign off the phase.
     *
     * @param \App\Models\ProjectSignoff $signoff
     */
    public function showSignoff(ProjectSignoff $signoff) {
        $submitUrl = url("/api/projects/pipeline/signoffs/{$signoff->pipeline_entity_id}/signoff");
        return view('static.signoff', [
            'signoff' => $signoff,
            'submitUrl' => $submitUrl
        ]);
    }

    /**
     * Processes the sign off form for a client.
     *
     *
     */
    public function signoff(Request $request, ProjectSignoff $signoff) {

        $request->validate([
            'signature' => 'string|required',
        ]);

        $signoff->signature = $request->input('signature');
        $signoff->signoff_timestamp = now();
        $signoff->save();

        return redirect('/');

    }

}
