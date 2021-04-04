<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardCard;
use App\Http\Controllers\Controller;
use App\Models\BoardColumn;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Create new card
        $card = new BoardCard($request->all());
        $card->column_id = $request->input('columnId');

        // Add created by ID, use request data if the user isn't logged in (shouldn't happen)
        if (Auth::user()) {
            $card->created_by_id = Auth::user()->id;
        } else {
            $card->created_by_id = $request->input('createdById');
        }

        // Save card and add associations
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
        // TODO: Load other features once they've been built
        $card->load(['createdBy']);
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
        $card->fill($request->all());
        $card->save();

        // TODO: Add in relational data once ready

        return response()->json($card);
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
