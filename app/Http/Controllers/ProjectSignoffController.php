<?php

namespace App\Http\Controllers;

use App\Mail\ProjectSignoffNotif;
use App\Models\ProjectSignoff;
use App\Models\ProjectSignoffTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProjectSignoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
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
    public function dispatch(ProjectSignoff $signoff) {
        $user = $signoff->entity->project->client->mainContact;
        Mail::to($user->email)->send(new ProjectSignoffNotif($user, $signoff));
    }

    /**
     * Shows the form for a client to sign off the phase.
     *
     * @param \App\Models\ProjectSignoff $signoff
     */
    public function showSignoff(ProjectSignoff $signoff) {
        return view('static.signoff', [$signoff]);
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
