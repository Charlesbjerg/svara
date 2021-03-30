<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $boards = Board::all();
        return response()->json($boards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // TODO: Method may not be needed, board should be created on project creation
    }

    /**
     * Display the specified resource.
     *
     * @param Board $board
     * @return JsonResponse
     */
    public function show(Board $board)
    {
        $board->load(['entity', 'pipelinePhase', 'columns']);
        $board->columns->each(function($item, $index) {
            $item->load('cards');
        });
        return response()->json($board);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Board $board
     * @return JsonResponse
     */
    public function update(Request $request, Board $board)
    {
        $board->fill($request->all());
        $board->save();

        // TODO: Should this method receive all data or just the updated data?
        // Just updated would be more performant
        // All data could be easier

        // Update all relational data
//        foreach ($request->input('columns') as $columnData) {
//            $board->columns()->where('id', $columnData['id'], function($column) {
//                foreach ($columnData['cards'] as $card) {
//                    $column->cards()->where('id', $card['id'], function($card) {
//
//                    });
//                }
//            });
//        }

        return response()->json($board);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Board $board
     * @return JsonResponse
     */
    public function destroy(Board $board)
    {
        // TODO: May not be needed, board should be deleted on project deletion
    }
}
