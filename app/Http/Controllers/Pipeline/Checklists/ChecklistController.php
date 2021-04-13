<?php

namespace App\Http\Controllers\Pipeline\Checklists;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $entityId)
    {
        $checklists = Checklist::where('pipeline_entity_id', $entityId)->get();
        return response()->json($checklists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(int $entityId, Request $request)
    {
        $checklist = new Checklist($request->all());
        $checklist->pipeline_entity_id = $entityId;
        $checklist->save();
        return response()->json($checklist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Checklist $checklist)
    {
        $checklist->load(['pipelinePhase', 'items']);
        return response()->json($checklist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Checklist $checklist)
    {
        $checklist->fill($request->all());
        $checklist->save();
        return response()->json($checklist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checklist  $checklist
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return sendTrueResponse();
    }
}
