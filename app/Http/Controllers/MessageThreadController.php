<?php

namespace App\Http\Controllers;

use App\Models\MessageThread;
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
        $thread->save();
        $project = Project::where('id', $request->input('projectId'))->first();
        $thread->project()->associate($project);
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
        $thread->message->each(function($message) {
            $message->load(['attachments']);
        });
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
