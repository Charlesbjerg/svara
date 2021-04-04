<?php

namespace App\Http\Controllers\Pipeline;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * Class DocumentController
 * @package App\Http\Controllers\Pipeline
 */
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $documents = Document::where('pipeline_entity_id', $request->input('pipeline_entity_id'))->get();
        return response()->json($documents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // Setup new entity
        $document = new Document($request->all());

        // Validate file, if it fails return errors
        $validation = Validator::make($request->all(), array(
            'file' => 'image|max:15000',
        ));
        if ($validation->fails()) {
            return response()->json($validation->errors->first(), 400);
        }

        // Grab project ID
        $project = DB::table('projects')
                    ->join('pipeline_phases', 'projects.id', '=', 'pipeline_phases.project_id')
                    ->join('project_pipelines_to_entities', 'pipeline_phases.id', '=', 'project_pipelines_to_entities.pipeline_id')
                    ->where('project_pipelines_to_entities.id', '=', $request->input('pipeline_entity_id'))->first();

        // Setup file path - Must be in project folder
        $file = $request->file('file');
        $path = 'uploads/' . $project->id;
        $filename = sha1(time().time());

        // Save file
        $uploadedPath = $file->storeAs($path, $filename);

        // Save document entity
        $document->path = $uploadedPath;
        $document->file_type = pathinfo($uploadedPath, PATHINFO_EXTENSION);
        $document->save();

        // Send response
        if ($uploadedPath) {
            return response()->json([
                'message' => 'success',
                'file' => $document,
            ], 200);
        } else {
            return response()->json('error', 400);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    /**
     * Downloads a file stored on disk, sending the appropriate
     * headers.
     *
     * @
     */
    public function download(Document $document) {
        return Storage::download($document->getSystemPath());
    }

}
