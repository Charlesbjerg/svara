<?php

namespace App\Http\Controllers;

use App\Models\MessageThreadMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageThreadMessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $message = new MessageThreadMessage($request->all());
        $message->thread_id = $request->input('threadId');
        $message->user_id = $request->input('userId');
        $message->save();
        // TODO: If there's an attachment, add it
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param MessageThreadMessage $message
     * @return JsonResponse
     */
    public function show(MessageThreadMessage $message)
    {
        $message->load(['attachments']);
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param MessageThreadMessage $message
     * @return JsonResponse
     */
    public function update(Request $request, MessageThreadMessage $message)
    {
        $message->fill($request->all());
        $message->save();
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MessageThreadMessage $message
     * @return JsonResponse
     */
    public function destroy(MessageThreadMessage $message)
    {
        $message->delete();
        return sendTrueResponse();
    }
}
