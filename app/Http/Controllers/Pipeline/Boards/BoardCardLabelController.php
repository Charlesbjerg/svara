<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCardLabel;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardCardLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $labels = BoardCardLabel::all();
        return response()->json($labels);
    }

    // TODO: The below methods will need writing only if customisable labels are being added.

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardCardLabel  $boardCardLabel
     * @return JsonResponse
     */
    public function show(BoardCardLabel $boardCardLabel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardCardLabel  $boardCardLabel
     * @return JsonResponse
     */
    public function update(Request $request, BoardCardLabel $boardCardLabel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardCardLabel  $boardCardLabel
     * @return JsonResponse
     */
    public function destroy(BoardCardLabel $boardCardLabel)
    {
        //
    }
}
