<?php

namespace App\Http\Controllers;

use App\Models\ProjectMeta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $meta = DB::table('project_meta_options')->insert([
            'key' => Str::snake($request->input('name')),
            'name' => $request->input('name'),
            'value_type' => $request->input('valueType'),
            'sortable' => $request->input('sortable'),
        ]);

        return response()->json($meta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectMeta  $meta
     * @return JsonResponse
     */
    public function show(ProjectMeta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectMeta  $meta
     * @return JsonResponse
     */
    public function update(Request $request, int $metaId)
    {
        $meta = DB::table('project_meta_options')->where('id', $metaId)->update([
            'key' => Str::snake($request->input('name')),
            'name' => $request->input('name'),
            'value_type' => $request->input('valueType'),
            'sortable' => $request->input('sortable'),
        ]);

        return response()->json($meta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectMeta  $meta
     * @return JsonResponse
     */
    public function destroy(ProjectMeta $meta)
    {
        $meta->delete();
        return sendTrueResponse();
    }
}
