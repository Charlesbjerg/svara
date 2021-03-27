<?php

namespace App\Http\Controllers\Pipeline\Boards;

use App\Models\BoardColumn;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoardColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $columns = BoardColumn::where('board_id', $request->input('board_id'))->get();
        return response()->json($columns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $column = new BoardColumn($request->all());
        $column->save();
        return response()->json($column);
    }

    /**
     * Display the specified resource.
     *
     * @param BoardColumn $column
     * @return JsonResponse
     */
    public function show(BoardColumn $column)
    {
        $column->load('cards');
        return response()->json($column);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BoardColumn $column
     * @return JsonResponse
     */
    public function update(Request $request, BoardColumn $column)
    {
        $column->fill($request->all());
        $column->save();
        return response()->json($column);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BoardColumn $column
     * @return JsonResponse
     */
    public function destroy(BoardColumn $column)
    {
        $column->delete();
        return sendTrueResponse();
    }
}
