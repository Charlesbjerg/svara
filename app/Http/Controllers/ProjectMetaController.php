<?php

namespace App\Http\Controllers;

use App\Models\ProjectMeta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $metaOptions = DB::table('project_meta_options')->get();
        $metaOptions->each(function($item) {
            $item->valueType = $item->value_type;
        });
        return response()->json($metaOptions);
    }

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
     * @param  \App\Models\ProjectMeta  $projectMeta
     * @return JsonResponse
     */
    public function show(ProjectMeta $projectMeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectMeta  $projectMeta
     * @return JsonResponse
     */
    public function update(Request $request, ProjectMeta $projectMeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectMeta  $projectMeta
     * @return JsonResponse
     */
    public function destroy(ProjectMeta $projectMeta)
    {
        //
    }
}
