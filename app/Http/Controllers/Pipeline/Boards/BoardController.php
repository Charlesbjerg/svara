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
