<?php

namespace App\Http\Controllers\Pipeline\Checklists;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\ChecklistItem;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Checklist $checklist)
    {
        $checklist->load(['items']);
        return response()->json($checklist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Checklist $checklist, Request $request)
    {
        $item = new ChecklistItem($request->all());
        // TODO: Save relational data
        $item->checklist()->associate($checklist);
        $item->save();
        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistItem  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ChecklistItem $item)
    {
        $item->load(['assignedUser', 'createdBy']);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChecklistItem  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Checklist $checklist, ChecklistItem $item)
    {
        $item->fill(request()->all());
        $item->complete = request()->input('complete');
        // TODO: Save relational data
        $item->save();
        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistItem  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ChecklistItem $item)
    {
        $item->delete();
        return sendTrueResponse();
    }
}
