<?php

namespace App\Http\Controllers\Pipeline\Signoffs;

use App\Http\Controllers\Controller;
use App\Models\ProjectSignoffTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectSignoffTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $templates = ProjectSignoffTemplate::all();
        $templates->each(function($template) {
            $template->snippet = Str::words(nl2br($template->message), 30);
            $template->message = nl2br($template->message);
        });
        return response()->json($templates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new ProjectSignoffTemplate($request->all());
        $template->save();
        return response()->json($template);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectSignoffTemplate  $projectSignoffTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectSignoffTemplate $projectSignoffTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectSignoffTemplate  $projectSignoffTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectSignoffTemplate $projectSignoffTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectSignoffTemplate  $projectSignoffTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectSignoffTemplate $projectSignoffTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectSignoffTemplate  $projectSignoffTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectSignoffTemplate $projectSignoffTemplate)
    {
        //
    }
}
