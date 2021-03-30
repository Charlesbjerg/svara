<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCard;
use App\Http\Controllers\Controller;
use App\Models\BoardColumn;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $cards = BoardCard::where('column_id', $request->input('column_id'))->get();
        $cards->each(function($card, $index) {
             $card->load(['label']);
        });
        return response()->json($cards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $card = new BoardCard($request->all());
        $card->column_id = $request->input('columnId');
        $card->save();
        $card->column()->associate(BoardColumn::where('id', $request->input('columnId'))->first());
        return response()->json($card);
    }

    /**
     * Display the specified resource.
     *
     * @param BoardCard $card
     * @return JsonResponse
     */
    public function show(BoardCard $card)
    {
//        $card->load(['attachments', 'messages', 'label']);
        return response()->json($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BoardCard $card
     * @return JsonResponse
     */
    public function update(Request $request, BoardCard $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BoardCard $card
     * @return JsonResponse
     */
    public function destroy(BoardCard $card)
    {
        $card->delete();
        return sendTrueResponse();
    }

}
