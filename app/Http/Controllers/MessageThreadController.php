<?php

namespace App\Http\Controllers;

use App\Models\MessageThread;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageThreadController extends Controller
{
    /**
     * Displays all message threads for a project.
     *
     * @param int $projectId
     * @return JsonResponse
     */
    public function index(int $projectId)
    {
        return response()->json(MessageThread::where('project_id', $projectId)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $thread = new MessageThread($request->all());
        $project = Project::where('id', $request->input('projectId'))->first();
        $thread->project()->associate($project);
        $thread->save();
        return response()->json($thread);
    }

    /**
     * Display the specified resource.
     *
     * @param MessageThread $thread
     * @return JsonResponse
     */
    public function show(MessageThread $thread)
    {
        $thread->load(['messages']);
        if ($thread->messages) {
            $thread->messages->each(function($message) {
                // TODO: Add attachments when built
                $message->load(['postedBy']);
            });
        }
        return response()->json($thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MessageThread $thread
     * @return JsonResponse
     */
    public function update(Request $request, MessageThread $thread)
    {
        $thread->fill($request->all());
        $thread->save();
        return response()->json($thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MessageThread $thread
     * @return JsonResponse
     */
    public function destroy(MessageThread $thread)
    {
        $thread->delete();
        return sendTrueResponse();
    }
}
