<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Update card positions
        foreach ($request->input('columns') as $columnData) {
            $columnFound = $board->columns()->firstWhere('id', $columnData['id']);
            if ($columnFound) {
                foreach ($columnData['cards'] as $index => $card) {
                    DB::table('board_cards')->where('id', $card['id'])->update([
                        'column_id' => $columnData['id'],
                        'sort_order' => $index,
                    ]);
                }
            }
        }

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
