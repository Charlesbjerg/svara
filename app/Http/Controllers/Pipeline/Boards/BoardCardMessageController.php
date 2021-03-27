<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCardMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardCardMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $messages = BoardCardMessage::where('card_id', $request->input('card_id'))->get();
        $messages->each(function($message, $index) {
            $message->load(['user', 'card']);
        });
        return response()->json($messages);
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
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function show(BoardCardMessage $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function update(Request $request, BoardCardMessage $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function destroy(BoardCardMessage $message)
    {
        //
    }
}
