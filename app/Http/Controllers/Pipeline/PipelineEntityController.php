<?php

namespace App\Http\Controllers\Pipeline;

use App\Models\PipelineEntity;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PipelineEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(PipelineEntity::all());
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
     * @param  \App\Models\PipelineEntity  $pipelineEntity
     * @return \Illuminate\Http\Response
     */
    public function show(PipelineEntity $pipelineEntity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PipelineEntity  $pipelineEntity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PipelineEntity $pipelineEntity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PipelineEntity  $pipelineEntity
     * @return \Illuminate\Http\Response
     */
    public function destroy(PipelineEntity $pipelineEntity)
    {
        //
    }
}
