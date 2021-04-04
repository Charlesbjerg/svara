<?php

namespace App\Http\Controllers;

use App\Models\MessageThreadAttachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageThreadAttachmentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $attachment = new MessageThreadAttachment($request->all());
        // TODO: Upload the file. 
        $attachment->save();
        return response()->json($attachment);
    }

    /**
     * Display the specified resource.
     *
     * @param MessageThreadAttachment $attachment
     * @return JsonResponse
     */
    public function show(MessageThreadAttachment $attachment)
    {
        return response()->json($attachment);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param MessageThreadAttachment $attachment
     * @return JsonResponse
     */
    public function destroy(MessageThreadAttachment $attachment)
    {
        $attachment->delete();
        return sendTrueResponse();
    }
}
