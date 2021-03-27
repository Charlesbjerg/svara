<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCardMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardCardMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $message = new BoardCardMessage($request->all());
        $message->save();
        $user = User::where('id', $request->input('user_id'));
        $message->user()->associate($user);
        $card = BoardCard::where('id', $request->input('card_id'));
        $message->user()->associate(card);
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function show(BoardCardMessage $message)
    {
        $message->load(['card', 'user']);
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function update(Request $request, BoardCardMessage $message)
    {
        $message->fill($request->all());
        $message->save();
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardCardMessage  $message
     * @return JsonResponse
     */
    public function destroy(BoardCardMessage $message)
    {
        $message->delete();
        return sendTrueResponse();
    }
}
