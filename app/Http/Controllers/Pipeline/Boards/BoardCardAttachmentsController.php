<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCardAttachment;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardCardAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $attachments = BoardCardAttachment::where('card_id', $request->input('card_id'))->get();
        return response()->json($attachments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $attachment = new BoardCardAttachment($request->all());
        // TODO: Save file then save model



        $card = Card::where('id', $request->input('card_id'));
        $attachment->card()->associate($card);
        $attachment->save();
        return response()->json($attachment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardCardAttachment  $attachment
     * @return JsonResponse
     */
    public function show(BoardCardAttachment $attachment)
    {
        // TODO: May need to load full URL path and add to model
        return response()->json($attachment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardCardAttachment  $attachment
     * @return JsonResponse
     */
    public function update(Request $request, BoardCardAttachment $attachment)
    {
        $attachment->fill($request->all());
        $attachment->save();
        // TODO: Update relational data
        return response()->json($attachment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardCardAttachment  $attachment
     * @return JsonResponse
     */
    public function destroy(BoardCardAttachment $attachment)
    {
        // TODO: Remove file from system then delete model
        $attachment->delete();
        return sendTrueResponse();
    }

    /**
     * TODO: Attachments have to be saved before added to model. Below method needs properly integrating.
     */
    public function saveAttachment() {
        // Code has been copied from example, need to make work for this project
//        $rules = array(
//            'file' => 'image|max:3000',
//        );
//
//        $validation = Validator::make($request, $rules);
//
//        if ($validation->fails())
//        {
//            return Response::make($validation->errors->first(), 400);
//        }
//
//        $file = Input::file('file');
//
//        $extension = File::extension($file['name']);
//        $directory = path('public').'uploads/'.sha1(time());
//        $filename = sha1(time().time()).".{$extension}";
//
//        $upload_success = Input::upload('file', $directory, $filename);
    }

}
